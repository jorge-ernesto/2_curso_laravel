<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\Permission;

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
        return $request->all();
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
