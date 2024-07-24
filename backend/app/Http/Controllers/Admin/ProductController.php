<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorys;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\StockType;
use App\Models\Frontuser;
use Illuminate\Support\Facades\Validator;

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
        $users = Frontuser::all();
        return view('product.new', ['stockTypes' => $stockTypes, 'categories' => $categories, 'users' => $users]);
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
            'frontuser_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'categorys_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $stock_type = StockType::find($request->stock_type_id);
        if ($stock_type->limit_quantity > $request->quantity) {
            $stock = Stock::create([
                'quantity' => $request->quantity,
                'stock_type_id' => $request->stock_type_id,
            ]);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $imageName);

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
            return redirect()->route('admin.products.index')->withSuccess('Product create!');
        } else {
            return redirect()->back()->with('error', 'Can not create product because stock in more than limit');
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
        $users = Frontuser::all();
        return view('product.edit', ['product' => $product, 'categories' => $categories, 'stock' => $stock, 'stockTypes' => $stockTypes, 'users' => $users]);
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
            'frontuser_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'categorys_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $stock_type = StockType::find($request->stock_type_id);
        if ($stock_type->limit_quantity > $request->quantity) {
            $stock = Stock::create([
                'quantity' => $request->quantity,
                'stock_type_id' => $request->stock_type_id,
            ]);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $imageName);
            $product->image = $imageName;
            $product->update([
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
