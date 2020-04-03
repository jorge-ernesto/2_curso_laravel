<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Recuperando resultados

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
        return view('usuario.create');
    }

    public function store(Request $request){
        //
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
