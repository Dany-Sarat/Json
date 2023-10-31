<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vehiculo\VehiculoController;

// rutas de creación y actualización de vehiculo
Route::post("", [VehiculoController::class, 'store'])->name("vehiculo.store");
Route::put("/{id}", [VehiculoController::class, 'update'])->name("vehiculo.update");