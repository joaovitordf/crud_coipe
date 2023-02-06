<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PessoasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\TransacoesController;

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

Route::group(['middleware' => 'web'], function() {
    Route::get('/', [HomeController::class, 'index']);
    
    Auth::routes();
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

//------------------------ PESSOAS --------------------------

Route::get('/pessoas', [PessoasController::class, 'index'])->middleware('auth');

Route::get('/pessoas/new', [PessoasController::class, 'new'])->middleware('auth');

Route::post('pessoas/add', [PessoasController::class, 'add'])->middleware('auth');

Route::get('pessoas/{id}/edit', [PessoasController::class, 'edit'])->middleware('auth');

Route::post('pessoas/update/{id}', [PessoasController::class, 'update'])->middleware('auth');

Route::delete('pessoas/delete/{id}', [PessoasController::class, 'delete'])->middleware('auth');

//-----------------------------------------------------------

//------------------------ CATEGORIAS -----------------------

Route::get('/categorias', [CategoriasController::class, 'index'])->middleware('auth');

Route::get('/categorias/new', [CategoriasController::class, 'new'])->middleware('auth');

Route::post('categorias/add', [CategoriasController::class, 'add'])->middleware('auth');

Route::get('categorias/{id}/edit', [CategoriasController::class, 'edit'])->middleware('auth');

Route::post('categorias/update/{id}', [CategoriasController::class, 'update'])->middleware('auth');

Route::delete('categorias/delete/{id}', [CategoriasController::class, 'delete'])->middleware('auth');

//-----------------------------------------------------------

//------------------------ TRANSACOES -----------------------

Route::get('/transacoes', [TransacoesController::class, 'index'])->middleware('auth');

Route::get('/transacoes/new', [TransacoesController::class, 'new'])->middleware('auth');

Route::post('transacoes/add', [TransacoesController::class, 'add'])->middleware('auth');

Route::get('transacoes/{id}/edit', [TransacoesController::class, 'edit'])->middleware('auth');

Route::post('transacoes/update/{id}', [TransacoesController::class, 'update'])->middleware('auth');

Route::delete('transacoes/delete/{id}', [TransacoesController::class, 'delete'])->middleware('auth');

//-----------------------------------------------------------
