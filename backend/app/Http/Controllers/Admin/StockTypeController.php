<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StockType;
use Illuminate\Http\Request;

class StockTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockTypes = StockType::paginate(5);
        return view('stocktype.index', ['stockTypes' => $stockTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stocktype.create');
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
            'limit_quality' => 'required|integer',
        ]);

        StockType::create($validated);

        return redirect()->route('admin.stocktypes.index')->withSuccess('Stock Type created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stockType = StockType::findOrFail($id);
        return view('stocktype.show', ['stockType' => $stockType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stockType = StockType::findOrFail($id);
        return view('stocktype.edit', ['stockType' => $stockType]);
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
        $stockType = StockType::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'limit_quality' => 'required|integer',
        ]);

        $stockType->update($validated);

        return redirect()->route('admin.stocktypes.index')->withSuccess('Stock Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StockType::destroy($id);
        return redirect()->route('admin.stocktypes.index')->withSuccess('Stock Type deleted successfully!');
    }

    /**
     * Search for stock types.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = StockType::where('name', 'like', "%$search%")->get();

        return view('stocktype.index', ['results' => $results]);
    }
}
