<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Client;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $departamentos = Department::all();
        return view('auth.register',compact('departamentos'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'tipoDoc'=> 'required',
            'documento'=> 'required|unique:clients,n_doc',
            'departamento'=> 'required',
            'nombres'=> 'required',
            'apellidos'=> 'required',
            'email'=>'required|unique:users',
            'contraseña'=> 'required',
            'confirmar'=>'required'
        ],
        [
            'tipoDoc.required'=>'El tipo de documento es requerido',
            'documento.required'=> 'Su número de identificación es requerido',
            'documento.unique'=> 'El número de documento se encuentra registrado',
            'departamento.required'=>'El departamento es requerido',
            'nombres.required'=> 'Su nombre es requerido',
            'apellidos.required' => 'Su apellido es requerido',
            'email.required'=> 'Su correo es requerido',
            'email.unique'=> 'El correo ya se encuentra registrado',
            'contraseña.required'=> 'Su contraseña es requerido',
            'confirmar.required' => 'Debe aceptar los término y condiciones.'
        ]
        );

        $user = new User();

        $user->name = $request->nombres." ".$request->apellidos;
        $user->email = $request->email;
        $user->password = Hash::make($request->contraseña);
        $user->save();

        Client::create([
            'user_id'=> $user->id,
            'n_doc'=> $request->documento,
            'tipo_doc'=> $request->tipoDoc,
            'departamento' => $request->departamento,
            'pass'=>$request->contraseña,
            'nombres' => $request->nombres,
            'apellidos'=> $request->apellidos,
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
