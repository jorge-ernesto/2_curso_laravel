<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Recuperando resultados
use Illuminate\Support\Facades\Gate;

/**
 * Comprobar data
 * error_log(json_encode($dataCategoria));
 * 
 * echo "<pre>";
 * print_r($dataCategoria);
 * echo "</pre>";
 * die();
 * 
 * ->dd(); //Convierte a sql, detiene la ejecucion, usarlo sin get, first, paginate
 * ->toSql(); //Convierte a sql, tiene sentido de sintaxis, pero nunca me funciono
 * dd(); //Verifica cualquier variable, detiene la ejecucion
 * dump(); //Verifica cualquier variable, no detiene la ejecucion
 */

class CategoriaController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {      
        /* Gate de acceso */
        Gate::authorize('haveaccess', 'category.index');
        
        if($request){
            $searchText = $request->searchText;
            $dataCategoria  = DB::table('categoria')
                                    ->where('nombre', 'LIKE', '%'.$searchText.'%')
                                    ->where('condicion', '=', '1')
                                    ->orderBy('idcategoria', 'ASC')
                                    ->paginate('10');
            return view('almacen.categoria.index', compact('dataCategoria', 'searchText'));
        }
    }
 
    public function create()
    {
        /* Gate de acceso */
        Gate::authorize('haveaccess', 'category.create');

        return view('almacen.categoria.create');
    }
    
    public function store(Request $request)
    {
        /* Gate de acceso */
        Gate::authorize('haveaccess', 'category.create');

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

    public function show($id)
    {    
        /* Gate de acceso */
        Gate::authorize('haveaccess', 'category.show');
        
        $dataCategoria = App\Categoria::findOrFail($id);
        return view('almacen.categoria.show', compact('dataCategoria'));
    }

    public function edit($id)
    {     
        /* Gate de acceso */
        Gate::authorize('haveaccess', 'category.edit');
        
        $dataCategoria = App\Categoria::findOrFail($id);
        return view('almacen.categoria.edit', compact('dataCategoria'));
    }

    public function update(Request $request, $id)
    {
        /* Gate de acceso */
        Gate::authorize('haveaccess', 'category.edit');

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

    public function destroy($id)
    {
        /* Gate de acceso */
        Gate::authorize('haveaccess', 'category.destroy');

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
