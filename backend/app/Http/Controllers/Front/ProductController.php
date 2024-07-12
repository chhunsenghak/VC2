<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListAllNameProductsResource;
use App\Http\Resources\ListAllPriceProductResource;
use App\Http\Resources\ListProductResource;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        $products = ListProductResource::collection($products);
        return response(['success' => true, 'data' => $products], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount' => 'string',
            'stock_type_id' => 'integer',
            'categorys_id' => 'required|integer',
            'shop_id' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products_images'), $imageName);
        }

        $product = Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName ? 'products_images/' . $imageName : null,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'categorys_id' => $request->categorys_id,
        ]);

        return response()->json(['success' => true, 'data' => $product], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        $productResource = new ListProductResource($product);
        return response(['success' => true, 'data' => $productResource], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'description' => 'string',
            'price' => 'numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount' => 'string',
            'stock' => 'integer',
            'categorys_id' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $imageName = $product->image;
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($imageName) {
                File::delete(public_path($imageName));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products_images'), $imageName);
            $imageName = 'products_images/' . $imageName;
        }

        $product->update($request->all());
        if ($request->hasFile('image')) {
            $product->update(['image' => $imageName]);
        }

        return response()->json(['success' => true, 'data' => $product], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        // Delete the image if exists
        if ($product->image) {
            File::delete(public_path($product->image));
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    /**
     * Sort and filter products by name.
     */
    public function sortedProducts(Request $request)
    {
        $nameFilter = $request->input('name');

        $products = Products::query();

        if ($nameFilter) {
            $products->where('name', 'like', '%' . $nameFilter . '%');
        }

        $products = $products->orderBy('name')->get();
        return response()->json(['success' => true, 'data' => $products], 200);
    }

    /**
     * Get a list of product names.
     */
    public function listNameProducts()
    {
        // Get only the 'name' column from the products table
        $products = Products::select('name')->get();

        // Transform the products collection using the resource class
        $products = ListAllNameProductsResource::collection($products);

        return response(['success' => true, 'products' => $products], 200);
    }
    /**
     * Get a list of product price.
     */
    public function listPriceProducts()
    {
        // Get only the 'name' column from the products table
        $products = Products::select('price')->get();

        // Transform the products collection using the resource class
        $products = ListAllPriceProductResource::collection($products);

        return response(['success' => true, 'products' => $products], 200);
    }

    public function listProduct($id)
    {
        $products = Products::where('frontuser_id', $id)->get();
        $products = ListProductResource::collection($products);
        return response()->json(['success' => true, 'data' => $products], 200);
    }
    /**
     * Sort and filter products by price.
     */
    public function sortedProductsPrice(Request $request){
    $priceFilter = $request->input('price');

    $products = Products::query();

    if ($priceFilter) {
        $products->where('price', 'like', '%' . $priceFilter . '%');
    }

    $products = $products->orderBy('price')->get();
    return response()->json(['success' => true, 'data' => $products], 200);
    }
}

