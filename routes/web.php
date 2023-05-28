<?php

use App\Http\Controllers\CasaController;
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

Route::controller(CasaController::class)->group(function () {
  Route::get('/', 'home');
  Route::get('/adicionar', 'adicionar');
  Route::post('/adicionar', 'adicionarCasa');
  Route::get('editar/{id}', 'editar');
  Route::post('editar/{id}', 'editarCasa');
});
