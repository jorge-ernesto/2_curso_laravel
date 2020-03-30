<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Ejecución de consultas SQL sin procesar

class ArticuloController extends Controller
{    
    public function index(Request $request){
        if($request):
            $searchText = $request->searchText;
            $dataArticulo  = DB::table('articulo as a')
                                    ->join('categoria as c', 'a.idcategoria', '=', 'c.idcategoria')
                                    ->select('a.idarticulo', 'c.nombre as categoria', 'a.codigo', 'a.nombre', 'a.stock', 'a.descripcion', 'a.imagen', 'a.estado')
                                    ->where('a.nombre', 'like', '%'.$searchText.'%')
                                    ->where('a.estado', '=', '1')
                                    ->orderBy('a.idarticulo', 'asc')
                                    ->paginate('10');            
            return view('articulo.index', compact('dataArticulo', 'searchText'));
        endif;
    }
    
    public function create(){
        $dataCategoria  = DB::table('categoria')
                            ->where('condicion', '=', '1')
                            ->get();
        return view('articulo.create', compact('dataCategoria'));
    }
    
    public function store(Request $request){
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            "idcategoria" => "required",
            "codigo"      => "required|max:50",
            "nombre"      => "required|max:100",
            "stock"       => "required|numeric",
            "descripcion" => "required|max:512", 
            "imagen"      => "mimes:jpeg,bmp,png"
        ]);

        /* Guardamos articulo */
        $articuloNuevo              = new App\Articulo;
        $articuloNuevo->idcategoria = $request->idcategoria;
        $articuloNuevo->codigo      = $request->codigo;
        $articuloNuevo->nombre      = $request->nombre;
        $articuloNuevo->stock       = $request->stock;
        $articuloNuevo->descripcion = $request->descripcion;                
        /* Imagen */
        if(Input::hasFile('imagen')):
            $file = Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/', $file->getClientOriginalName());
            $articuloNuevo->imagen = $file->getClientOriginalName();
        endif;                
        $articuloNuevo->estado      = 'Activo';
        $articuloNuevo->save();        
        return back()->with('mensaje', 'Articulo agregado');
    }
    
    public function show($id){        
        $dataArticulo = App\Articulo::findOrFail($id);
        return view('articulo.show', compact('dataArticulo'));
    }

    public function edit($id){        
        $dataCategoria  = DB::table('categoria')
                            ->where('condicion', '=', '1')
                            ->get();
        $dataArticulo = App\Articulo::findOrFail($id);        
        return view('articulo.edit', compact('dataCategoria', 'dataArticulo'));
    }

    public function update(Request $request, $id){
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            "idcategoria" => "required",
            "codigo"      => "required|max:50",
            "nombre"      => "required|max:100",
            "stock"       => "required|numeric",
            "descripcion" => "required|max:512", 
            "imagen"      => "mimes:jpeg,bmp,png"
        ]);

        /* Guardamos articulo */
        $articuloActualizado              = new App\Articulo;
        $articuloActualizado->idcategoria = $request->idcategoria;
        $articuloActualizado->codigo      = $request->codigo;
        $articuloActualizado->nombre      = $request->nombre;
        $articuloActualizado->stock       = $request->stock;
        $articuloActualizado->descripcion = $request->descripcion;                
        /* Imagen */
        if(Input::hasFile('imagen')):
            $file = Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/', $file->getClientOriginalName());
            $articuloActualizado->imagen = $file->getClientOriginalName();
        endif;                
        $articuloActualizado->estado      = 'Activo';
        $articuloActualizado->update();        
        return back()->with('mensaje', 'Articulo editado');
    }

    public function destroy($id){
        /* Cambiar estado de articulo */
        $articuloActualizado = App\Articulo::findOrFail($id);
        $articuloActualizado->estado = 'Inactivo';
        $articuloActualizado->update();
        return back()->with('mensaje_eliminado', 'Articulo eliminado');

        /* Eliminar articulo */
        $articuloActualizado = App\Articulo::findOrFail($id);        
        $articuloActualizado->delete();
        return back()->with('mensaje_eliminado', 'Articulo eliminado');        
    }
}