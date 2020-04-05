<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Recuperando resultados

class ProveedorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        if($request):
            $searchText = $request->searchText;
            $dataPersona = DB::table('persona')
                                ->where('nombre', 'LIKE', '%'.$searchText.'%')->where('tipo_persona', '=', 'Proveedor')
                                ->orWhere('num_documento', 'LIKE', '%'.$searchText.'%')->where('tipo_persona', '=', 'Proveedor')
                                ->orderBy('idpersona', 'ASC')
                                ->paginate('10');
            return view('proveedor.index', compact('dataPersona', 'searchText'));
        endif;
    }

    public function create(){
        return view('proveedor.create');
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
            "email"          => "max:50|email|nullable"
        ]);

        /* Guardamos persona */
        $personaNueva                 = new App\Persona;
        $personaNueva->tipo_persona   = "Proveedor";
        $personaNueva->nombre         = $request->nombre;
        $personaNueva->tipo_documento = $request->tipo_documento;
        $personaNueva->num_documento  = $request->num_documento;
        $personaNueva->direccion      = $request->direccion;
        $personaNueva->telefono       = $request->telefono;
        $personaNueva->email          = $request->email;
        $personaNueva->save();        
        return back()->with('mensaje', 'Proveedor agregado');
    }

    public function show($id){
        $dataPersona = App\Persona::findOrFail($id);
        return view('proveedor.show', compact('dataPersona'));
    }

    public function edit($id){
        $dataPersona = App\Persona::findOrFail($id);
        return view('proveedor.edit', compact('dataPersona'));
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
            "email"          => "max:50|email|nullable"
        ]);

        /* Guardamos persona */
        $personaActualizada                 = App\Persona::findOrFail($id);
        $personaActualizada->tipo_persona   = "Proveedor";
        $personaActualizada->nombre         = $request->nombre;
        $personaActualizada->tipo_documento = $request->tipo_documento;
        $personaActualizada->num_documento  = $request->num_documento;
        $personaActualizada->direccion      = $request->direccion;
        $personaActualizada->telefono       = $request->telefono;
        $personaActualizada->email          = $request->email;
        $personaActualizada->update();        
        return back()->with('mensaje', 'Proveedor editado');
    }

    public function destroy($id){
        /* Eliminar persona */
        $personaActualizada = App\Persona::findOrFail($id);        
        $personaActualizada->delete();
        return back()->with('mensaje_eliminado', 'Proveedor eliminado'); 
    }
}
