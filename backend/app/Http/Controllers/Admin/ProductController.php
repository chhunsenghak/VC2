<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorys;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\StockType;

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
        $products = Products::paginate(5);
        return view('product.index', ['products' => $products]);
    }
    public function create()
    {
        $stockTypes = StockType::all();
        $categories = Categorys::all();
        return view('product.new', ['stockTypes' => $stockTypes, 'categories' => $categories]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'categorys_id' => 'required|integer',
            'discount' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock_type_id' => 'integer',
            'quantity' => 'integer',
            'shop_id' => 'integer',
        ]);
        $stock_type = StockType::find($request->stock_type_id);
        if ($stock_type->limit_quantity > $request->quantity) {
            $stock = Stock::create([
                'quantity' => $request->quantity,
                'stock_type_id' => $request->stock_type_id,
            ]);
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('products_images'), $imageName);
                Products::create([
                    "name" => $request->name,
                    "description" => $request->description,
                    "price" => $request->price,
                    "discount" => $request->discount,
                    "stock_id" => $stock->id,
                    "shop_id" => $request->shop_id,
                    "image" => 'products_images/' . $imageName,
                    "categorys_id" => $request->categorys_id
                ]);
                return redirect()->route('admin.products.index')->withSuccess('Product create!');
            } else {
                Products::create([
                    "name" => $request->name,
                    "description" => $request->description,
                    "price" => $request->price,
                    "discount" => $request->discount,
                    "stock_id" => $stock->id,
                    "shop_id" => $request->shop_id,
                    "categorys_id" => $request->categorys_id
                ]);
                return redirect()->route('admin.products.index')->withSuccess('Product create!');
            }
        } else {
            return redirect()->back()->with('error', 'Stock Limit Exceeded');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function edit($id)
    {
        $product = Products::find($id);
        $categories = Categorys::all();
        $stock = Stock::find($product->stock_id);
        $stockTypes = StockType::all();
        return view('product.edit', ['product' => $product, 'categories' => $categories, 'stock' => $stock, 'stockTypes' => $stockTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'categorys_id' => 'required|integer',
            'discount' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock_type_id' => 'integer',
            'quantity' => 'integer',
            'shop_id' => 'integer',
        ]);
        $stock_type = StockType::find($request->stock_type_id);
        if ($stock_type->limit_quantity > $request->quantity) {
            $stock = Stock::create([
                'quantity' => $request->quantity,
                'stock_type_id' => $request->stock_type_id,
            ]);
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('products_images'), $imageName);
                $product->image = 'products_images/' . $imageName;
                $product->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'discount' => $request->discount,
                    'categorys_id' => $request->categorys_id,
                    'stock_id' => $stock->id,
                    'shop_id' => $request->shop_id,
                    'image' => $imageName
                ]);
            } else {
                $product->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'discount' => $request->discount,
                    'categorys_id' => $request->categorys_id,
                    'stock_id' => $stock->id,
                    'shop_id' => $request->shop_id
                ]);
            }
            return redirect()->route('admin.products.index')->withSuccess('Product updated!');
        } else {
            return redirect()->back()->with('error', 'Stock Limit Exceeded');
        }
    }

    public function destroy($id)
    {
        $category = Products::destroy($id);
        return redirect()->back()->withSuccess('Product deleted !!!');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = Products::where('name', 'like', "%$search%")->get();

        return view('products.index', ['results' => $results]);
    }
}
