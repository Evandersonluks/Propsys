<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if(Auth::check()) return redirect()->route('home');

        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $creds = $request->only('email', 'password');

        if(Auth::attempt($creds)) {
            return redirect()->route('home');
        }

        return redirect()->back()->with('danger', 'Login e/ou senha incorretos.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
