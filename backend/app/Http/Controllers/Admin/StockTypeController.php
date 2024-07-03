<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockType;

class StockTypeController extends Controller
{
    //
    public function index()
    {
        $stocks = StockType::paginate(5);
        return view('stockType.index', ["stocks" => $stocks]);
    }
    public function create()
    {
        return view('stockType.new');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'limit_quantity' => 'required|integer',
        ]);
        StockType::create($request->all());
        return redirect()->back()->withSuccess('Created stock type');
    }
    public function edit($id)
    {
        $stock = StockType::find($id);
        return view('stockType.edit', ["stock" => $stock]);
    }
    public function update(Request $request, $id)
    {
        $stock = StockType::find($id);
        $stock->update($request->all());
        return redirect()->back()->withSuccess('Updated stock type');
    }
    public function destroy($id)
    {
        StockType::destroy($id);
        return redirect()->back()->withSuccess('Deleted successfully');
    }
}
