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
    Route::get('getDni','show')->name('home');
    Route::post('newDni','create');
    Route::get('delete/{id}','destroy')->name('delete');
    Route::get('edit/{id}','showOne')->name('edit');
    Route::post('edit/{id}','update')->name('editarNuevoDni');
});

Route::controller(TipoEstadoController::class)->group(function(){
    Route::get('getEstadoHabilitacion','show')->name('estadoHabilitacion');
    Route::post('newEstadoHabilitacion','create');
    Route::get('deleteEstadoHabilitacion/{id}','destroy')->name('delete');
    Route::get('editEstadoHabilitacion/{id}','showOne')->name('edit');
    Route::post('editEstadoHabilitacion/{id}','update')->name('editarEstadoHabilitacion');
});
