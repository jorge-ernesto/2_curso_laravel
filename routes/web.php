<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

//Ruta por defecto
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {    
    $auth = Auth::user();        

    if(!empty($auth)){
        return view('home');        
    }else{
        return view('auth.login');
    }
});

//RUTAS DE LA APLICACION
    //Rutas de prueba
    Route::get("/pruebas/user", "PruebasController@user");
    Route::get("/pruebas/role", "PruebasController@role");

    //Rutas
    Route::resources([
        'almacen/categoria' => 'CategoriaController',
        'almacen/articulo'  => 'ArticuloController',
        'ventas/cliente'    => 'ClienteController',
        'compras/proveedor' => 'ProveedorController',
        'compras/ingreso'   => 'IngresoController',
        //'venta'           => 'VentaController',
        'acceso/usuario'    => 'UsuarioController'
    ]);

    //Rutas de autenticación
    // Auth::routes();

    // Route::get('/home', 'HomeController@index')->name('home');

    //Rutas de autenticación, desactivamos las rutas register, reset, confirm de la autenticación
    Auth::routes([
        'register' => false, 
        'reset'    => false, 
        'confirm'  => false
    ]);

    Route::get('/home', 'HomeController@index')->name('home');
