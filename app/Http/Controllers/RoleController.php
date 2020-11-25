<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $searchText = $request->searchText;
            $dataRole = Role::orderBy('id', 'ASC')
                            ->paginate('10');
            return view('acceso.role.index', compact('dataRole', 'searchText'));
        }
    }

    public function create()
    {
        $permisos = Permission::get();
        return view('acceso.role.create', compact('permisos'));
    }

    public function store(Request $request)
    {
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            "name"        => "required|max:50|unique:roles,name",
            "slug"        => "required|max:50|unique:roles,slug",
            "full-access" => "required|in:yes,no"
        ]);
                
        try{
            DB::beginTransaction();            
            
            /* Guardamos role */
            $role = Role::create($request->all());      
            
            if(!empty($role) && is_object($role) && isset($role)){
                /* Guardamos permission_role */          
                $role->permissions()->sync( $request->get('permisos') );
            }                                  
             
            DB::commit();
            return back()->with('mensaje', 'Role agregado');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('mensaje_rollback', 'ROLLBACK: Role no se pudo agregar');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        /* Obtenemos todos los permisos existentes */
        $permisos = Permission::get();

        /* Obtenemos los datos del rol a editar */
        $role = Role::findOrFail($id);
        
        /* Obtenemos los permisos del rol a editar y lo convertimos en un array */
        $permisos_ = array();
        foreach ($role->permissions as $key=>$permiso) {
            $permisos_[] = $permiso->id;
        }    

        /* Verificamos los datos, dump no detiene la ejecucion */
        // dump($permisos);
        // dump($role);
        // dump($permisos_);
        // return $permisos_;

        return view('acceso.role.edit', compact('permisos', 'role', 'permisos_'));
    }

    public function update(Request $request, $id)
    {
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            "name"        => "required|max:50|unique:roles,name,$id",
            "slug"        => "required|max:50|unique:roles,slug,$id",
            "full-access" => "required|in:yes,no"
        ]);

        try{
            DB::beginTransaction();            
            
            /* Quitamos los campos que no queremos actualizar */
            $params_array = $request->all();
            unset($params_array['_token']);
            unset($params_array['_method']);
            unset($params_array['permisos']);

            /* Guardamos role */
            $role = Role::where('id', $id)->firstOrFail();
            $role->update($params_array);
            
            if(!empty($role) && is_object($role) && isset($role)){
                /* Guardamos permission_role */          
                $role->permissions()->sync( $request->get('permisos') );
            }                                  
             
            DB::commit();
            return back()->with('mensaje', 'Role actualizado');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('mensaje_rollback', 'ROLLBACK: Role no se pudo actualizar '.$e->getMessage());
        }
    }

    public function destroy($id)
    {
        //
    }
}
