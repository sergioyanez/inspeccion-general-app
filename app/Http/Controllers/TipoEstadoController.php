<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tipo_estado;
use App\Http\Controllers\LogsTipoEstadosController;
use App\Http\Requests\StoreTipo_estadoRequest;
use App\Http\Requests\UpdateTipo_estadoRequest;

class TipoEstadoController extends Controller
{
    /**
     * Muestra todos los tipos de estado de habilitacion
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposEstadosHabilitacion = Tipo_estado::all();
        return view('estadoHabilitacion.estadosHabilitacion', ['estadosHabilitacion' => $tiposEstadosHabilitacion]);
    }
    /**
     * Crea un nuevo Tipo de estado de habilitacion.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('estadoHabilitacion.crear');
    }

    /**
     * Guarda el tipo de estado de habilitacion creado en la base de datos
     * @param  \App\Http\Requests\UpdateContribuyenteRequest  $request
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'descripcion'=>'required|string|max:50',
        ]);
        $log = new LogsTipoEstadosController();

        $tipo_estado = new Tipo_estado();
        $tipo_estado->descripcion = $request->descripcion;

        $tipo_estado->save();

        $log->store($tipo_estado, 'c');

        return redirect()->route('estadosHabilitacion');
    }

   /**
     * Muesta un tipo de estado de habilitacion en un formulario con todos los campos cargados
     *
     * @param  \App\Models\Tipo_estado  $contribuyente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadoHabilitacion = Tipo_estado::find($id);
        return view('estadoHabilitacion.mostrar', ['estadoHabilitacion' => $estadoHabilitacion]);
    }

     /**
     * Guarda los datos actualizados del contribuyente
     *
     * @param  \App\Http\Requests\UpdateContribuyenteRequest  $request
     * @param  \App\Models\Contribuyente  $contribuyente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'descripcion'=>'required|string|max:50',
        ]);
        $log = new LogsTipoEstadosController();

        $tipo_estado = Tipo_estado::find($request->id);

        $tipo_estado->descripcion = $request->descripcion;
        $tipo_estado->save();

        $log->store($tipo_estado, 'u');

        return redirect()->route('estadosHabilitacion');
    }

    /**
     * Elimina un Estado de habilitación.
     *
     * @param  \App\Models\Tipo_estado  $tipo_estado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $log = new LogsTipoEstadosController();

        $tipo_estado = Tipo_estado::find($id);
        $tipo_estado->delete();

        $log->store($tipo_estado, 'd');

        return redirect()->route('estadosHabilitacion');
    }
}
