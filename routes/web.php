<?php

use Illuminate\Support\Facades\Route;

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

$controller_path = 'App\Http\Controllers';

Route::get('/', function () {
    return view('welcome');
});

// RUTAS DE USUARIOS
Route::get('/usuario', $controller_path . '\UsuarioController@index')->name('usuarios');
Route::get('/usuario/crear', $controller_path . '\UsuarioController@create')->name('usuarios-crear');
Route::post('/usuario/guardar', $controller_path . '\UsuarioController@store')->name('usuarios-guardar');
Route::get('/usuario/mostrar/{usuario_id}', $controller_path . '\UsuarioController@show')->name('usuarios-mostrar');
Route::post('/usuario/actualizar', $controller_path . '\UsuarioController@update')->name('usuarios-actualizar');
Route::get('/usuario/eliminar/{usuario_id}', $controller_path . '\UsuarioController@destroy')->name('usuarios-eliminar');

// RUTAS DE EXPEDIENTES
Route::get('/expediente', $controller_path . '\ExpedienteController@index')->name('expedientes');
Route::get('/expediente/crear', $controller_path . '\ExpedienteController@create')->name('expedientes-crear');
Route::post('/expediente/guardar', $controller_path . '\ExpedienteController@store')->name('expedientes-guardar');
Route::get('/expediente/mostrar/{expediente_id}', $controller_path . '\ExpedienteController@show')->name('expedientes-mostrar');
Route::post('/expediente/actualizar', $controller_path . '\ExpedienteController@update')->name('expedientes-actualizar');
//Route::get('/expediente/eliminar/{expediente_id}', $controller_path . '\ExpedienteController@destroy')->name('expedientes-eliminar');

// RUTAS DE CONTRIBUYENTES
Route::get('/contribuyente', $controller_path . '\ContribuyenteController@index')->name('contribuyentes');
Route::get('/contribuyente/crear', $controller_path . '\ContribuyenteController@create')->name('contribuyentes-crear');
Route::post('/contribuyente/guardar', $controller_path . '\ContribuyenteController@store')->name('contribuyentes-guardar');
Route::get('/contribuyente/mostrar/{contribuyente_id}', $controller_path . '\ContribuyenteController@show')->name('contribuyentes-mostrar');
Route::post('/contribuyente/actualizar', $controller_path . '\ContribuyenteController@update')->name('contribuyentes-actualizar');
//Route::get('/contribuyente/eliminar/{contribuyente_id}', $controller_path . '\ContribuyenteController@destroy')->name('contribuyentes-eliminar');

// RUTAS DE PERSONA JURIDICA
Route::get('/persona_juridica/crear', $controller_path . '\PersonaJuridicaController@create')->name('persona-juridica-crear');
Route::post('/persona_juridica/guardar', $controller_path . '\PersonaJuridicaController@store')->name('persona-juridica-guardar');

// RUTAS DE INMUEBLES
Route::get('/inmueble/crear', $controller_path . '\InmuebleController@create')->name('inmueble-crear');
Route::post('/inmueble/guardar', $controller_path . '\InmuebleController@store')->name('inmueble-guardar');

// RUTAS DE DETALLE INMUEBLES
Route::get('/detalle_inmueble/crear', $controller_path . '\DetalleInmuebleController@create')->name('detalle-inmueble-crear');
Route::post('/detalle_inmueble/guardar', $controller_path . '\DetalleInmuebleController@store')->name('detalle-inmueble-guardar');

// RUTAS DE CATASTRO
Route::get('/catastro/crear', $controller_path . '\CatastroController@create')->name('catastro-crear');
Route::post('/catastro/guardar', $controller_path . '\InmuebleController@store')->name('catastro-guardar');

// RUTAS DE INFORME DEPENDENCIAS
Route::get('/informe_dependencias/crear', $controller_path . '\InformeDependenciasController@create')->name('informe-dependencias-crear');
Route::post('/informe_dependencias/guardar', $controller_path . '\InformeDependenciasController@store')->name('informe-dependencias-guardar');

// RUTAS DE EXPEDIENTE CONTRIBUYENTE
Route::get('/expediente_contribuyente/crear', $controller_path . '\ExpedieteContribuyenteController@create')->name('expediente-contribuyente-crear');
Route::post('/expediente_contribuyente/guardar', $controller_path . '\ExpedieteContribuyenteController@store')->name('expediente-contribuyente-guardar');

// RUTAS DE DETALLE HABILITACION
Route::get('/detalle_habilitacion/crear', $controller_path . '\DetalleHabilitacionController@create')->name('detalle-habilitacion-crear');
Route::post('/detalle_habilitacion/guardar', $controller_path . '\DetalleHabilitacionController@store')->name('detalle-habilitacion-guardar');

// RUTAS DE EXPEDIENTE PERSONA JURIDICA
Route::get('/expediente_persona_juridica/crear', $controller_path . '\ExpedientePersonaJuridicaController@create')->name('expediente-persona-juridica-crear');
Route::post('/expediente_persona_juridica/guardar', $controller_path . '\ExpedientePersonaJuridicaController@store')->name('expediente-persona-juridica-guardar');

// RUTAS DE ESTADO DE BAJA
Route::get('/estado_baja/crear', $controller_path . '\EstadoBajaController@create')->name('estado-baja-crear');
Route::post('/estado_baja/guardar', $controller_path . '\EstadoBajaController@store')->name('estado-baja-guardar');




