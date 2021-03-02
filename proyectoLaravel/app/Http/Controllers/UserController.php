<?php


namespace App\Http\Controllers;


use App\Models\Cesta;
use App\Models\Historial;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function getUserList(){
        $users = User::all();
        return view('usuarios.userList',['arrayUsuarios' => $users]);
    }

    public function getCreate(){
        $roles = Role::all();
        return view('usuarios.userCreate',['roles' => $roles]);
    }

    public function getEdit($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('usuarios.userEdit',array('id'=>$id),['user' => $user, 'roles' => $roles]);
    }

    public function getDelete($id){
        User::destroy($id);
        $users = User::all();
        return view('usuarios.userList',['arrayUsuarios' => $users]);
    }

    public function getMiCuenta(){
        $user = User::findOrFail(Auth::id());
        return view('usuarios.miCuenta',['user' => $user]);
    }

    public function getHistorial($id){
        $historial = Historial::where('user_id', $id)->get();
        return view ('usuarios.historial',array('id'=>$id),['arrayHistorial' => $historial]);
    }

    public function getCesta($id){
        $cesta = Cesta::where('user_id', $id)->get();
        return view ('usuarios.cesta',array('id'=>$id),['arrayCesta' => $cesta]);
    }

    public function store(Request $request)
    {
        $messages=[
            'email.required' =>'Debe introducir un email',
            'email.email' =>'Debe introducir un email válido',
            'password.required' =>'Debe introducir una contraseña',
            'password.min' =>'La contraseña ha de tener 4 o más dígitos',
            'nombre.required' =>'Debe introducir un nombre',
            'apellido.required' =>'Debe introducir un apellido',
            'direccion.required' =>'Debe introducir una dirección',
            'ciudad.required' =>'Debe introducir una ciudad',
            'telefono.required' =>'Debe introducir un teléfono',
            'telefono.min' =>'El teléfono ha de tener 9 o más dígitos',
        ];
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
            'nombre'=>'required',
            'apellido'=>'required',
            'direccion' => 'required',
            'ciudad'=>'required',
            'telefono'=>'required|min:9'
        ],$messages);

        $usuario = new User();
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->nombre=$request->nombre;
        $usuario->apellido=$request->apellido;
        $usuario->direccion=$request->direccion;
        $usuario->ciudad=$request->ciudad;
        $usuario->telefono=$request->telefono;



        $usuario->save();

        if(Auth::user()->roles->contains(1)){

            $usuario->roles()->attach(Role::where('name',$request->rol)->first());

            $usuario->save();

            $users = User::all();
            return redirect()->route('usuarios')->with('arrayUsuarios', $users);
        }else{
            return redirect()->route('login');
        }


    }

    public function update(Request $request, $id)
    {

        $messages = [
            'email.required' => 'Debe introducir un email',
            'email.email' => 'Debe introducir un email válido',
            'password.required' => 'Debe introducir una contraseña',
            'password.min' => 'La contraseña ha de tener 4 o más dígitos',
            'nombre.required' => 'Debe introducir un nombre',
            'apellido.required' => 'Debe introducir un apellido',
            'direccion.required' => 'Debe introducir una dirección',
            'ciudad.required' => 'Debe introducir una ciudad',
            'telefono.required' => 'Debe introducir un teléfono',
            'telefono.min' => 'El teléfono ha de tener 9 o más dígitos',

        ];
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'telefono' => 'required|min:9'
        ], $messages);

        $usuario = User::findOrFail($id);

        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->direccion = $request->direccion;
        $usuario->ciudad = $request->ciudad;
        $usuario->telefono = $request->telefono;
        $usuario->save();

        if (Auth::user()->roles->contains(1)) {

            //No queremos que un administrador pueda quitarle el rol a otro para evitar problemas
            if (!$usuario->roles->contains(1)) {
                $usuario->roles()->sync(Role::where('name', $request->rol)->first());
            }

            $usuario->save();

            $users = User::all();
            return redirect()->route('usuarios')->with('arrayUsuarios', $users);
        } else {
            return redirect()->route('miCuenta');
        }
    }

}
