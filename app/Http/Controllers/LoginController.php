<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'El usuario es requerido',
                'password.required' => 'La contraseña es requerida'
            ]
        );

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Usuario y/o Contraseña incorrectos.');
        }

            return redirect()->route('admin.clientes');
    
        
    }

    public function viewPassword()
    {
        return view('auth.password');
    }


    public function logout()
    {
       auth()->logout();
        return redirect()->route("view.login");
    }
}
