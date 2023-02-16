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
use App\Http\Controllers\InformeDependenciasController;
use App\Http\Controllers\PaginaPrincipalController;
use App\Http\Controllers\BusquedaExpedienteController;
use App\Http\Controllers\ExpedienteContribuyenteController;
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
    return view('auth.login');
});

// RUTA PAGINA PRINCIPAL
Route::controller(PaginaPrincipalController::class)->group(function(){
    Route::get('pagina_principal','index')->name('pagina_principal');
});

// RUTA PAGINA DE BUSQUEDA DE EXPEDIENTES
Route::controller(BusquedaExpedienteController::class)->group(function(){
    Route::get('busqueda_expediente','index')->name('busqueda_expediente');
});

// RUTA DE USUARIO
Route::controller(UsuarioController::class)->group(function(){
    Route::get('usuario','index')->name('usuarios');
    Route::get('usuario/create','create')->name('usuarios-crear');
    Route::post('usuario/guardar','store')->name('usuarios-guardar');
    Route::get('usuario/mostrar/{id}','show')->name('usuarios-mostrar');
    Route::post('usuario/actualizar','update')->name('usuarios-actualizar');
    Route::get('usuario/eliminar/{id}','destroy')->name('usuarios-eliminar');
});

// RUTA DE EXPEDIENTE
Route::controller(ExpedienteController::class)->group(function(){
    Route::get('expediente','index')->name('expedientes');
    Route::get('expediente1','index1')->name('expedientes1');
    Route::get('expediente/create','create')->name('expedientes-crear');
    Route::get('expediente/createContribuyente','createContribuyente')->name('expedientes-crearContribuyente');
    Route::post('expediente/guardar','store')->name('expedientes-guardar');
    Route::get('expediente/mostrar/{id}','show')->name('expedientes-mostrar');
    Route::post('expediente/actualizar','update')->name('expedientes-actualizar');
    Route::get('expediente/eliminar/{id}','destroy')->name('expedientes-eliminar');
});

// RUTA DE CONTRIBUYENTE
Route::controller(ContribuyenteController::class)->group(function(){
    Route::get('contribuyente','index')->name('contribuyentes');
    Route::get('contribuyenteBuscar','indexBuscar')->name('contribuyentes-buscar');
    Route::get('contribuyente/create','create')->name('contribuyentes-crear');
    Route::get('contribuyente/create/enExpediente','createEnExpediente')->name('contribuyentes-crearEnExpediente');
    Route::post('contribuyente/guardar','store')->name('contribuyentes-guardar');
    Route::get('contribuyente/mostrar/{contribuyente_id}','show')->name('contribuyentes-mostrar');
    Route::post('contribuyente/actualizar','update')->name('contribuyentes-actualizar');
    Route::get('contribuyente/eliminar/{contribuyente_id}','destroy')->name('contribuyentes-eliminar');
});

// RUTA DE EXPEDIENTES-CONTRIBUYENTES
Route::controller(ExpedienteContribuyenteController::class)->group(function(){
    Route::get('expedienteContribuyente','index')->name('expedientesContribuyentes');
    Route::get('expedienteContribuyente/create','create')->name('expedientesContribuyentes-crear');
    Route::post('expedienteContribuyente/guardar','store')->name('expedientesContribuyentes-guardar');
    Route::post('expedienteContribuyente/guardar1/{$expediente_id}/{$contribuyente_id}','store1')->name('expedientesContribuyentes-guardarEnExp');
    //Route::post('expedienteContribuyente/{$expediente_id}/{$contribuyente_id}','store')->name('expedientesContribuyentes-guardarEnExp');
    Route::get('expedienteContribuyente/mostrar/{id}','show')->name('expedientesContribuyentes-mostrar');
    Route::post('expedienteContribuyente/actualizar','update')->name('expedientesContribuyentes-actualizar');
    Route::get('expedienteContribuyente/eliminar/{id}','destroy')->name('expedientesContribuyentes-eliminar');
    Route::get('expedienteContribuyente/create/enExpediente/{$expediente_id}/{$contribuyente_id}','createEnExpediente')->name('expedientesContribuyentes-crearEnExpediente');
});

// RUTA DE PERSONA JURIDICA
Route::controller(PersonaJuridicaController::class)->group(function(){
    Route::get('personaJuridica','index')->name('personasJuridicas');
    Route::get('personaJuridicaBuscar','indexBuscar')->name('personasJuridicas-buscar');
    Route::get('personaJuridica/create','create')->name('personasJuridicas-crear');
    Route::get('personaJuridica/create/enExpediente','createEnExpediente')->name('personasJuridicas-crearEnExpediente');
    Route::post('personaJuridica/guardar','store')->name('personasJuridicas-guardar');
    Route::get('personaJuridica/mostrar/{id}','show')->name('personasJuridicas-mostrar');
    Route::post('personaJuridica/actualizar','update')->name('personasJuridicas-actualizar');
    Route::get('personaJuridica/eliminar/{id}','destroy')->name('personasJuridicas-eliminar');
});

