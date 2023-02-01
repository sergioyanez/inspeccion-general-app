<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoDniController;
use App\Http\Controllers\TipoEstadoController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\ContribuyenteController;
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
    Route::get('getDni','show')->name('dni.dni');
    Route::post('newDni','create');
    Route::get('delete/{id}','destroy')->name('dni.deleteDni');
    Route::get('edit/{id}','showOne')->name('dni.editDni');
    Route::post('edit/{id}','update')->name('dni.editarNuevoDni');
});

Route::controller(TipoEstadoController::class)->group(function(){
    Route::get('getEstadoHabilitacion','show')->name('estadoHabilitacion.estadoHabilitacion');
    Route::post('newEstadoHabilitacion','create');
    Route::get('deleteEstadoHabilitacion/{id}','destroy')->name('estadoHabilitacion.deleteEstado');
    Route::get('editEstadoHabilitacion/{id}','showOne')->name('estadoHabilitacion.editEstado');
    Route::post('editEstadoHabilitacion/{id}','update')->name('estadoHabilitacion.editarEstadoHabilitacion');
});

Route::controller(EstadoCivilController::class)->group(function(){
    Route::get('getEstadoCivil','show')->name('estadoCivil.estadoCivil');
    Route::post('newEstadoCivil','create');
    Route::get('deleteEstadoCivil/{id}','destroy')->name('estadoCivil.deleteEstadoCivil');
    Route::get('editEstadoCivil/{id}','showOne')->name('estadoCivil.editEstadoCivil');
    Route::post('editEstadoCivil/{id}','update')->name('estadoCivil.editarEstadoCivil');
});

Route::controller(ContribuyenteController::class)->group(function(){
    Route::get('contribuyente','index')->name('contribuyentes');
    Route::get('contribuyente/create','create')->name('contribuyentes-crear');
    Route::post('contribuyente/guardar','store')->name('contribuyentes-guardar');
    Route::get('contribuyente/mostrar/{contribuyente_id}','show')->name('contribuyentes-mostrar');
    Route::post('contribuyente/actualizar','update')->name('contribuyentes-actualizar');
    Route::get('contribuyente/eliminar/{contribuyente_id}','destroy')->name('contribuyentes-eliminar');
});




