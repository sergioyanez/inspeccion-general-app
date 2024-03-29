<?php

namespace App\Http\Controllers;

use App\Models\Detalle_habilitacion;
use App\Http\Requests\StoreDetalle_habilitacionRequest;
use App\Http\Requests\UpdateDetalle_habilitacionRequest;
use App\Http\Controllers\LogsDetalleHabilitacionController;
use App\Models\Tipo_estado;
use App\Models\Tipo_habilitacion;

/**
 * Controller de DetalleHabilitacion: brinda acceso a los servicios de detalles de habilitación.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see Detalle_habilitacion
 * @version 1.0
 * @since 11/12/2022
 */
class DetalleHabilitacionController extends Controller
{
    /**
     * Método que retorna todos los detalles de habilitacion existente
     */
    public function index() {
        $detallesHabilitaciones = Detalle_habilitacion::all();
        return view('detalleHabilitacion.detallesHabilitaciones', ['detallesHabilitaciones'=>$detallesHabilitaciones]);
    }

    /**
     * Muestra un formualrio para crear un nuevo
     * detalle de habilitación
     */
    public function create() {
        $estadosHabilitaciones = Tipo_habilitacion::all();
        $tiposEstados = Tipo_estado::all();
        return view('detalleHabilitacion.crear',['estados'=>$estadosHabilitaciones, 'tipos'=>$tiposEstados]);
    }

    /**
     * Método que crea un nuevo detalle de habilitación
     * @param  \App\Http\Requests\StoreDetalle_habilitacionRequest  $request
     */
    // public function store(StoreDetalle_habilitacionRequest $request) {

    //     $detalleHabilitacion = new Detalle_habilitacion();
    //     $detalleHabilitacion->tipo_habilitacion_id = $request->tipo_habilitacion_id;
    //     $detalleHabilitacion->tipo_estado_id = $request->tipo_estado_id;
    //     $detalleHabilitacion->fecha_vencimiento = $request->fecha_vencimiento;
    //     $detalleHabilitacion->fecha_primer_habilitacion = $request->fecha_primer_habilitacion;
    //     $detalleHabilitacion->pdf_certificado_habilitacion = $request->pdf_certificado_habilitacion;

    //     if($detalleHabilitacion->save()){
    //         $log = new LogsDetalleHabilitacionController();
    //         $log->store($detalleHabilitacion, 'c');
    //         return redirect()->route('detallesHabilitaciones');
    //     }
    //     return back()->with('fail','No se pudo crear el detalle de habilitación');
    // }

    public function store($tipo_estado_id) {

        $detalleHabilitacion = new Detalle_habilitacion();
        //$detalleHabilitacion->tipo_habilitacion_id = $tipo_habilitacion_id;
        $detalleHabilitacion->tipo_estado_id = $tipo_estado_id;
        //$detalleHabilitacion->fecha_vencimiento = $fecha_vencimiento;
        //$detalleHabilitacion->fecha_primer_habilitacion = $fecha_primer_habilitacion;
        //$detalleHabilitacion->pdf_certificado_habilitacion = $pdf_certificado_habilitacion;

        if($detalleHabilitacion->save()){
            $log = new LogsDetalleHabilitacionController();
            $log->store($detalleHabilitacion, 'c');
            return $detalleHabilitacion->id;
        }
        return back()->with('fail','No se pudo crear el detalle de habilitación');
    }

    

    /**
     * Método que retorna un detalle de habilitación
     * @param  int $id
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
     */
    public function update(UpdateDetalle_habilitacionRequest $request) {

        $detalleHabilitacion = Detalle_habilitacion::find($request->id);
        $detalleHabilitacion->tipo_habilitacion_id = $request->tipo_habilitacion_id;
        $detalleHabilitacion->tipo_estado_id = $request->tipo_estado_id;
        $detalleHabilitacion->fecha_vencimiento = $request->fecha_vencimiento;
        $detalleHabilitacion->fecha_primer_habilitacion = $request->fecha_primer_habilitacion;
        $detalleHabilitacion->pdf_certificado_habilitacion = $request->pdf_certificado_habilitacion;

        if($detalleHabilitacion->save()){
            $log = new LogsDetalleHabilitacionController();
            $log->store($detalleHabilitacion, 'u');
            return redirect()->route('detallesHabilitaciones');
        }
        return back()->with('fail','No se pudo crear el detalle de habilitación');
    }

    /**
     * Método que elimina un detalle de habilitación
     * @param  int $id
     */
    public function destroy($id) {

        $detalleHabilitacion = Detalle_habilitacion::find($id);
        if($detalleHabilitacion->delete()){
            $log = new LogsDetalleHabilitacionController();
            $log->store($detalleHabilitacion, 'd');
            return redirect()->route('detallesHabilitaciones');
        }
        return back()->with('fail','No se pudo crear el detalle de habilitación');
    }
}