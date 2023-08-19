<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login() {
        $credentials = request(['email', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        return $this->respondWithToken($token);

    }


    public function register(Request $request) {

    }

    public function me() {
        return response()->json(auth()->user());
    }

    public function logout(Request $request) {
        auth()->logout();
        return response()->json(['message' => 'Succesfully logged out']);
    }

    public function refresh() {
        return $this->respondWithToken(auth()->refresh());
    }


    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }
}
