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
    Route::get('dni','index')->name('dnis');
    Route::get('dni/create','create')->name('dnis-crear');
    Route::post('dni/guardar','store')->name('dnis-guardar');
    Route::get('dni/mostrar/{contribuyente_id}','show')->name('dnis-mostrar');
    Route::post('dni/actualizar','update')->name('dnis-actualizar');
    Route::get('dni/eliminar/{contribuyente_id}','destroy')->name('dnis-eliminar');
});

Route::controller(TipoEstadoController::class)->group(function(){
    Route::get('estadoHabilitacion','index')->name('estadosHabilitacion');
    Route::get('estadoHabilitacion/create','create')->name('estadosHabilitacion-crear');
    Route::post('estadoHabilitacion/guardar','store')->name('estadosHabilitacion-guardar');
    Route::get('estadoHabilitacion/mostrar/{id}','show')->name('estadosHabilitacion-mostrar');
    Route::post('estadoHabilitacion/actualizar','update')->name('estadosHabilitacion-actualizar');
    Route::get('estadoHabilitacion/eliminar/{id}','destroy')->name('estadosHabilitacion-eliminar');

});

Route::controller(EstadoCivilController::class)->group(function(){
    Route::get('estadoCivil','index')->name('estadosCiviles');
    Route::get('estadoCivil/create','create')->name('estadosCiviles-crear');
    Route::post('estadoCivil/guardar','store')->name('estadosCiviles-guardar');
    Route::get('estadoCivil/mostrar/{id}','show')->name('estadosCiviles-mostrar');
    Route::post('estadoCivil/actualizar','update')->name('estadosCiviles-actualizar');
    Route::get('estadoCivil/eliminar/{id}','destroy')->name('estadosCiviles-eliminar');
});

Route::controller(ContribuyenteController::class)->group(function(){
    Route::get('contribuyente','index')->name('contribuyentes');
    Route::get('contribuyente/create','create')->name('contribuyentes-crear');
    Route::post('contribuyente/guardar','store')->name('contribuyentes-guardar');
    Route::get('contribuyente/mostrar/{contribuyente_id}','show')->name('contribuyentes-mostrar');
    Route::post('contribuyente/actualizar','update')->name('contribuyentes-actualizar');
    Route::get('contribuyente/eliminar/{contribuyente_id}','destroy')->name('contribuyentes-eliminar');
});




