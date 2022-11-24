<?php

namespace Core\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 * @package Core\Controllers\Api
 */
class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => "required"
        ]);

        if(!auth()->attempt($data)){
            return response()->json(['message' => "Invalid Credentials"],422);
        }

        $token = Auth::user()->createToken('API TOKEN')->accessToken;
        return response()->json(['user' => auth()->user(),'token' => $token],200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $user = Auth::user();
        if(!$user){
            return response()->json(['message' => 'Invalid Token'],422);
        }
        $user->token()->revoke();
        return response()->json(['message' => "User Logged Out Successfully"],200);
    }
}
