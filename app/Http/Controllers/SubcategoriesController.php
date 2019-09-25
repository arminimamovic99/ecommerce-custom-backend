<?php

namespace App\Http\Controllers;

use App\Subcategories;
use App\Categories;
use App\SubcatCat;
use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryRequest;
use App\Http\Middleware\RoleMiddleware;

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('add_subcategory')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
        
        $subcategory = new Subcategories();
        $subcategory->name = $request->input('name');
        $subcategory->save();

        $categories_subcategories = new SubcatCat();
        $categories_subcategories->category_id = $request->input('category');
        $categories_subcategories->subcategory_id = $subcategory->id;
        $categories_subcategories->save();

        $categories = Categories::all();
        $request->session()->flash('success', 'You added a subcategory');
        return redirect('/subcategories/create')->with('categories', $categories);
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
        $subcategory = Subcategories::find($id);
        $categories = Categories::all();
        return view('edit_subcategory')->with('subcategory', $subcategory)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryRequest $request, $id)
    {
        $subcategory = Subcategories::find($id);
        $subcategory->name = $request->input('name');
        $subcategory->save();
        $request->session()->flash('success', 'You edited a subcategory');
        return redirect('/panel/subcategories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategories::find($id);
        $subcategory->delete();
        return redirect('/panel/subcategories');
    }
}
