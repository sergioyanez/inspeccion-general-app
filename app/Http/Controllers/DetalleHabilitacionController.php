<?php

namespace App\Http\Controllers;

use App\Models\Detalle_habilitacion;
use App\Http\Requests\StoreDetalle_habilitacionRequest;
use App\Http\Requests\UpdateDetalle_habilitacionRequest;
use App\Http\Controllers\LogsDetalleHabilitacionController;
use App\Models\Tipo_estado;
use App\Models\Tipo_habilitacion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DetalleHabilitacionController extends Controller
{
    /**
     * Método que retorna todos los detalles de habilitacion
     * existente
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $detallesHabilitaciones = Detalle_habilitacion::all();
        return view('detalleHabilitacion.detallesHabilitaciones', ['detallesHabilitaciones'=>$detallesHabilitaciones]);
    }

    /**
     * Muestra un formualrio para crear un nuevo
     * detalle de habilitación
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $estadosHabilitaciones = Tipo_habilitacion::all();
        $tiposEstados = Tipo_estado::all();
        return view('detalleHabilitacion.crear',['estados'=>$estadosHabilitaciones, 'tipos'=>$tiposEstados]);
    }

    /**
     * Método que crea un nuevo detalle de habilitación
     * @param  \App\Http\Requests\StoreDetalle_habilitacionRequest  $request
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request,[
            'tipo_habilitacion_id'=>'required',
            'tipo_estado_id'=>'required',
            'fecha_vencimiento'=>'required',
            'fecha_primer_habilitacion'=>'required',
            'pdf_certificado_habilitacion'=>'required',
        ]);

        $detalle_habilitacion = new Detalle_habilitacion();
        $detalle_habilitacion->tipo_habilitacion_id = $request->tipo_habilitacion_id;
        $detalle_habilitacion->tipo_estado_id = $request->tipo_estado_id;
        $detalle_habilitacion->fecha_vencimiento = $request->fecha_vencimiento;
        $detalle_habilitacion->fecha_primer_habilitacion = $request->fecha_primer_habilitacion;
        $detalle_habilitacion->pdf_certificado_habilitacion = $request->pdf_certificado_habilitacion;

        if($detalle_habilitacion->save()){
            $log = new LogsDetalleHabilitacionController();
            $log->create($detalle_habilitacion, 'c');
            return redirect()->route('detallesHabilitaciones');
        }
        return back()->with('fail','No se pudo crear el usuario');
    }

    /**
     * Método que retorna un solo detalle de habilitación
     *
     * @param  \App\Models\Detalle_habilitacion  $detalle_habilitacion
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $detalleHabilitacion = Detalle_habilitacion::find($id);
        $estadosHabilitaciones = Tipo_habilitacion::all();
        $tiposEstados = Tipo_estado::all();
        return view('detalleHabilitacion.mostrar', ['detalleHabilitacion'=>$detalleHabilitacion,'estados'=>$estadosHabilitaciones, 'tipos'=>$tiposEstados]);
    }

    /**
     * método para editar un detalle de habilitación
     * @param  \App\Http\Requests\UpdateDetalle_habilitacionRequest  $request
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        $this->validate($request,[
            'tipo_habilitacion_id'=>'required',
            'tipo_estado_id'=>'required',
            'fecha_vencimiento'=>'required',
            'fecha_primer_habilitacion'=>'required',
            'pdf_certificado_habilitacion'=>'required',
        ]);

        $detalle_habilitacion = Detalle_habilitacion::find($request->id);
        $detalle_habilitacion->tipo_habilitacion_id = $request->tipo_habilitacion_id;
        $detalle_habilitacion->tipo_estado_id = $request->tipo_estado_id;
        $detalle_habilitacion->fecha_vencimiento = $request->fecha_vencimiento;
        $detalle_habilitacion->fecha_primer_habilitacion = $request->fecha_primer_habilitacion;
        $detalle_habilitacion->pdf_certificado_habilitacion = $request->pdf_certificado_habilitacion;

        if($detalle_habilitacion->save()){
            $log = new LogsDetalleHabilitacionController();
            $log->create($detalle_habilitacion, 'u');
            return redirect()->route('detallesHabilitaciones');
        }
        return back()->with('fail','No se pudo crear el usuario');
    }

    /**
     * Método que elimina un detalle de habilitación
     *
     * @param  \App\Models\Detalle_habilitacion  $detalle_habilitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $log = new LogsDetalleHabilitacionController();
        $detalle_habilitacion = Detalle_habilitacion::find($id);

        $detalle_habilitacion->delete();

        $log->create($detalle_habilitacion, 'd');

        return redirect()->route('detallesHabilitaciones');
    }
}
