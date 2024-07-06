<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Frontuser;
use Illuminate\Http\Request;

class FrontUserController extends Controller
{
    //
    public function index(){

    }

    public function show($id){
        return $id;
        $user = Frontuser::find($id);
        return response()->json($user);
    }
}
