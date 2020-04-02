<?php

use Illuminate\Support\Facades\Route;

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

/* Categoria */
// Route::get('/', 'CategoriaController@index');
Route::resources([
    'categoria' => 'CategoriaController',
    'articulo' => 'ArticuloController',
    'cliente' => 'ClienteController',
    'proveedor' => 'ProveedorController',
    'ingreso' => 'IngresoController'
]);

//Auth::routes();
Auth::routes([
            'register' => false, 
            'reset' => false, 
            'confirm' => false
            ]);

Route::get('/home', 'HomeController@index')->name('home');
