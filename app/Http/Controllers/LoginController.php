<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => 'Bearer ' . $token,
            'user' => $user,
        ], 201);
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
              'access_token' => 'Bearer ' . $request->user()->createToken('auth_token')->plainTextToken,
            ], 200);
        }

        return response()->json(['message' => 'Email ou senha invalidas!'], 403);
    }

    public function logout(Request $request)
    {
        $user  = Auth::user();
        $token = $request->bearerToken();

        $user->tokens()->where('id', $token)->delete();

        return response()->json(['message' => 'Logout realizado com sucesso!'], 200);
    }
}
