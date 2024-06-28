<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Category access|Category create|Category edit|Category delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Category create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Category edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Category delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categorys::latest()->get();
        return view('category.index', ['categorys' => $category]);
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('categories_images'), $imageName);

        $category = Categorys::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
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

    public function edit(Categorys $category)
    {
        $category = Categorys::find($category);
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
        $category = Categorys::findOrFail($categoryId);
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('categories_images'), $imageName);
            $category->image = 'images/' . $imageName;
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imageName
            ]);
        } else {
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('admin.categorys.index')->withSuccess('Category updated!');
    }

    public function destroy($id)
    {
        $category = Categorys::destroy($id);
        return redirect()->back()->withSuccess('Category deleted !!!');
    }
}
