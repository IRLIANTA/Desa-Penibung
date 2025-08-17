<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface{
    
    public function login(array $data)
    {
        if (!Auth::guard('web')->attempt($data)) {
            return response([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'token' => $token,
            'message' => 'Login Success',
        ]);
    }

    public function logout()
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();

        $response = [
            'success' => true,
            'message' => 'Logout Success',
        ];

        return response($response, 200);
    }
}