<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoDniController;
use App\Http\Controllers\TipoEstadoController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\ContribuyenteController;
use App\Http\Controllers\TipoDependenciaController;
use App\Http\Controllers\CatastroController;
use App\Http\Controllers\PersonaJuridicaController;
use App\Http\Controllers\TipoPermisoController;
use App\Http\Controllers\TipoBajaController;
use App\Http\Controllers\TipoInmuebleController;
use App\Http\Controllers\DetalleHabilitacionController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\TipoHabilitacionController;
use App\Http\Controllers\DetalleInmuebleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EstadoBajaController;
use App\Http\Controllers\ExpedienteController;
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
    Route::get('dni/mostrar/{id}','show')->name('dnis-mostrar');
    Route::post('dni/actualizar','update')->name('dnis-actualizar');
    Route::get('dni/eliminar/{id}','destroy')->name('dnis-eliminar');
});

Route::controller(TipoEstadoController::class)->group(function(){
    Route::get('tipoEstadoHabilitacion','index')->name('tiposEstadosHabilitacion');
    Route::get('tipoEstadoHabilitacion/create','create')->name('tiposEstadosHabilitacion-crear');
    Route::post('tipoEstadoHabilitacion/guardar','store')->name('tiposEstadosHabilitacion-guardar');
    Route::get('tipoEstadoHabilitacion/mostrar/{id}','show')->name('tiposEstadosHabilitacion-mostrar');
    Route::post('tipoEstadoHabilitacion/actualizar','update')->name('tiposEstadosHabilitacion-actualizar');
    Route::get('tipoEstadoHabilitacion/eliminar/{id}','destroy')->name('tiposEstadosHabilitacion-eliminar');

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

Route::controller(TipoDependenciaController::class)->group(function(){
    Route::get('tipoDependencia','index')->name('tiposDependencias');
    Route::get('tipoDependencia/create','create')->name('tiposDependencias-crear');
    Route::post('tipoDependencia/guardar','store')->name('tiposDependencias-guardar');
    Route::get('tipoDependencia/mostrar/{id}','show')->name('tiposDependencias-mostrar');
    Route::post('tipoDependencia/actualizar','update')->name('tiposDependencias-actualizar');
    Route::get('tipoDependencia/eliminar/{id}','destroy')->name('tiposDependencias-eliminar');
});

Route::controller(CatastroController::class)->group(function(){
    Route::get('catastro','index')->name('catastros');
    Route::get('catastro/create','create')->name('catastros-crear');
    Route::post('catastro/guardar','store')->name('catastros-guardar');
    Route::get('catastro/mostrar/{id}','show')->name('catastros-mostrar');
    Route::post('catastro/actualizar','update')->name('catastros-actualizar');
    Route::get('catastro/eliminar/{id}','destroy')->name('catastros-eliminar');
});

Route::controller(PersonaJuridicaController::class)->group(function(){
    Route::get('personaJuridica','index')->name('personasJuridicas');
    Route::get('personaJuridica/create','create')->name('personasJuridicas-crear');
    Route::post('personaJuridica/guardar','store')->name('personasJuridicas-guardar');
    Route::get('personaJuridica/mostrar/{id}','show')->name('personasJuridicas-mostrar');
    Route::post('personaJuridica/actualizar','update')->name('personasJuridicas-actualizar');
    Route::get('personaJuridica/eliminar/{id}','destroy')->name('personasJuridicas-eliminar');
});

Route::controller(TipoPermisoController::class)->group(function(){
    Route::get('tipoPermiso','index')->name('tiposPermisos');
    Route::get('tipoPermiso/create','create')->name('tiposPermisos-crear');
    Route::post('tipoPermiso/guardar','store')->name('tiposPermisos-guardar');
    Route::get('tipoPermiso/mostrar/{id}','show')->name('tiposPermisos-mostrar');
    Route::post('tipoPermiso/actualizar','update')->name('tiposPermisos-actualizar');
    Route::get('tipoPermiso/eliminar/{id}','destroy')->name('tiposPermisos-eliminar');
});

Route::controller(TipoBajaController::class)->group(function(){
    Route::get('tipoBaja','index')->name('tiposBajas');
    Route::get('tipoBaja/create','create')->name('tiposBajas-crear');
    Route::post('tipoBaja/guardar','store')->name('tiposBajas-guardar');
    Route::get('tipoBaja/mostrar/{id}','show')->name('tiposBajas-mostrar');
    Route::post('tipoBaja/actualizar','update')->name('tiposBajas-actualizar');
    Route::get('tipoBaja/eliminar/{id}','destroy')->name('tiposBajas-eliminar');
});

Route::controller(TipoInmuebleController::class)->group(function(){
    Route::get('tipoInmueble','index')->name('tiposInmuebles');
    Route::get('tipoInmueble/create','create')->name('tiposInmuebles-crear');
    Route::post('tipoInmueble/guardar','store')->name('tiposInmuebles-guardar');
    Route::get('tipoInmueble/mostrar/{id}','show')->name('tiposInmuebles-mostrar');
    Route::post('tipoInmueble/actualizar','update')->name('tiposInmuebles-actualizar');
    Route::get('tipoInmueble/eliminar/{id}','destroy')->name('tiposInmuebles-eliminar');
});

Route::controller(DetalleHabilitacionController::class)->group(function(){
    Route::get('detalleHabilitacion','index')->name('detallesHabilitaciones');
    Route::get('detalleHabilitacion/create','create')->name('detallesHabilitaciones-crear');
    Route::post('detalleHabilitacion/guardar','store')->name('detallesHabilitaciones-guardar');
    Route::get('detalleHabilitacion/mostrar/{id}','show')->name('detallesHabilitaciones-mostrar');
    Route::post('detalleHabilitacion/actualizar','update')->name('detallesHabilitaciones-actualizar');
    Route::get('detalleHabilitacion/eliminar/{id}','destroy')->name('detallesHabilitaciones-eliminar');
});

Route::controller(InmuebleController::class)->group(function(){
    Route::get('inmueble','index')->name('inmuebles');
    Route::get('inmueble/create','create')->name('inmuebles-crear');
    Route::post('inmueble/guardar','store')->name('inmuebles-guardar');
    Route::get('inmueble/mostrar/{id}','show')->name('inmuebles-mostrar');
    Route::post('inmueble/actualizar','update')->name('inmuebles-actualizar');
    Route::get('inmueble/eliminar/{id}','destroy')->name('inmuebles-eliminar');
});

Route::controller(TipoHabilitacionController::class)->group(function(){
    Route::get('tipoHabilitacion','index')->name('tiposHabilitaciones');
    Route::get('tipoHabilitacion/create','create')->name('tiposHabilitaciones-crear');
    Route::post('tipoHabilitacion/guardar','store')->name('tiposHabilitaciones-guardar');
    Route::get('tipoHabilitacion/mostrar/{id}','show')->name('tiposHabilitaciones-mostrar');
    Route::post('tipoHabilitacion/actualizar','update')->name('tiposHabilitaciones-actualizar');
    Route::get('tipoHabilitacion/eliminar/{id}','destroy')->name('tiposHabilitaciones-eliminar');
});

Route::controller(DetalleInmuebleController::class)->group(function(){
    Route::get('detalleInmueble','index')->name('detallesInmuebles');
    Route::get('detalleInmueble/create','create')->name('detallesInmuebles-crear');
    Route::post('detalleInmueble/guardar','store')->name('detallesInmuebles-guardar');
    Route::get('detalleInmueble/mostrar/{id}','show')->name('detallesInmuebles-mostrar');
    Route::post('detalleInmueble/actualizar','update')->name('detallesInmuebles-actualizar');
    Route::get('detalleInmueble/eliminar/{id}','destroy')->name('detallesInmuebles-eliminar');
});

Route::controller(UsuarioController::class)->group(function(){
    Route::get('usuario','index')->name('usuarios');
    Route::get('usuario/create','create')->name('usuarios-crear');
    Route::post('usuario/guardar','store')->name('usuarios-guardar');
    Route::get('usuario/mostrar/{id}','show')->name('usuarios-mostrar');
    Route::post('usuario/actualizar','update')->name('usuarios-actualizar');
    Route::get('usuario/eliminar/{id}','destroy')->name('usuarios-eliminar');
});

Route::controller(EstadoBajaController::class)->group(function(){
    Route::get('estadoBaja','index')->name('estadosBajas');
    Route::get('estadoBaja/create','create')->name('estadosBajas-crear');
    Route::post('estadoBaja/guardar','store')->name('estadosBajas-guardar');
    Route::get('estadoBaja/mostrar/{id}','show')->name('estadosBajas-mostrar');
    Route::post('estadoBaja/actualizar','update')->name('estadosBajas-actualizar');
    Route::get('estadoBaja/eliminar/{id}','destroy')->name('estadosBajas-eliminar');
});

Route::controller(ExpedienteController::class)->group(function(){
    Route::get('expediente','index')->name('expedientes');
    Route::get('expediente/create','create')->name('expedientes-crear');
    Route::post('expediente/guardar','store')->name('expedientes-guardar');
    Route::get('expediente/mostrar/{id}','show')->name('expedientes-mostrar');
    Route::post('expediente/actualizar','update')->name('expedientes-actualizar');
    Route::get('expediente/eliminar/{id}','destroy')->name('expedientes-eliminar');
});






