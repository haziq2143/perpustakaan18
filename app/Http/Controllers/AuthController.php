<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    public function signIn()
    {
        return view('auth.signIn');
    }

    public function signUp()
    {
        return view('auth.signUp');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => "required|max:25",
            'email' => "required",
            'password' => "required|min:4|max:25"
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'user';
        $validated['code_unique'] = Str::random(6);

        User::create($validated);

        return redirect('/')->with('sign-up', true);
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/books');
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
