<?php

namespace App\Http\Controllers;

use App\Models\Estado_baja;
use App\Models\Tipo_baja;
use App\Http\Requests\StoreEstado_bajaRequest;
use App\Http\Requests\UpdateEstado_bajaRequest;
use App\Http\Controllers\LogsEstadoBajaController;

/**
 * Controller de EstadoBaja: brinda acceso a los servicios del estado de baja.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see Estado_baja
 * @version 1.0
 * @since 11/12/2022
 */
class EstadoBajaController extends Controller {

    /**
     * Método que muestra los estados de baja existentes
     */
    public function index() {
        $estadosBajas = Estado_baja::all();
        $tiposBajas = Tipo_baja::all();
        return view('estadoBaja.estadosBajas', ['estadosBajas'=> $estadosBajas,'tiposBajas' => $tiposBajas]);
    }

    /**
     * Muestra formulario para crear un nuevo estado de baja
     */
    public function create() {
        $tiposBajas = Tipo_baja::all();
        return view('estadoBaja.crear', ['tiposBajas' => $tiposBajas]);
    }

    /**
     * Función que crea un nuevo estado de baja
     * @param  \App\Http\Requests\StoreEstado_bajaRequest  $request
     */
    public function store(StoreEstado_bajaRequest $request) {

        $estado_baja = new Estado_baja();
        $estado_baja->tipo_baja_id = $request->tipo_baja_id;
        $estado_baja->deuda = $request->deuda;
        $estado_baja->fecha_baja = $request->fecha_baja;
        $estado_baja->pdf_acta_solicitud_baja = $request->pdf_acta_solicitud_baja;
        $estado_baja->pdf_informe_deuda = $request->pdf_informe_deuda;
        $estado_baja->pdf_solicitud_baja = $request->pdf_solicitud_baja;

        if($estado_baja->save()){
            $log = new LogsEstadoBajaController();
            $log->store($estado_baja, 'c');
            return redirect()->route('estadosBajas');
        }

        return back()->with('fail','No se pudo crear el estado de baja');
    }

    /**
     * Método que muestra solo un estado de baja
     * @param  int $id
     */
    public function show($id) {
        $estadoBaja = Estado_baja::find($id);
        return view('estadoBaja.mostrar', ['estadoBaja'=> $estadoBaja]);
    }

    /**
     * Método que edita un estado de baja existente
     * @param  \App\Http\Requests\UpdateEstado_bajaRequest  $request
     */
    public function update(UpdateEstado_bajaRequest  $request) {

        $estado_baja = Estado_baja::find($request->id);

        $estado_baja->tipo_baja_id = $request->tipo_baja_id;
        $estado_baja->deuda = $request->deuda;
        $estado_baja->fecha_baja = $request->fecha_baja;
        $estado_baja->pdf_acta_solicitud_baja = $request->pdf_acta_solicitud_baja;
        $estado_baja->pdf_informe_deuda = $request->pdf_informe_deuda;
        $estado_baja->pdf_solicitud_baja = $request->pdf_solicitud_baja;

        if($estado_baja->save()){
            $log = new LogsEstadoBajaController();
            $log->store($estado_baja, 'u');
            return redirect()->route('estadosBajas');
        }

        return back()->with('fail','No se pudo actualizar el estado de baja');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id) {

        $estado_baja = Estado_baja::find($id);

        if($estado_baja->delete()){
            $log = new LogsEstadoBajaController();
            $log->store($estado_baja, 'd');
            return redirect()->route('estadosBajas');
        }

        return back()->with('fail','No se pudo eliminar el estado de baja');
    }

}
