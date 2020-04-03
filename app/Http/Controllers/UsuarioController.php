<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Recuperando resultados
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){        
        if($request):
            $searchText = $request->searchText;
            $dataUsuario  = DB::table('users as u')
                                ->join('role_user as ru', 'ru.user_id', '=', 'u.id')
                                ->join('roles as r', 'ru.role_id', '=', 'r.id')
                                ->select('u.id', 'u.name as user', 'u.email', 'u.password', 'r.name as role', 'u.created_at', 'u.updated_at')
                                ->where('u.name', 'LIKE', '%'.$searchText.'%')                                    
                                ->orderBy('u.id', 'ASC')
                                ->orderBy('r.id', 'ASC')
                                ->paginate('10');
            return view('usuario.index', compact('dataUsuario', 'searchText'));
        endif;
    }

    public function create(){
        $dataRole = DB::table('roles')                            
                            ->get();
        return view('usuario.create', compact('dataRole'));
    }

    public function store(Request $request){
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            "name"     => "required|max:255",
            "email"    => "required|email|max:255|unique:users",
            "password" => "required|min:8|confirmed",

            "role_id" => "required",
        ]);

        try{
            DB::beginTransaction();            
            
            /* Guardamos usuario */
            $usuario           = new App\User;
            $usuario->name     = $request->name;
            $usuario->email    = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->save();        

            /* Guardamos role */
            $role_id = $usuario->role_id;
            $user_id = $usuario->id;     
            $date    = Carbon::now('America/Lima');            
            $date    = $date->toDateTimeString();
            DB::insert('insert into role_user (role_id, user_id, created_at, updated_at) values (?, ?, ?, ?)', [$role_id, $role_id, $date, $date]);
            
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }                             
        return back()->with('mensaje', 'Usuario agregado');
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
