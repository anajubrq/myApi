<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Api\UserController;

Route::get('/users', [UserController::class, 'index']); // Listar todos os usuários
Route::post('/users', [UserController::class, 'store']); // Criar um novo usuário
Route::put('/users/{id}', [UserController::class, 'update']); // Atualizar usuário
Route::delete('/users/{id}', [UserController::class, 'destroy']); // Excluir usuário
