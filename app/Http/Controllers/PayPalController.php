<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Products;
use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PayerInfo;
use PayPal\Api\Item;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;


class PayPalController extends Controller
{
    public function __construct()
    {
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        //var_dump($this->_api_context);exit;
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function charge(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        
        $cart = Cart::where(['session_id' => session()->getId()])->get()->toArray();
        //var_dump($cart);exit;
        $products = [];
        foreach ($cart as $item) {
            $products[] = Products::where(['id' => $item['product_id']])->first();
        }

        $items = [];
        foreach($products as $product) {
            $items[] = $item_1->setName($product->name)
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($request->get('total')); 
        }
        
        $item_list = new ItemList();
        $item_list->setItems(array($items));
        
        $amount = new Amount();
        $amount->setTotal($request->get('amount'))
                ->setCurrency('USD');
            
        //var_dump($request->get('amount'));exit;
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                ->setItemList($item_list);
        //var_dump($amount);exit;
        
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('cart')) /** Specify return URL **/
            ->setCancelUrl(URL::route('cart'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setRedirectUrls($redirect_urls)
            ->setPayer($payer)
            ->setTransactions(array($transaction));
        //var_dump($transaction);exit;

        try {
            //var_dump(0);
            $payment->create($this->_api_context);
            //var_dump(1);exit;
        } 
        catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
            \Session::put('error', 'Connection timeout');
            return redirect('/paypal/checkout');
            } 
            else {
                \Session::put('error', 'An error occured, sorry for inconvenience');
                return redirect('/paypal/checkout');
                }
            }
            foreach ($payment->getLinks() as $link) {
                
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }

        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
        /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
                return redirect('/paypal/checkout');
        
        var_dump('Došli smo do ovdje');exit;
    }
}
