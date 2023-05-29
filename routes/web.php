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
  Route::get('/', 'homeView');
  Route::get('/filtrar', 'homeView')->name('filtrar');
  Route::get('/adicionar', 'adicionarView');
  Route::post('/adicionar', 'adicionarCasa');
  Route::get('editar/{id}', 'editarView');
  Route::post('editar/{id}', 'editarCasa');
  Route::get('deletar/{id}', 'deletarCasa');
});
