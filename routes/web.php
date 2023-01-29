<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoDniController;
use App\Http\Controllers\TipoEstadoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TipoDniController::class)->group(function(){
    Route::get('getDni','show')->name('dni');
    Route::post('newDni','create');
    Route::get('delete/{id}','destroy')->name('deleteDni');
    Route::get('edit/{id}','showOne')->name('editDni');
    Route::post('edit/{id}','update')->name('editarNuevoDni');
});

Route::controller(TipoEstadoController::class)->group(function(){
    Route::get('getEstadoHabilitacion','show')->name('estadoHabilitacion');
    Route::post('newEstadoHabilitacion','create');
    Route::get('deleteEstadoHabilitacion/{id}','destroy')->name('deleteEstado');
    Route::get('editEstadoHabilitacion/{id}','showOne')->name('editEstado');
    Route::post('editEstadoHabilitacion/{id}','update')->name('editarEstadoHabilitacion');
});
