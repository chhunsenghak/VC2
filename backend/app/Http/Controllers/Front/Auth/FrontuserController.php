<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\Frontuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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


    public function updateProfileUser(Request $request)
    {
        $validateUser = Validator::make($request->all(), [
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validateUser->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 422);
        }
        $img = $request->profile;
        $ext = $img->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $img->move(public_path() . '/images/', $imageName);
        $user = $request->user();
        try {
            $user->profile = $imageName;
            $user->save();
            return response()->json([
                'success' => true,
                'data' => $user,
                'message' => 'Profile updated successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 404);
        }
    }

    
}
