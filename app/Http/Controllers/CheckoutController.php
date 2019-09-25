<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Cart;
use App\Products;
use App\Vendor;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
Use Illuminate\Http\Controllers\OrdersController;
use Illuminate\Http\Controllers\CartController;

class CheckoutController extends Controller
{
    public $stripe;

    public function __construct()
    {
        $this->stripe = new \Stripe('pk_test_AoV2P0WJBsv4a0jxBJR2FTyr00zpBMh1RQ', '2019-08-14');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = session('total');
        $products = session('products');

        return view('homepage/checkout')->with('total', $total);
    }

    
    public function charge(CheckoutRequest $request)
    {
            // Instanca Stripe Klase
            $stripe = \Stripe::make('sk_test_EqSbcxxDYfGMljlvNQerCTNw00mQ06Giu8');
            
            // Instanca klijenta koji placa
            $customer = $stripe->customers()->create([
                    'account_balance' => '12000',
                    'email' => 'john@doe.com',
            ]);
            
            // Instanca Tokena
            $token = $stripe->tokens()->create([ 
                'card' => [
                    'number' => $request->input('number'),
                    'exp_month' => $request->input('month'),
                    'cvc' => $request->input('code'),
                    'exp_year' => $request->input('year')
                ]
            ]);
            
            // Instanca Kartice
            $card = $stripe->cards()->create('cus_FmHxV454FE9iHz', $token['id']);
            
            // Naplata
            $charge = $stripe->charges()->create([
                'customer' => "cus_FmHxV454FE9iHz",
                'currency' => 'USD',
                'amount' => $request->input('total'),
                'receipt_email' => 'aimamovic99@outlook.com'
            ]);
            
            if($charge['outcome']['seller_message'] === 'Payment complete.') {
                $request->session()->flash('success', $charge['outcome']['seller_message']);
            }
            else {
                $request->session()->flash('error', $charge['outcome']['seller_message']);
            }
            
            $order = new Orders();
            $products = Cart::where(['session_id' => session()->getId()])->get();
            $vendors = [];
            foreach ($products as $product) {
                    $item = Products::where(['id' => $product->product_id])->first();
                    $order->name = $request->input('first_name');
                    $order->last_name = $request->input('last_name');
                    $order->adress = $request->input('address');
                    $order->phone_number = $request->input('phone');
                    $order->product = $item->name;
                    $order->session_id = session()->getId();
                    $order->vendor_id = $item->vendor_id;
                    $order->save();

                    $vendors[] = $item->vendor_id;
            }
            //var_dump($vendors);exit;
            \Session::put('vendors', $vendors);
            Cart::truncate();
            return redirect('/checkout/vendor');
    }
    
    public function vendorPayout()
    {
        /*
            1. Filtrirati narudžbe i uzeti sve proizvode koji su u vlasništvu tog vendora -> završeno
            2. Sabrati cijene tih proizvoda -> završeno
            3. Poslati pare vendoru
            4. Vendoru na panelu izbaciti sve njegove proizvode koji su naručeni 
        */
        // Postavljanje Api ključa 
        \Stripe\Stripe::setApiKey("sk_test_EqSbcxxDYfGMljlvNQerCTNw00mQ06Giu8");
        $stripe = \Stripe::make('sk_test_EqSbcxxDYfGMljlvNQerCTNw00mQ06Giu8');
        $vendors = [];

        foreach(\Session::get('vendors') as $vendor) {
            $vendors[] = User::where(['id' => $vendor])->first();
        }
        $orders = [];
        $products = [];
        $prices = [];
        //var_dump($vendors);exit;
        foreach ($vendors as $vendor) {
            $orders[] = Orders::where(['vendor_id' => $vendor->id])->get()->toArray();
            foreach($orders as $key => $order) {
                $products[] = Products::where(['vendor_id' => $order[$key]['vendor_id']])->first();
            }
            // Raučunamo ukupnu cijenu
            foreach ($products as $product) {
                $prices[] = $product->price;
            }
            $total = array_sum($prices);
            // Pretvaramo u cente
            $amount = $total * 100;
            
            // Egzekucija transfera
            $transfer = \Stripe\Transfer::create([
                'amount' => $amount,
                'currency' => 'USD',
                'destination' => $vendor->stripe_user_id
            ]);
        
        
        }
        /*var_dump($orders);
        var_dump($products);
        var_dump($prices);
        exit;*/
        if (empty($orders)) {
            session()->flash('success', 'Payment Successful');
            return redirect('/');
        }
        session()->flash('success', 'Payment Successful');
        return redirect('/cart');

    }
    
    public function postRequest()
    {
        $post = [
            'client_secret' => 'sk_test_EqSbcxxDYfGMljlvNQerCTNw00mQ06Giu8',
            'code' => $_GET['code'],
            'grant_type' => 'authorization_code'
        ];
        
        $ch = curl_init('https://connect.stripe.com/oauth/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
         $response = curl_exec($ch);
        $array = explode("stripe_user_id", $response);
        curl_close($ch);

        $string = explode(",", $array[1]);
        $stripe_user_id = explode(":", $string[0]);
        $final = trim($stripe_user_id[1], '" "');
        $vendor = User::where(['id' => auth()->user()->id])->update(array('stripe_user_id' => $final));
        
        session()->flash('success', 'You connected your Stripe account, now you can directly recieve funds after selling on our platform');
        return redirect('/vendor/home');
    }
}
