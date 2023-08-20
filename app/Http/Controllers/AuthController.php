<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'username' => 'required|string|min:2',
            'password' => 'required|string|min:8',
            'password_confirm' => 'required|string|min:8'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], 422);
        }
        $data = $validator->validated();
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);

            ShoppingCart::create([
                'user_id' => $user->getKey(),
            ]);
            DB::commit();
            return response()->json([
                'message' => 'Registrado correctamente'
            ], 201);
        } catch (\Throwable $t) {
            DB::rollBack();
            return response()->json([
                'message' => 'No se pudo registrar al usuario',
                (env('APP_ENV') == 'local' ? 'err' : '') => $t->getMessage()
            ], 400);
        }
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
