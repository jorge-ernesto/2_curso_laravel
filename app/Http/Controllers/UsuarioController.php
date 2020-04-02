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
            $dataUsuario  = DB::table('users')
                                    ->where('name', 'LIKE', '%'.$searchText.'%')                                    
                                    ->orderBy('id', 'ASC')
                                    ->paginate('10');
            return view('usuario.index', compact('dataUsuario', 'searchText'));
        endif;
    }

    public function create(){
        //
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
