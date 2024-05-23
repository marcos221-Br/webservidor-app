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
Route::get('/processo/visualizar/{numeroprocesso}', [ProcessoController::class, 'visualizer'], ['numeroprocesso']);
Route::post('/processo/visualizar', [ProcessoController::class, 'visualizer']);

Route::get('/usuario', [UsuarioController::class, 'index']);
Route::post('/usuario', [UsuarioController::class, 'change']);