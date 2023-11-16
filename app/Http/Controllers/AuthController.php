<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $accessToken = $user->createToken('authToken')->plainTextToken;
    
            \Log::info('Token Issued:', ['token' => $accessToken]);
    
            return response()->json(['token' => $accessToken], 200);



            
        } 
        
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
 
        //     return redirect()->intended('dashboard');
        // }
        else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    /**
     * Handle a logout request from the application.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $user = auth()->user();
        
        // Revoke the user's access tokens
        $user->tokens()->delete();
    
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
