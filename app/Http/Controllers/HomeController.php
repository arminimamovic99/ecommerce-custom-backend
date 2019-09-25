<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Subcategories;
use App\Orders;
use App\User;
use App\Http\Middleware\RoleMiddleware;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('panel')->with('products', $products);
    }

    public function categories()
    {
        $categories = Categories::all();
        return view('categories')->with('categories', $categories);
    }

    public function subcategories()
    {
        $subcategories = Subcategories::all();
        return view('subcategories')->with('subcategories', $subcategories);
    }

    
    public function bezveze()
    {
        var_dump(1);
    }
}
