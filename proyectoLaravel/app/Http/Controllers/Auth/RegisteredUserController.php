<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
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
            'email' => 'required|email|'.Rule::unique('users'),
            'password' => 'required|min:4',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'telefono' => 'required|min:9',
        ]);



        Auth::login($user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'telefono' => $request->telefono,
            //'password' => Hash::make($request->password),
        ]));

        $user->roles()->attach(Role::where('name','user')->first());
        $user->save();

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
