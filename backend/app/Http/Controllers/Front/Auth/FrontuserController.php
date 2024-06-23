<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\Frontuser;
use Illuminate\Http\Request;

class FrontuserController extends Controller
{
    //
    public function updateInformationUser(Request $request)
    {
        $request->validate([
            'name' => 'string',
            'phone' => 'string',
            'city' => 'string',
            'gender' => 'string',
        ]);
        $user = $request->user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->gender = $request->gender;
        $user->save();
        return response()->json($user);
    }

    public function updateProfileUser(Request $request){
        
        $user = $request->user();
        
        return response()->json($user);
    }
}
