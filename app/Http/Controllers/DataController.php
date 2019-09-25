<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Subcategories;
use App\Products;
use App\Photos;
use App\ProductSubcat;
use App\SubcatCat;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function all()
    {
        $categories = Categories::all();
        $subcategories = Subcategories::all();
        $products = Products::all();
        $product_subcat = ProductSubcat::all();
        $photos = [];

        $subcategories_id = $subcategories->pluck('id', 'name')->toArray();
        $sortedProducts = $this->nesto($subcategories_id);
        
        return view('homepage/homepage')->with('categories', $categories)->with('subcategories', $subcategories)->with('products', $products)->with('photos', $photos)
        ->with('sortedProducts', $sortedProducts);
    }

    public function nesto(Array $subcategory_ids) 
    {
        $products = [];

        foreach ($subcategory_ids as $name => $subcategory) {
            $fromPivot = ProductSubcat::where(['subcategory_id' => $subcategory])->orderBy('id', 'desc')->take(4)->get();
            $subcategoryProducts = [];  

            foreach($fromPivot as $item) {
                $product = Products::where(['id' => $item->product_id])->first();
                $photo = Photos::where(['product_id' => $product->id])->first();
                $product->photo = $photo['url'];
                $subcategoryProducts[] = $product;
            }
            
            $products[strtolower($name)] = $subcategoryProducts;
        }
        return $products;
    }

    /*public function fashion()
    {
        $fashion = Categories::where(['name' => 'Fashion'])->first();
        //var_dump($fashion);
        $pivot = SubcatCat::where(['category_id' => $fashion->id])->get()->toArray();
        //var_dump($pivot);exit;
        $subcategories = [];
        foreach ($pivot as $item) {
            $subcategories[] = Subcategories::where(['id' => $item['subcategory_id']])->first();
        }
        //var_dump($subcategories);exit;
        $subcat_product = [];
        foreach ($subcategories as $subcategory) {
            $subcat_product[] = ProductSubcat::where(['subcategory_id' => $subcategory->id])->first();
        }
        //var_dump($subcat_product);exit;
        $products = [];
        foreach($subcat_product as $prod) {
            $products[] = Products::where(['id' => $prod->id])->get()->toArray();
        }
        var_dump($products);
    }*/
}
