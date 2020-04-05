<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Recuperando resultados
use Illuminate\Support\Carbon;

class IngresoController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request){        
        if($request):
            $searchText = $request->searchText;            
            $dataIngreso  = DB::table('ingreso as i')                                
                                ->join('persona as p', 'i.idproveedor', '=', 'p.idpersona')
                                ->join('detalle_ingreso as di', 'i.idingreso', '=', 'di.idingreso')                                
                                ->select('i.idingreso', 'p.nombre as proveedor', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.fecha_hora', 'i.impuesto', 'i.estado', DB::raw('SUM(di.cantidad * di.precio_compra) as total'))
                                ->where('i.num_comprobante', 'LIKE', '%'.$searchText.'%')                                                            
                                ->groupBy('i.idingreso')
                                ->orderBy('i.idingreso', 'ASC')                                
                                ->paginate(10);
            return view('ingreso.index', compact('dataIngreso', 'searchText'));                                
        endif;
    }
    
    public function create(){
        $dataArticulo = DB::table('articulo as a')
                            ->select(DB::raw('a.idarticulo, CONCAT(a.codigo," ",a.nombre) as articulo'))
                            ->where('a.estado', '=', 'Activo')
                            ->get();
        $dataPersona = DB::table('persona')
                            ->where('tipo_persona', '=', 'Proveedor')
                            ->get();        
        return view('ingreso.create', compact('dataArticulo', 'dataPersona'));
    }
    
    public function store(Request $request){
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request ingreso, detalle */
        $request->validate([
            "idproveedor"       => "required",
            "tipo_comprobante"  => "required|max:20",
            "serie_comprobante" => "max:7",
            "num_comprobante"   => "required|max:10",

            "idarticulo"    => "required",
            "cantidad"      => "required",
            "precio_compra" => "required",
            "precio_venta"  => "required"
        ]);

        try{
            DB::beginTransaction();            
            
            /* Guardamos ingreso */
            $ingreso                    = new App\Ingreso;
            $ingreso->idproveedor       = $request->idproveedor;
            $ingreso->tipo_comprobante  = $request->tipo_comprobante;
            $ingreso->serie_comprobante = $request->serie_comprobante;
            $ingreso->num_comprobante   = $request->num_comprobante;
            $date                       = Carbon::now('America/Lima');
            $ingreso->fecha_hora        = $date->toDateTimeString();            
            $ingreso->impuesto          = 18;
            $ingreso->estado            = "A";
            $ingreso->save();                        

            /* Guardamos detalle */
            $idingreso          = $ingreso->idingreso;
            $idarticulo_array   = $request->idarticulo;
            $cantidad_array     = $request->cantidad;
            $preciocompra_array = $request->preciocompra;
            $precioventa_array  = $request->precioventa;
                        
            $cont = 1;
            while($cont < count($idarticulo_array)): 
                $detalle               = new App\DetalleIngreso;
                $detalle->idingreso    = $idingreso;
                $detalle->idarticulo   = $idarticulo_array[$cont];
                $detalle->cantidad     = $cantidad_array[$cont];
                $detalle->preciocompra = $preciocompra_array[$cont];
                $detalle->precioventa  = $precioventa_array[$cont];              
                $detalle->save();
                $cont++;
            endwhile;

            DB::commit();
            return back()->with('mensaje', 'Ingreso agregado');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('mensaje_rollback', 'ROLLBACK: Ingreso no se pudo agregar');
        }                             
    }

    public function show($id){
        $dataIngreso = DB::table('ingreso as i')
                            ->join('persona as p', 'i.idproveedor', '=', 'p.idpersona')
                            ->join('detalle_ingreso as di', 'i.idingreso', '=', 'di.idingreso')
                            ->select('i.idingreso', 'p.nombre', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.fecha_hora', 'i.impuesto', 'i.estado', DB::raw('SUM(di.cantidad * di.precio_compra) as total'))
                            ->where('i.idingreso', '=', $id)                                                            
                            ->first();
        $dataDetalle = DB::table('detalle_ingreso as di')
                            ->join('articulo as a', 'di.idarticulo', '=', 'a.idarticulo')
                            ->select(DB::raw('a.idarticulo, CONCAT(a.codigo," ",a.nombre) as articulo'), 'di.cantidad', 'di.precio_compra')
                            ->where('di.idingreso', '=', $id)
                            ->get();
        return view('ingreso.show', compact('dataIngreso', 'dataDetalle'));
    }

    public function edit($id){        
    }

    public function update(Request $request, $id){        
    }

    public function destroy($id){
        /* Cambiar estado de ingreso */
        $ingreso = App\Ingreso::findOrFail($id);
        $ingreso->estado = "C";
        $ingreso->update();
        return back()->with('mensaje_eliminado', 'Ingreso eliminado');

        /* Eliminar ingreso */
        $ingreso = App\Ingreso::findOrFail($id);        
        $ingreso->delete();
        return back()->with('mensaje_eliminado', 'Ingreso eliminado');        
    }
}
