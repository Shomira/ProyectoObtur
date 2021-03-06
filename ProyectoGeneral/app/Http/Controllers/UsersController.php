<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!isset(Auth::user()->rol)){return redirect('login');}
        
        $usuarios = DB::select("SELECT  u.name, u.id, u.rol, u.email, p.nombre as 'provincia', c.nombre as 'canton' 
                                FROM users u, provincias p, cantons c
                                WHERE u.idCanton = c.id AND p.id = c.idProvincia
                                ORDER BY u.id");

        $provincias = DB::table('provincias')
                    ->select('provincias.*')
                    ->orderBy('id','ASC')
                    ->get();
        
        if(Auth::user()->rol != 'Administrador'){return redirect('home');}
        return view('gestionUsuarios')->with('usuarios', $usuarios)
                                        ->with('provincias', $provincias);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request -> all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rol' => ['required', Rule::in(['Administrador', 'Establecimiento']) ],
            'password' => ['required', 'string', 'min:8', 'required_with:password_confirmation','same:password_confirmation'],
            'password_confirmation' => ['required']
        ],$messages = [
            'same' => 'Las contraseñas no coinciden.',
            'in' => 'El rol solo puede ser: Administrador o Establecimiento',
            'min' => 'El tamaño mínimo de la contraseña debe ser de 8 caracteres ',
        ]);
        
        if($validator -> fails()){
            
            return back()
                ->withInput()
                ->with('ErrorInsert', 'Favor de llenar correctamente todos los campos')
                ->withErrors($validator);
        } else {
            User::create([
                'name' => $request->name,
                'idCanton' => $request->canton,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'rol' => $request->rol,
                
            ]);
            Alert::success('Listo', 'Usuario Creado Correctamente');
            return back();
        }

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::success('Listo', 'El usuario se eliminó correctamente')->autoclose(2000);

        return back();
    }
    
    public function editarUsuario(Request $request)
    {
        $user = User::find($request->id);
        $validator = Validator::make($request -> all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'rol' => ['required', Rule::in(['Administrador', 'Establecimiento']) ]
        ],$messages = [
            'same' => 'Las contraseñas no coinciden.',
            'in' => 'El rol solo puede ser: Administrador o Establecimiento',
            'min' => 'El tamaño mínimo de la contraseña debe ser de 8 caracteres ',
        ]);

        if($validator -> fails()){
            return back()
                ->withInput()
                ->with('ErrorInsert', 'Favor de llenar correctamente todos los campos')
                ->withErrors($validator);
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->rol = $request->rol;
        
        
            $user->save();
            Alert::success('Listo', 'Usuario actualizado correctamente');
            return back();
        }

    }

    public function datosEditar(Request $request){
        $datos= DB::select("SELECT  u.name, u.id, u.rol, u.email, p.id as 'provincia', c.id as 'canton' 
                            FROM users u, provincias p, cantons c
                            WHERE u.idCanton = c.id AND p.id = c.idProvincia AND u.id = '$request->id' ");

        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

    public function cantones(Request $request){
        $datos= DB::select("SELECT * FROM cantons WHERE idProvincia = '$request->id' ");

        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }
}
