<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\VendaController;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware([
    'web',
    'auth',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('/', function () {
        session(['tela_atual' => 'Dashboard']);
        return view('dashboard');
    })->name('home');

    Route::get('/clientes', function (){
        return view('clientes.index');
    })->name('clientes.index');
    Route::get('/clientes-novo', function (){
        return view('clientes.show');
    })->name('clientes.novo');
    Route::get('/clientes-exibir/{id}', [ClienteController::class, 'show'])->name('clientes.exibir');
    Route::post('/clientes-salvar', [ClienteController::class, 'store'])->name('clientes.salvar');
    Route::get('/clientes-excluir/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.excluir');

    Route::get('/produtos', function (){
        return view('produtos.index');
    })->name('produtos.index');
    Route::get('/produtos-novo', function (){
        return view('produtos.show');
    })->name('produtos.novo');
    Route::get('/produtos-exibir/{id}', [ProdutoController::class, 'show'])->name('produtos.exibir');
    Route::post('/produtos-salvar', [ProdutoController::class, 'store'])->name('produtos.salvar');
    Route::get('/produtos-desativar/{id}/{status}', [ProdutoController::class, 'desativar'])->name('produtos.desativar');
    Route::get('/produtos-excluir/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.excluir');
    Route::post('/produtos-autocomplete', [ProdutoController::class, 'autocomplete'])->name('produtos.autocomplete');

    Route::get('/vendas/{venda?}', [VendaController::class, 'principal'])->name('vendas.tela');
    Route::post('/vendas-finalizar}', [VendaController::class, 'finalizar'])->name('vendas.finalizar');
    Route::post('/vendas-salvar', [VendaController::class, 'store'])->name('vendas.salvar');
    Route::get('/vendas-deletar/{id}', [VendaController::class, 'destroy'])->name('vendas.excluir');

    Route::post('/vendas-item', [VendaController::class, 'adicionarProduto'])->name('vendas-item.salvar');
    Route::post('/vendas-item-deletar', [VendaController::class, 'itemdestroy'])->name('vendas-item.deletar');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/relatorios-vendas', [RelatorioController::class, 'vendasListagem'])->name('relatorios-vendas.listagem');
});
