<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Commune;
use App\Models\Village;

class LocationController extends Controller
{
    //
    public function index()
    {
        $provinces = Province::All();
        $district = District::All();
        $communes = Commune::All();
        $villages = Village::All();
        return view('address.index', ["provinces" => $provinces, "district" => $district, "communes" => $communes, "villages" => $villages]);
    }
}
