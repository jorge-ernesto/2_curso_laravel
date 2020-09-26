<?php

use Illuminate\Support\Facades\Route;

use App\User;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Ruta por defecto */
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

/* Rutas */
// Route::get('/categoria', 'CategoriaController@index')->name('categoria.index');;
Route::resources([
    'categoria' => 'CategoriaController',
    'articulo'  => 'ArticuloController',
    'cliente'   => 'ClienteController',
    'proveedor' => 'ProveedorController',
    'ingreso'   => 'IngresoController',
    //'venta'     => 'VentaController',
    'usuario'   => 'UsuarioController'
]);

/* Rutas de la autenticación */
// Auth::routes();

/* Desactivamos las rutas register, reset, confirm de la autenticación */
Auth::routes([
            'register' => false, 
            'reset'    => false, 
            'confirm'  => false
            ]);

Route::get('/home', 'HomeController@index')->name('home');

/* Ruta para pruebas */
Route::get('/test', function(){
    /* User */
    $dataUser  = App\User::all();
    $dataUser2 = DB::select('select * from users');
    $dataUser3 = DB::table('users')
                    ->get();

    foreach($dataUser as $key=>$user):        
        echo "<h1>{$user->name}</h1>";

        foreach($user->roles as $key=>$role):
            echo "<h3>{$role->name}       </h3>";            
            echo "<p> {$role->description}</p>";
            echo "<p> {$role->created_at} </p>";
            echo "<p> {$role->updated_at} </p>";
        endforeach;
        echo "<hr>";
    endforeach;
    /* Fin User */
         
    /* User find */
    $dataUser = App\User::find(1);
    foreach($dataUser->roles as $key=>$role):
        echo $role->name;
        echo "<hr>";
    endforeach;
    /* Fin User find */
    
    /* Otra forma */
    echo $dataRole = App\User::find(1)->roles()->get();
    /* Fin Otra forma */
});
