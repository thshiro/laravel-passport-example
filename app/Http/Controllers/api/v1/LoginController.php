<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\User;

class LoginController extends Controller
{

    // Login
    public function login(Request $request)
    {

        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt([$login])) {
            return response()->json([
                'message' => "Not authorized",
                'error' => "Wrong user or password"
            ], 401);
        }

        $user = $request->user();
        
        return response()->json([
            'data' => $user,
            'access_token' => $user->createToken('token')->accessToken,
        ], 200);
    }
    
    // Login
    public function logout(Request $request)
    {
        $isUser = $request->user()->token()->revoke();

        if ($isUser) {
            return response()->json([
                'message' => 'Successfully logged out'
            ], 200);
        }
    }
}
