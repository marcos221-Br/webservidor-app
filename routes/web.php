<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProcessoController;
use App\Http\Controllers\UsuarioController;

Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/processo', [ProcessoController::class, 'index']);
Route::get('/processo/visualizar/{numeroprocesso}', [ProcessoController::class, 'visualize'], ['numeroprocesso']);
Route::post('/processo/visualizar', [ProcessoController::class, 'visualize']);
Route::get('/processo/deletar/{numeroprocesso}', [ProcessoController::class, 'delete'], ['numeroprocesso']);
Route::get('/processo/editar/{numeroprocesso}', [ProcessoController::class, 'edit'], ['numeroprocesso']);
Route::post('/processo/editar', [ProcessoController::class, 'edit']);
Route::get('/processo/incluir', [ProcessoController::class, 'include']);
Route::post('/processo/incluir', [ProcessoController::class, 'include']);

Route::get('/usuario', [UsuarioController::class, 'index']);
Route::post('/usuario', [UsuarioController::class, 'change']);