// RUTA DE INMUEBLE
Route::controller(InmuebleController::class)->group(function(){
    Route::get('inmueble','index')->name('inmuebles');
    Route::get('inmueble/create','create')->name('inmuebles-crear');
    Route::post('inmueble/guardar','store')->name('inmuebles-guardar');
    Route::get('inmueble/mostrar/{id}','show')->name('inmuebles-mostrar');
    Route::post('inmueble/actualizar','update')->name('inmuebles-actualizar');
    Route::get('inmueble/eliminar/{id}','destroy')->name('inmuebles-eliminar');
});

// RUTA DE DETALLE INMUEBLE
Route::controller(DetalleInmuebleController::class)->group(function(){
    Route::get('detalleInmueble','index')->name('detallesInmuebles');
    Route::get('detalleInmueble/create','create')->name('detallesInmuebles-crear');
    Route::post('detalleInmueble/guardar','store')->name('detallesInmuebles-guardar');
    Route::get('detalleInmueble/mostrar/{id}','show')->name('detallesInmuebles-mostrar');
    Route::post('detalleInmueble/actualizar','update')->name('detallesInmuebles-actualizar');
    Route::get('detalleInmueble/eliminar/{id}','destroy')->name('detallesInmuebles-eliminar');
});

// RUTA DE CATASTRO
Route::controller(CatastroController::class)->group(function(){
    Route::get('catastro','index')->name('catastros');
    Route::get('catastro/create','create')->name('catastros-crear');
    Route::post('catastro/guardar','store')->name('catastros-guardar');
    Route::get('catastro/mostrar/{id}','show')->name('catastros-mostrar');
    Route::post('catastro/actualizar','update')->name('catastros-actualizar');
    Route::get('catastro/eliminar/{id}','destroy')->name('catastros-eliminar');
});

// RUTA DE INFORME DE DEPENDENCIAS
Route::controller(InformeDependenciasController::class)->group(function(){
    Route::get('informeDependencias','index')->name('informe-dependencias');
    Route::get('informeDependencias/create','create')->name('informe-dependencias-crear');
    Route::post('informeDependencias/guardar','store')->name('informe-dependencias-guardar');
    Route::get('informeDependencias/mostrar/{id}','show')->name('informe-dependencias-mostrar');
    Route::post('informeDependencias/actualizar','update')->name('informe-dependencias-actualizar');
    Route::get('informeDependencias/eliminar/{id}','destroy')->name('informe-dependencias-eliminar');
});

// RUTAS DE DETALLE HABILITACION
Route::controller(DetalleHabilitacionController::class)->group(function(){
    Route::get('detalleHabilitacion','index')->name('detalle-habilitacion');
    Route::get('detalleHabilitacion/create','create')->name('detalle-habilitacion-crear');
    Route::post('detalleHabilitacion/guardar','store')->name('detalle-habilitacion-guardar');
    Route::get('detalleHabilitacion/mostrar/{id}','show')->name('detalle-habilitacion-mostrar');
    Route::post('detalleHabilitacion/actualizar','update')->name('detalle-habilitacion-actualizar');
    Route::get('detalleHabilitacion/eliminar/{id}','destroy')->name('detalle-habilitacion-eliminar');
});

// RUTAS DE EXPEDIENTE PERSONA JURIDICA
Route::controller(ExpedientePersonaJuridicaController::class)->group(function(){
    Route::get('expedientePersonaJuridica','index')->name('expediente-persona-juridica');
    Route::get('expedientePersonaJuridica/create','create')->name('expediente-persona-juridica-crear');
    Route::post('expedientePersonaJuridica/guardar','store')->name('expediente-persona-juridica-guardar');
    Route::get('expedientePersonaJuridica/mostrar/{id}','show')->name('expediente-persona-juridica-mostrar');
    Route::post('expedientePersonaJuridica/actualizar','update')->name('expediente-persona-juridica-actualizar');
    Route::get('expedientePersonaJuridica/eliminar/{id}','destroy')->name('expediente-persona-juridica-eliminar');
});

// RUTAS DE ESTADO DE BAJA
Route::controller(EstadoBajaController::class)->group(function(){
    Route::get('estadoBaja','index')->name('estadosBajas');
    Route::get('estadoBaja/create','create')->name('estadosBajas-crear');
    Route::post('estadoBaja/guardar','store')->name('estadosBajas-guardar');
    Route::get('estadoBaja/mostrar/{id}','show')->name('estadosBajas-mostrar');
    Route::post('estadoBaja/actualizar','update')->name('estadosBajas-actualizar');
    Route::get('estadoBaja/eliminar/{id}','destroy')->name('estadosBajas-eliminar');
});

// RUTA DE ESTADO CIVIL
Route::controller(EstadoCivilController::class)->group(function(){
    Route::get('estadoCivil','index')->name('estadosCiviles');
    Route::get('estadoCivil/create','create')->name('estadosCiviles-crear');
    Route::post('estadoCivil/guardar','store')->name('estadosCiviles-guardar');
    Route::get('estadoCivil/mostrar/{id}','show')->name('estadosCiviles-mostrar');
    Route::post('estadoCivil/actualizar','update')->name('estadosCiviles-actualizar');
    Route::get('estadoCivil/eliminar/{id}','destroy')->name('estadosCiviles-eliminar');
});

