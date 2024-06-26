<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Product access|Product create|Product edit|Product delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Product create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Product edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Product delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::latest()->get();
        return view('product.index', ['products' => $products]);
    }
    public function create()
    {
        return view('category.new');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'string',
        ]);
        $category = Products::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->back()->withSuccess('category created !!!');
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

    public function edit(Products $category)
    {
        $category = Products::find($category);
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryId)
    {
        $category = Products::findOrFail($categoryId);

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $category->update($validated);

        return redirect()->route('admin.Products.index')->withSuccess('Category updated!');
    }

    public function destroy($id)
    {
        $category = Products::destroy($id);
        return redirect()->back()->withSuccess('Category deleted !!!');
    }
}
