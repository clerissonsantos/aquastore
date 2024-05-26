<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/clientes', function (){
    return view('clientes.index');
})->name('clientes.index');
Route::get('/clientes-novo', function (){
    return view('clientes.show');
})->name('clientes.novo');
Route::get('/clientes-exibir/{id}', [ClienteController::class, 'show'])->name('clientes.exibir');
Route::post('/clientes-salvar', [ClienteController::class, 'store'])->name('clientes.salvar');

