<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListCategoryResource;
use App\Models\Categorys;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorys::all();
        $categories = ListCategoryResource::collection($categories);
        return response(['sucess' => true, 'data' => $categories], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categorys::store($request);
        return response()->json([
            'message' => 'Category created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Categorys::find($id);
        $number = count($categories["products"]);
        $categories = new ListCategoryResource($categories);
        return response(['sucess' => true, 'numberOfProduct'=> $number, 'data' => $categories], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Categorys::find($id);
        $categories->update($request->all());
        return response()->json([
            'message' => 'Category updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Categorys::find($id);
        $categories->delete();
        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }
}
