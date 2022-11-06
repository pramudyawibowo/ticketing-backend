<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|email|unique:users,email',
                'password'  => 'required|string|min:8'
            ], [
                'name.required'     => 'Nama tidak boleh kosong!',
                'email.required'    => 'Email tidak boleh kosong!',
                'email.unique'      => 'Email sudah digunakan!',
                'password.required' => 'Password tidak boleh kosong!',
                'password.min'      => 'Password minimal 8 karakter!'
            ]);

            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
            ]);

            $user->assignRole('User');

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['message' => 'Registrasi Sukses', 'token' => $token, 'token_type' => 'Bearer'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email'     => 'required|email',
                'password'  => 'required'
            ], [
                'email.required'    => 'Email tidak boleh kosong!',
                'email.email'       => 'Masukkan email dengan benar!',
                'password.required' => 'Password tidak boleh kosong!'
            ]);

            $user = User::firstWhere('email', $request['email']);

            if(!$user){
                return response()->json(['message' => 'Data tidak ditemukan, silahkan mendaftar terlebih dahulu!'], 401);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['message' => 'Login Sukses', 'access_token' => $token, 'token_type' => 'Bearer'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function profile()
    {
        try {
            return response()->json(['message' => 'Sukses', 'data' => auth()->user()], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $user = auth()->user();

            $user->update([
                'name'      => $request->name ?? $user->name,
                'email'     => $request->email ?? $user->email,
                'password'  => $request->password ? Hash::make($request->password) : $user->password,
            ]);
            return response()->json(['message' => 'Update Sukses', 'data' => $user], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Logout Sukses'], 200);
    }
}
