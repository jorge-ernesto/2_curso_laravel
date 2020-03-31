<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Ejecución de consultas SQL sin procesar

class IngresoController extends Controller
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
            "idproveedor" => "required",
            "tipo_comprobante" => "required|max:20",
            "serie_comprobante" => "max:7",
            "num_comprobante" => "required|max:10"
        ]);

        /* Validar request */
        $request->validate([
            "idarticulo" => "required",
            "cantidad" => "required|numeric",
            "precio_compra" => "required|numeric",
            "precio_venta" => "required|numeric"
        ]);
    }

    public function show($id){
        
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){
        /* Obtenemos todo el request */
        // return $request->all();

        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            "idproveedor" => "required",
            "tipo_comprobante" => "required|max:20",
            "serie_comprobante" => "max:7",
            "num_comprobante" => "required|max:10"
        ]);

        /* Validar request */
        $request->validate([
            "idarticulo" => "required",
            "cantidad" => "required|numeric",
            "precio_compra" => "required|numeric",
            "precio_venta" => "required|numeric"
        ]);
    }

    public function destroy($id){
        
    }
}
