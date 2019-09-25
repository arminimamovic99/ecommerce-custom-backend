<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Subcategories;
use App\ProductSubcat;
use App\Photos;
use App\Http\Requests\ProductsRequest;
use App\Http\Middleware\RoleMiddleware;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Products::all();
        $photos = [];
        foreach ($products as $product) {
            $product_photo = Photos::where(['product_id' => $product['id']])->first();
            
            $product->photo = $product_photo ? $product_photo->url : 'noimage.jpg';
        }
        //var_dump($products[0]['photo']);exit;
        return view('homepage/shop')->with('products', $products->toArray())->with('photos', $photos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategories::all();
        return view('create')->with('subcategories', $subcategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {   
        $product = new Products();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->brand = $request->input('brand');
        $product->description = $request->input('description');
        $product->owner = 'Admin';
        $product->save();
        
        $product_subcat = new ProductSubcat();
        $product_subcat->product_id = $product->id;
        $product_subcat->subcategory_id = $request->input('subcategory'); 
        $product_subcat->save();

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

        $photos = new Photos();
        $photos->product_id = $product->id;
        $photos->url = $fileNameToStore;
        $photos->save();

        $request->session()->flash('success', 'You added a product');
        return redirect('/panel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::find($id);
        $photo = Photos::where(['product_id' => $id])->first();
        return view('homepage/single')->with('product', $product)->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $subcategories = Subcategories::all();
        $photo = Photos::where(['product_id' => $product->id])->first();
        return view('edit_product')->with('product', $product)->with('subcategories', $subcategories)->with('photo', $photo);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, $id)
    {
        $product = Products::find($id);
        $product->update($request->input());

        $request->session()->flash('success', 'You edited a product');

        return redirect('/panel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        
        return redirect('/panel');
    }

    public function byCategory($id)
    {
        $subcat_products = ProductSubcat::where(['subcategory_id' => $id])->get();
        $products = [];
        foreach ($subcat_products as $subcat) {
            $product = Products::find($subcat->product_id);
            $products[] = $product; 
        }
        
        return redirect('/')->with('products', $products);
    }
}
