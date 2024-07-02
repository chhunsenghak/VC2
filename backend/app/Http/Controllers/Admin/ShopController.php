<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shops;

class ShopController extends Controller
{
    //
    public function index()
    {
        $shops = Shops::paginate(5);
        return view('shop.index', ["shops" => $shops]);
    }
}
