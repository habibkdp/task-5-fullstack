<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $creds = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (!Auth::attempt($creds)) {
            return response(['message' => 'Invalid login credentials!']);
        }


        $user = User::find(auth()->user()->id);

        $token = $user->createToken('Token Name')->accessToken;

        return response()->json([
            'user' => Auth::user(),
            'access_token' => $token
        ]);
    }
}