// RUTA DE TIPO DE BAJA
Route::controller(TipoBajaController::class)->group(function(){
    Route::get('tipoBaja','index')->name('tiposBajas');
    Route::get('tipoBaja/create','create')->name('tiposBajas-crear');
    Route::post('tipoBaja/guardar','store')->name('tiposBajas-guardar');
    Route::get('tipoBaja/mostrar/{id}','show')->name('tiposBajas-mostrar');
    Route::post('tipoBaja/actualizar','update')->name('tiposBajas-actualizar');
    Route::get('tipoBaja/eliminar/{id}','destroy')->name('tiposBajas-eliminar');
});

// RUTA DE TIPO DE DEPENDENCIAS
Route::controller(TipoDependenciaController::class)->group(function(){
    Route::get('tipoDependencia','index')->name('tiposDependencias');
    Route::get('tipoDependencia/create','create')->name('tiposDependencias-crear');
    Route::post('tipoDependencia/guardar','store')->name('tiposDependencias-guardar');
    Route::get('tipoDependencia/mostrar/{id}','show')->name('tiposDependencias-mostrar');
    Route::post('tipoDependencia/actualizar','update')->name('tiposDependencias-actualizar');
    Route::get('tipoDependencia/eliminar/{id}','destroy')->name('tiposDependencias-eliminar');
});

// RUTA DE TIPO DE DOCUMENTO
Route::controller(TipoDniController::class)->group(function(){
    Route::get('dni','index')->name('dnis');
    Route::get('dni/create','create')->name('dnis-crear');
    Route::post('dni/guardar','store')->name('dnis-guardar');
    Route::get('dni/mostrar/{id}','show')->name('dnis-mostrar');
    Route::post('dni/actualizar','update')->name('dnis-actualizar');
    Route::get('dni/eliminar/{id}','destroy')->name('dnis-eliminar');
});

// RUTA DE TIPO DE ESTADOS DE HABILITACION
Route::controller(TipoEstadoController::class)->group(function(){
    Route::get('tipoEstadoHabilitacion','index')->name('tiposEstadosHabilitacion');
    Route::get('tipoEstadoHabilitacion/create','create')->name('tiposEstadosHabilitacion-crear');
    Route::post('tipoEstadoHabilitacion/guardar','store')->name('tiposEstadosHabilitacion-guardar');
    Route::get('tipoEstadoHabilitacion/mostrar/{id}','show')->name('tiposEstadosHabilitacion-mostrar');
    Route::post('tipoEstadoHabilitacion/actualizar','update')->name('tiposEstadosHabilitacion-actualizar');
    Route::get('tipoEstadoHabilitacion/eliminar/{id}','destroy')->name('tiposEstadosHabilitacion-eliminar');

});

// RUTA DE TIPO DE HABILITACION
Route::controller(TipoHabilitacionController::class)->group(function(){
    Route::get('tipoHabilitacion','index')->name('tiposHabilitaciones');
    Route::get('tipoHabilitacion/create','create')->name('tiposHabilitaciones-crear');
    Route::post('tipoHabilitacion/guardar','store')->name('tiposHabilitaciones-guardar');
    Route::get('tipoHabilitacion/mostrar/{id}','show')->name('tiposHabilitaciones-mostrar');
    Route::post('tipoHabilitacion/actualizar','update')->name('tiposHabilitaciones-actualizar');
    Route::get('tipoHabilitacion/eliminar/{id}','destroy')->name('tiposHabilitaciones-eliminar');
});

// RUTA DE TIPO DE INMUEBLE
Route::controller(TipoInmuebleController::class)->group(function(){
    Route::get('tipoInmueble','index')->name('tiposInmuebles');
    Route::get('tipoInmueble/create','create')->name('tiposInmuebles-crear');
    Route::post('tipoInmueble/guardar','store')->name('tiposInmuebles-guardar');
    Route::get('tipoInmueble/mostrar/{id}','show')->name('tiposInmuebles-mostrar');
    Route::post('tipoInmueble/actualizar','update')->name('tiposInmuebles-actualizar');
    Route::get('tipoInmueble/eliminar/{id}','destroy')->name('tiposInmuebles-eliminar');
});

// RUTA DE TIPO DE PERMISOS
Route::controller(TipoPermisoController::class)->group(function(){
    Route::get('tipoPermiso','index')->name('tiposPermisos');
    Route::get('tipoPermiso/create','create')->name('tiposPermisos-crear');
    Route::post('tipoPermiso/guardar','store')->name('tiposPermisos-guardar');
    Route::get('tipoPermiso/mostrar/{id}','show')->name('tiposPermisos-mostrar');
    Route::post('tipoPermiso/actualizar','update')->name('tiposPermisos-actualizar');
    Route::get('tipoPermiso/eliminar/{id}','destroy')->name('tiposPermisos-eliminar');
});













