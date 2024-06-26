<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListProductResource;
use App\Models\Products;
// use Dotenv\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return response(['sucess' => true, 'data' => $products], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount' => 'string',
            'stock' => 'required|string',
            'categorys_id' => 'required|integer',
        ]);
        return $request;

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products_images'), $imageName);

        $product = Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => 'products_images/' . $imageName, // Store the image path in the database
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'categorys_id' => $request->categorys_id,
        ]);

        return response()->json([
            'success' => true,
            'data' => $product->toArray(),
        ], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Products::find($id);
        $products = new ListProductResource($products);
        return response(['sucess' => true, 'data' => $products], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the product by ID
        $product = Products::find($id);
        $validateUser = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'string',
            'description' => 'string',
            'price' => 'integer',
            'discount' => 'string',
            'stock' => 'string',
            'categorys_id' => 'integer',
        ]);
        if ($validateUser->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 422);
        }
        $img = $request->image;
        $ext = $img->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $img->move(public_path() . '/products_images/', $imageName);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'categorys_id' => $request->categorys_id,
            'image' => 'products_images/' . $imageName,
        ]);

        // Delete the old image
        File::delete(public_path() . '/products_images/' . $product->image);

        // Return a success response
        return response()->json([
            'success' => true,
            'data' => $product->toArray(),
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Products::find($id);
        $products->delete();
        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
