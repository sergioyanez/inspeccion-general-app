<?php

namespace App\Http\Controllers;

use App\Models\Tipo_permiso;
use App\Http\Requests\StoreTipo_permisoRequest;
use App\Http\Requests\UpdateTipo_permisoRequest;
use App\Http\Controllers\LogsTipoPermisoController;

class TipoPermisoController extends Controller {

    /**
     * Método que retorna todos los tipos de permisos
     */
    public function index() {

        $tiposPermisos = Tipo_permiso::all();
        return view('tipoPermiso.tiposPermisos', ['tiposPermisos'=>$tiposPermisos]);
    }

    /**
     * Muestra un formulario para crear un tipo de permiso
     */
    public function create() {
        return view('tipoPermiso.crear');
    }

    /**
     * Método para crear un nuevo tipo de permiso
     *@param  \App\Http\Requests\StoreTipo_permisoRequest  $request
     */
    public function store(StoreTipo_permisoRequest $request) {

        $tipoPermiso = new Tipo_permiso();
        $tipoPermiso->tipo = $request->tipo;

        if($tipoPermiso->save()){
            $log = new LogsTipoPermisoController();
            $log->store($tipoPermiso, 'c');
            return redirect()->route('tiposPermisos');
        }

        return back()->with('fail','No se pudo cargar el tipo de permiso');
    }



    /**
     * Método que retorna un solo tipo de permiso
     * @param  \App\Models\int  $tipo_permiso->$id
     */
    public function show($id) {

        $tipoPermiso = Tipo_permiso::find($id);
        return view('tipoPermiso.mostrar', ['tipoPermiso'=>$tipoPermiso]);
    }

    /**
     * Método para editar un tipo de permiso
     *@param  \App\Http\Requests\UpdateTipo_permisoRequest  $request
     */
    public function update(UpdateTipo_permisoRequest $request) {



        $tipoPermiso = Tipo_permiso::find($request->id);
        $tipoPermiso->tipo = $request->tipo;

        if($tipoPermiso->save()){
            $log = new LogsTipoPermisoController();
            $log->store($tipoPermiso, 'u');
            return redirect()->route('tiposPermisos');
        }

        return back()->with('fail','No se pudo crear el tipo de permiso');
    }

    /**
     * Método que elimina un tipo de permiso existente
     * @param  int $id
     */
    public function destroy($id) {

        $tipoPermiso = Tipo_permiso::find($id);
        if($tipoPermiso->delete()){
            $log = new LogsTipoDniController();
            $log->store($tipoPermiso, 'd');
            return redirect()->route('tiposPermisos');
        }
        return back()->with('fail','No se pudo eliminar el tipo de permiso');
    }
}