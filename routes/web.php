<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view("/home", "vehiculos.index")->name("home.index");
Route::view("/vehiculo/crear", "vehiculos.crear")->name("vehiculos.create");
Route::view("/vehiculo/editar", "vehiculos.actualizar")->name("vehiculos.update");