<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Ejecución de consultas SQL sin procesar

class PersonaController extends Controller
{
    public function index(){

    }

    public function create(){
        
    }

    public function store(Request $request){
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            // "tipo_persona"   => "required",
            "nombre"         => "required|max:100",
            "tipo_documento" => "required|max:20",
            "num_documento"  => "required|max:15",
            "direccion"      => "max:70",
            "telefono"       => "max:15",
            "email"          => "max:50"
        ]);
    }

    public function show($id){
        
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            // "tipo_persona"   => "required",
            "nombre"         => "required|max:100",
            "tipo_documento" => "required|max:20",
            "num_documento"  => "required|max:15",
            "direccion"      => "max:70",
            "telefono"       => "max:15",
            "email"          => "max:50"
        ]);
    }

    public function destroy($id){
        
    }
}
