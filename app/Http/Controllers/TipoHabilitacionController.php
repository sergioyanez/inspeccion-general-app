<?php

namespace App\Http\Controllers;

use App\Models\Tipo_habilitacion;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTipo_habilitacionRequest;
use App\Http\Requests\UpdateTipo_habilitacionRequest;
use App\Http\Controllers\LogsTipoHabilitacionController;

class TipoHabilitacionController extends Controller
{

     /**
     * Muestra todos los tipos de habilitaciones
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tipo_habilitaciones = Tipo_habilitacion::all();
        return view('tipoHabilitacion.tiposHabilitaciones', ['tiposHabilitaciones'=>$tipo_habilitaciones]);
    }

    /**
     * Muestra un formulario para crear un tipo de habilitacion
     *
     * @return \Illuminate\Http\Response
    */
    public function create() {
        return view('tipoHabilitacion.crear');
    }


    /**
     * Crea un nuevo tipo de habilitacion
     * @param  \App\Http\Requests\StoreTipo_habilitacionRequest  $request
     * @param  \App\Models\Tipo_habilitacion  $tipo_habilitacion
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request,[
            'descripcion' => 'required|string|max:25',
            'plazo_vencimiento' => 'nullable|integer',
        ]);

        $tipo_habilitacion = new Tipo_habilitacion();
        $tipo_habilitacion->descripcion = $request->descripcion;
        $tipo_habilitacion->plazo_vencimiento = $request->plazo_vencimiento;

        if ($tipo_habilitacion->save()){
            $log = new LogsTipoHabilitacionController();
            $log->create($tipo_habilitacion, 'c');
            return redirect()->route('tiposHabilitaciones');
        }
        return back()->with('fail','No se pudo guardar el tipo de habilitacion');
    }

    /**
     * Retorna un tipo de habilitacions
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $tipo_habilitacion = Tipo_habilitacion::find($id);
        return view('tipoHabilitacion.mostrar', ['tipoHabilitacion'=>$tipo_habilitacion]);
    }


    /**
     * Método para editar un tipo de habilitacion
     * 
     * @param  \App\Http\Requests\UpdateTipo_habilitacionRequest  $request
     * @param  \App\Models\Tipo_habilitacion  $tipo_habilitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate( $request,[
            'descripcion' => 'required|string|max:25',
            'plazo_vencimiento' => 'nullable|integer',
        ]);


        $tipo_habilitacion = Tipo_habilitacion::find($request->id);
        $tipo_habilitacion->descripcion = $request->descripcion;
        $tipo_habilitacion->plazo_vencimiento = $request->plazo_vencimiento;

        if($tipo_habilitacion->save()){
            $log = new LogsTipoHabilitacionController();
            $log->store($tipo_habilitacion, 'u');
            return redirect()->route('tiposHabilitaciones');
        }

        return back()->with('fail','No se pudo editar el tipo de habilitacion');
    }

    /**
     * Eliminar un tipo de habilitacion
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     */
    public function destroy(int $id)
    {
        $log = new LogsTipoHabilitacionController();
        $tipo_habilitacion = Tipo_habilitacion::find($id);

        $tipo_habilitacion->delete();
        $log->store($tipo_habilitacion, 'd');
        
        return redirect()->route('tiposHabilitaciones');
    }
}