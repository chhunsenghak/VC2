<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorys;
use App\Models\Frontuser;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Shops;
class DashboardController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontend = Frontuser::all();
        $categoies = Categorys::all();
        $products = Products::all();
        $seller = Shops::all();
        return view('dashboard', ['frontend' => $frontend, 'categoies' => $categoies, 'products'=> $products, 'seller' => $seller]);
    }
}
