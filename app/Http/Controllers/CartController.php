<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Products;
use App\Photos;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //dd(session()->getId());exit;
        $session_id = session()->getId();
        $cart = Cart::where(['session_id' => $session_id])->get();
        $products = [];
        $photos = [];
        $prices = [];
        $cart->each(function($item) use (&$products) {
            $products[] = Products::find($item->product_id);
            $photos[] = Photos::where(['product_id' => $item->product_id]);
        });
        
        // Sabire cijene svih proizvoda u kosarici
        foreach ($products as $product) {
            $prices[] = $product->price;
        }
        $total = array_sum($prices);
        
        \Session::put('cart', $products);
        \Session::put('total', $total);

        return view('homepage/cart')->with('products', $products)->with('total', $total);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    { 
        $cart = new Cart();
        $product = Products::find($id);

        if(empty($product)) {
            echo 'That product does not exist';exit;
        }

        $cart->product_id = $product->id;
        $cart->session_id = session()->getId();
        $cart->save();

        return redirect('/products/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect('/');
    }
}
