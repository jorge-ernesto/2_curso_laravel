<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Recuperando resultados
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {        
        if($request):
            $searchText = $request->searchText;
            $dataUsuario  = DB::table('users as u')
                                ->join('role_user as ru', 'ru.user_id', '=', 'u.id')
                                ->join('roles as r', 'ru.role_id', '=', 'r.id')
                                ->select('u.id', 'u.name', 'u.email', 'u.password', 'u.created_at', 'u.updated_at', 
                                         'r.id as role_id', 'r.name as role_name')
                                ->where('u.name', 'LIKE', '%'.$searchText.'%')                                    
                                ->orWhere('u.email', 'LIKE', '%'.$searchText.'%')                                    
                                ->orWhere('r.name', 'LIKE', '%'.$searchText.'%')                                    
                                ->orderBy('u.id', 'ASC')
                                ->paginate('10');
            return view('usuario.index', compact('dataUsuario', 'searchText'));
        endif;
    }

    public function create()
    {
        $dataRole = DB::table('roles')->get();
        return view('usuario.create', compact('dataRole'));
    }

    public function store(Request $request)
    {
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request user, role */
        $request->validate([
            "name"     => "required|max:255",
            "email"    => "required|email|max:255|unique:users",
            "password" => "required|min:8|confirmed",
            "role_id"  => "required"
        ]);

        try{
            DB::beginTransaction();            
            
            /* Guardamos user */
            $usuario           = new App\User;
            $usuario->name     = $request->name;
            $usuario->email    = $request->email;
            $usuario->password = Hash::make($request->password);            
            $role_id           = $request->role_id;
            $usuario->save();

            /* Guardamos role */                        
            $user_id = $usuario->id;
            DB::insert(" INSERT INTO role_user (role_id, user_id, created_at, updated_at) VALUES ('$role_id', '$user_id', NOW(), NOW()) ");
             
            DB::commit();
            return back()->with('mensaje', 'Usuario agregado');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('mensaje_rollback', 'ROLLBACK: Usuario no se pudo agregar');
        }
    }

    public function show($id)
    {
        $dataUsuario = App\User::findOrFail($id);
        return view('usuario.show', compact('dataUsuario'));
    }

    public function edit($id)
    {
        $dataRole = DB::table('roles')->get();
        $dataUsuario = DB::table('users as u')
                            ->join('role_user as ru', 'ru.user_id', '=', 'u.id')
                            ->join('roles as r', 'ru.role_id', '=', 'r.id')
                            ->select('u.id', 'u.name', 'u.email', 'u.password', 'u.created_at', 'u.updated_at', 
                                     'r.id as role_id', 'r.name as role_name')
                            ->where('u.id', '=', $id)
                            ->first();
        return view('usuario.edit', compact('dataRole', 'dataUsuario'));
    }

    public function update(Request $request, $id)
    {
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request user, role */
        $request->validate([
            "name"     => "required|max:255",
            "email"    => "required|email|max:255|unique:users,email,$id", //El email sera unico, pero puede haber una excepción que el email coincide con el email del id actual
            "password" => "required|min:8|confirmed",
            "role_id"  => "required"
        ]);

        try{
            DB::beginTransaction();            
            
            /* Guardamos user */
            $usuario           = App\User::findOrFail($id);
            $usuario->name     = $request->name;
            $usuario->email    = $request->email;
            $usuario->password = Hash::make($request->password);
            $role_id           = $request->role_id;      
            $usuario->update();

            /* Guardamos role */                  
            DB::update("UPDATE role_user SET role_id = '$role_id', updated_at = NOW() WHERE user_id = '$id' ");
             
            DB::commit();
            return back()->with('mensaje', 'Usuario editado');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('mensaje_rollback', 'ROLLBACK: Usuario no se pudo editar');
        }
    }

    public function destroy($id)
    {
        /* Eliminar user */
        $usuario = App\User::findOrFail($id);        
        $usuario->delete();
        return back()->with('mensaje_eliminado', 'Usuario eliminado');        
    }
}
