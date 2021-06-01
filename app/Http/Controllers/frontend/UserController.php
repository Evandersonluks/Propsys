<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showFormRegister()
    {
        return view('frontend.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if( !(new UserService)->saveUser($request->all()) ) {
            return redirect()->back()->with('danger', 'Erro ao inserir usuário.');
        }

        return redirect()->route('login');
    }
}
