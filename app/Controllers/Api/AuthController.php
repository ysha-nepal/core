<?php

namespace Core\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => "required"
        ]);

        if(!auth()->attempt($data)){
            return response(['message' => "Invalid Credentials"]);
        }

        $token = auth()->user()->createToken('API TOKEN')->accessToken;
        return response(['user' => auth()->user(),'token' => $token]);
    }

    public function logout()
    {
        return auth()->user();
        auth()->user()->currentAccessToken()->delete();
        return reponse(['message' => "User Logged Out Successfully"]);
    }
}
