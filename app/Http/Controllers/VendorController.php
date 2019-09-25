<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use App\Subcategories;
use App\Products;
use App\ApprovalProcess;
use App\Photos;
use App\Orders;
use App\Vendor;
use Session;

class VendorController extends Controller
{
    public function __construct() 
    {
       // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor/vendor_home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategories::all();
        return view('vendor/vendor_add')->with('subcategories', $subcategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $approved = new ApprovalProcess();
        $approved->where(['id' => $id])->update(['approved' => 1]);
        $controller = new ApprovalProcessController();
        $controller->notifyVendor();
        $id = $request->route('id');
        
        $pending = ApprovalProcess::where(['id' => $id])->first();
        $product = new Products();
        $product->name = $pending->name;
        $product->price = $pending->price;
        $product->brand = $pending->brand;
        $product->description = $pending->description;
        $product->owner = 'Vendor';
        $product->vendor_id = $pending->vendor_id;
        $product->session_id = session()->getId();
        $product->save();

        $photo = new Photos();
        $photo->product_id = $pending->id;
        $photo->url = $pending->photo_url;
        $photo->save();

        
        $request->session()->flash('success', 'You approved a product from a vendor');
        $pending->delete();
        return redirect('/panel');
    }

    /**
     * Display orders.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrders()
    {
        $vendor = Vendor::where(['id' => \Session::get('vendor_id')])->first();
        $orders = Orders::where(['vendor_id' => $vendor->id])->get()->toArray();
        
        return view('vendor/vendor_orders')->with('orders', $orders);
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
        //
    }
}
