<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockType;
class StockTypeController extends Controller
{
    //
    public function index(){
        // Retrieve all stock types
        $stockTypes = StockType::all();

        // Return stock types as a JSON response
        return response()->json($stockTypes);
    }
}
