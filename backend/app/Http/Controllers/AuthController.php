<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use App\Http\Resources\FrontUserResource;
use App\Models\Frontuser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Password;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|string|max:255',
            'password'  => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $credentials = $request->only('email', 'password');

        // if (!Auth::attempt($credentials)) {
        //     return response()->json([
        //         'message' => 'User not found'
        //     ], 401);
        // }

        $user   = Frontuser::where('email', $request->email)->firstOrFail();
        $token  = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Login success',
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }

    public function register(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = Frontuser::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'user' => $user,
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Logout failed. Please try again.'], 500);
        }
        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }

    public function index(Request $request)
    {
        $user = $request->user();
        // $roles = $user->getRoleNames();
        return response()->json([
            'message' => 'Login success',
            'data' => $user,
        ]);
    }

    public function show($id)
    {
        // $user = Frontuser::find($id);
        // // $roles = $user->getRoleNames();
        // return response()->json([
        //     'message' => 'Login success',
        //     'data' => $user,
        // ]);
    }

    public function forgotPassword(Request $request): JsonResponse
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = Frontuser::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $token = Str::random(60);
        $store_token = Password::create([
            'email' => $user->email,
            'token' => $token,
            'expires_at' => now()->addHours(1), // Example: Token expires in 1 hour
        ]);
        return response()->json(['message' => 'Password reset link sent to your email', "store_token" => $store_token]);
    }
    // Reset the user's password
    public function resetPassword(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $passwordReset = Password::where('email', $request->email)
            ->where('token', $request->token)
            ->where('expires_at', '>', now())
            ->first();
        if (!$passwordReset) {
            return response()->json(['message' => 'Invalid or expired token'], 400);
        }
        $user = Frontuser::where('email', $passwordReset->email)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->password = Hash::make($request->password);
        $user   = Frontuser::where('email', $request->email)->firstOrFail();
        $token  = $user->createToken('auth_token')->plainTextToken;
        $user->save();
        $passwordReset->delete(); // Remove the password reset record
        return response()->json(['message' => 'Password reset successfully', 'new_password' => $user->password, 'access_token' => $token]);
    }


    public function updateBio(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'bio' => 'string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user->bio = $request->bio;

        return response()->json([
            'message' => 'Bio updated successfully',
            'user' => $user,
        ]);
    }
    public function updatePhoneNumber(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'phoneNumber' => 'string|max:15',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user->phoneNumber = $request->phoneNumber;
        return response()->json([
            'message' => 'Phone number updated successfully',
            'user' => $user,
        ]);
    }

    public function updateProfilePicture(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        if ($request->hasFile('profile')) {
            // Delete the old profile image if it exists
            if ($user->profile) {
                Storage::disk('public')->delete($user->profile);
            }

            // Store the new profile image
            $profilePath = $request->file('profile')->store('profiles', 'public');
            $user->profile = $profilePath;
            $user->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Profile picture updated successfully',
            'user' => $user,
        ]);
    }
}
