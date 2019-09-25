<?php

namespace App\Http\Controllers;

use App\Products;
use App\Orders;
use App\Traits\ClearNotificationsTrait;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Middleware\RoleMiddleware;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trait = new ClearNotificationsTrait();
        $trait->clearNotifications();
        
        $orders = Orders::all();
        return view('orders')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request, $id)
    {
        $order = new Orders();
        $product = Products::find($id);
        $order->name = $request->input('name');
        $order->last_name = $request->input('last_name');
        $order->adress = $request->input('adress');
        $order->phone_number = $request->input('phone');
        $order->product = $product->name;
        $order->owner = $product->owner;
        $order->vendor_id = $product->vendor_id;
        $order->product_id = $product->id;
        $order->save();
        
        return view('welcome');
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
        $order = Orders::find($id);
        $order->delete();

        return view('home');
    }

    public function newOrders()
    {   
        $orders = new Orders();
        $notifications = $orders->where(['seen' => 0])->value('seen');
        return response()->json(['notification' => $notifications]);
    }

    
}
