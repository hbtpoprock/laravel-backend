<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $accessToken = $user->createToken('authToken')->plainTextToken;
    
            \Log::info('Token Issued:', ['token' => $accessToken]);
    
            return response()->json(['token' => $accessToken], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function logout()
    {
        $user = auth()->user();
        
        // Revoke the user's access tokens
        $user->tokens()->delete();
    
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
