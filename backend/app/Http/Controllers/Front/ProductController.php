<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListAllNameProductsResource;
use App\Http\Resources\ListAllPriceProductResource;
use App\Http\Resources\ListProductResource;
use App\Models\Products;
use App\Models\Stock;
use App\Models\StockType;
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
        // Validate request data
        // return $request;
        $validated = $request->validate([
            'frontuser_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'categorys_id' => 'required|integer',
            'stock_type_id' => 'required|integer',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Check if StockType exists and its limit_quantity
        $stock_type = StockType::find($request->stock_type_id);
        if (!$stock_type) {
            return response()->json(['success' => false, 'message' => 'Stock Type not found'], 404);
        }

        if ($stock_type->limit_quantity < $request->quantity) {
            return response()->json(['success' => false, 'data' => ["name" => $stock_type->name, "limit_quantity" => $stock_type->limit_quantity, "quantity" => $request->quantity], 'message' => 'Stock limit exceeded'], 422);
        }

        // Create stock entry
        $stock = Stock::create([
            'quantity' => $request->quantity,
            'stock_type_id' => $request->stock_type_id,
        ]);

        // Handle image upload
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage'), $imageName);

        // Create product
        $product = Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'categorys_id' => $request->categorys_id,
            'stock_id' => $stock->id,
            'break_product_at' => $request->break_product_at,
            'image' => $imageName,
            'quantity' => $request->quantity,
            'frontuser_id' => $request->frontuser_id,
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
        return response(['data' => $productResource], 200);
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        // Check if StockType exists and its limit_quantity
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $imageName);
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
        return response()->json(['message' => 'Product deleted successfully', 'status' => true], 200);
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
    public function sortedProductsPrice(Request $request)
    {
        $priceFilter = $request->price;
        $query = Products::query();
        if ($priceFilter) {
            $query->where('price', 'like', '%' . $priceFilter . '%');
        }
        $products = $query->orderBy('price', 'asc')->get();

        return response()->json(['success' => true, 'data' => $products], 200);
    }
}
