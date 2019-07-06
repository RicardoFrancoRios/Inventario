<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Se agregan las rutas correspondientes a los controladores de nuestras vistas
Route::resource('inventario/ventas','VentasController');
Route::resource('inventario/inv','InventarioController');