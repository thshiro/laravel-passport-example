<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    

    public function register( Request $request)
    {

        $userData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create($userData);

        return response()->json([
            'data' => $user,
            'access_token' => $user->createToken('token')->accessToken,
        ], 200);

    }

    public function me( Request $request)
    {
        return response()->json([
            'data' => $request->user(),
        ], 200);
    }
}
