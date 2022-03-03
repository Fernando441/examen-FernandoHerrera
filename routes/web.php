<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', function () {
    return view('welcome');
});

Route::post('/agregar-contacto', [App\Http\Controllers\ContactoController::class, 'store'])->name('contactos.agregar');

Route::get('/lista-contactos', [App\Http\Controllers\ContactoController::class, 'index'])->name('contactos.lista');

Route::post('/eliminar-contacto', [App\Http\Controllers\ContactoController::class, 'destroy'])->name('contactos.delete');

Route::get('/editar-contacto/{id}', [App\Http\Controllers\ContactoController::class, 'edit'])->name('contactos.editar');

Route::post('/update-contacto', [App\Http\Controllers\ContactoController::class, 'update'])->name('contactos.update');

