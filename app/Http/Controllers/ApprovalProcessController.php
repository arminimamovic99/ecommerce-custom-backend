<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductsRequest;
use Illuminate\Http\Request;
use App\ApprovalProcess;

class ApprovalProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending = ApprovalProcess::all();
        return view('pending')->with('pending', $pending);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request) 
    {
        if($request->hasFile('image')) {
            // Get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $ext = $request->file('image')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename . '_' .time() . '.' .$ext;
            //Upload image
            $path = $request->file('image')->storeAs('public/img', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $id = auth()->user()->id;
        $product = new ApprovalProcess();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->brand = $request->input('brand');
        $product->description = $request->input('description');
        $product->photo_url = $fileNameToStore;
        $product->owner = 'Vendor';
        $product->vendor_id =  $id;
        $product->save();

        $request->session()->flash('success', 'Congrats! You submitted a product. It has been sent to the administrators for the approval process');
        return view('vendor/vendor_home');
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
        //
    }

    public function notifyVendor()
    {
        $pending = new ApprovalProcess();
        $notifications = $pending->where(['approved' => 1])->value('approved');
        //var_dump($notifications);exit;
        return response()->json(['notification' => $notifications]);
    }
}
