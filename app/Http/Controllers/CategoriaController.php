<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Recuperando resultados

/**
   Controladores
 * Los basicos
 * Controladores de recursos
 * @link https://laravel.com/docs/7.x/controllers#resource-controllers
 * 
 * Los basicos
 * Validación
 * @link https://laravel.com/docs/7.x/validation#quick-writing-the-validation-logic
 * 
   Modelos
 * ORM Elocuent
 * Definiendo modelos
 * @link https://laravel.com/docs/7.x/eloquent#defining-models
 * 
   App
 * ORM Elocuent
 * Recuperando modelos
 * @link https://laravel.com/docs/7.x/eloquent#retrieving-models
 * 
   DB
 * Base de datos
 * Ejecución de consultas SQL sin procesar
 * @link https://laravel.com/docs/7.x/database#running-queries
 * 
 * Base de datos
 * Recuperando resultados
 * @link https://laravel.com/docs/7.x/queries#retrieving-results
 * 
   Comprobar data
 * echo "<pre>";
 * print_r($dataCategoria);
 * echo "</pre>";
 * die();
 * 
 * ->dd();
 * dd($data);
 * dump($data);
 * ->toSql();
 */

class CategoriaController extends Controller
{    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){        
        if($request):
            $searchText = $request->searchText;
            $dataCategoria  = DB::table('categoria')
                                    ->where('nombre', 'LIKE', '%'.$searchText.'%')
                                    ->where('condicion', '=', '1')
                                    ->orderBy('idcategoria', 'ASC')
                                    ->paginate('10');
            return view('categoria.index', compact('dataCategoria', 'searchText'));
        endif;
    }
 
    public function create(){
        return view('categoria.create');
    }
    
    public function store(Request $request){
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            "nombre"      => "required|max:50",
            "descripcion" => "required|max:256"
        ]);

        /* Guardamos categoria */
        $categoriaNueva              = new App\Categoria;
        $categoriaNueva->nombre      = $request->nombre;
        $categoriaNueva->descripcion = $request->descripcion;
        $categoriaNueva->condicion   = 1;
        $categoriaNueva->save();        
        return back()->with('mensaje', 'Categoria agregada');
    }

    public function show($id){        
        $dataCategoria = App\Categoria::findOrFail($id);
        return view('categoria.show', compact('dataCategoria'));
    }

    public function edit($id){        
        $dataCategoria = App\Categoria::findOrFail($id);
        return view('categoria.edit', compact('dataCategoria'));
    }

    public function update(Request $request, $id){
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            "nombre"      => "required|max:50",
            "descripcion" => "required|max:256"
        ]);

        /* Guardamos categoria */
        $categoriaActualizada              = App\Categoria::findOrFail($id);
        $categoriaActualizada->nombre      = $request->nombre;
        $categoriaActualizada->descripcion = $request->descripcion;        
        $categoriaActualizada->update();        
        return back()->with('mensaje', 'Categoria editada');
    }

    public function destroy($id){
        /* Eliminar categoria */
        $categoriaActualizada = App\Categoria::findOrFail($id);        
        $categoriaActualizada->delete();
        return back()->with('mensaje_eliminado', 'Categoria eliminada');        

        /* Cambiar estado de categoria */
        $categoriaActualizada = App\Categoria::findOrFail($id);
        $categoriaActualizada->condicion = 0;
        $categoriaActualizada->update();
        return back()->with('mensaje_eliminado', 'Categoria eliminada');        
    }
}
