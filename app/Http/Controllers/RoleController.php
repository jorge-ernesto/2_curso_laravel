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
            "name"        => "required|max:50|unique:roles",
            "slug"        => "required|max:50|unique:roles",
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
