<?php

namespace App\Http\Controllers;

use App\Models\Tipo_permiso;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTipo_permisoRequest;
use App\Http\Requests\UpdateTipo_permisoRequest;
use App\Http\Controllers\LogsTipoPermisoController;
use Illuminate\Http\Response;

class TipoPermisoController extends Controller {

    /**
     * Método que retorna todos los tipos de permisos
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $tiposPermisos = Tipo_permiso::all();
        return view('tipoPermiso.tiposPermisos', ['tiposPermisos'=>$tiposPermisos]);
    }

    /**
     * Muestra un formulario para crear un tipo de permiso
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('tipoPermiso.crear');
    }

    /**
     * Método para crear un nuevo tipo de permiso
     *@param  \App\Http\Requests\UpdateTipo_permisoRequest  $request
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request,[
            'tipo'=>'required|string|max:25',
         ]);

        $tipo_permiso = new Tipo_permiso();
        $tipo_permiso->tipo = $request->tipo;

        if($tipo_permiso->save()){
            $log = new LogsTipoPermisoController();
            $log->create($tipo_permiso, 'c');
            return redirect()->route('tiposPermisos');
        }

        return back()->with('fail','No se pudo cargar el tipo de permiso');
    }



    /**
     * Método que retorna un solo tipo de permiso
     *
     * @param  \App\Models\Tipo_permiso  $tipo_permiso
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $tipoPermiso = Tipo_permiso::find($id);
        return view('tipoPermiso.mostrar', ['tipoPermiso'=>$tipoPermiso]);
    }

    /**
     * Método para editar un tipo de permiso
     *@param  \App\Http\Requests\UpdateTipo_permisoRequest  $request
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        $this->validate($request,[
            'tipo'=>'required|string|max:25',
         ]);

        $log = new LogsTipoPermisoController();

        $tipo_permiso = Tipo_permiso::find($request->id);
        $tipo_permiso->tipo = $request->tipo;

        $tipo_permiso->save();

        $log->create($tipo_permiso, 'u');

        return redirect()->route('tiposPermisos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_permiso  $tipo_permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $log = new LogsTipoPermisoController();

        $tipo_permiso = Tipo_permiso::find($id);
        $tipo_permiso->delete();

        $log->create($tipo_permiso, 'd');

        return redirect()->route('tiposPermisos');
    }
}
