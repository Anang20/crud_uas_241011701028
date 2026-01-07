<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credential = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $token = $user->createToken('web_api_token')->plainTextToken;
            session(['api_token' => $token]);
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $validateData = $request->validate([
            'name' =>  'required|string|max:255',
            'username' => 'required|string|max:50|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $validateData['name'],
            'username' => $validateData['username'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'role'     => $validateData['email'],
        ]);

        Auth::login($user);
        return redirect()->intended('/dashboard');
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->tokens()->delete();
        }
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
