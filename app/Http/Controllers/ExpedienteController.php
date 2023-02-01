<?php

namespace App\Http\Controllers;

use App\Models\expediente;
use App\Models\Catastro;
use App\Models\Detalle_habilitacion;
use App\Models\Detalle_inmueble;
use App\Models\Estado_baja;
use App\Http\Controllers\LogsExpedienteController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreexpedienteRequest;
use App\Http\Requests\UpdateexpedienteRequest;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedientes = Expediente::all();
        return view('expediente.expedientes', ['expedientes' => $expedientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catastro = Catastro::all();
        $detalleHabilitaciones = Detalle_habilitacion::all();
        $detalleInmuebles = Detalle_inmueble::all();
        $estadosBaja = Estado_baja::all();
        return view('expediente.crear', ['catastro'=>$catastro, 
                                        'detalleHabilitaciones'=>$detalleHabilitaciones,
                                        'detalleInmuebles'=>$detalleInmuebles,
                                        'estadosBaja' =>$estadosBaja]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreexpedienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $log = new LogsExpedienteController();

        $expediente = new Expediente();
        $expediente->catastro_id = $request->catastro_id;
        $expediente->estado_baja_id = $request->estado_baja_id;
        $expediente->nro_expediente = $request->nro_expediente;
        $expediente->nro_comercio = $request->nro_comercio;
        $expediente->actividad_ppal = $request->actividad_ppal;
        $expediente->anexo = $request->anexo;
        $expediente->pdf_solicitud = $request->pdf_solicitud;
        $expediente->bienes_de_uso = $request->bienes_de_uso;
        $expediente->observaciones_grales = $request->observaciones_grales;
        $expediente->detalle_habilitacion_id = $request->detalle_habilitacion_id;
        $expediente->detalle_inmueble_id = $request->detalle_inmueble_id;

        $expediente->save();

        $log->store($expediente, 'c');

        return redirect()->route('expedientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expediente = Expediente::find($id);
        $catastro = Catastro::all();
        $detalleHabilitaciones = Detalle_habilitacion::all();
        $detalleInmuebles = Detalle_inmueble::all();
        $estadosBaja = Estado_baja::all();
        return view('expediente.mostrar', ['expediente'=>$expediente,
                                        'catastro'=>$catastro, 
                                        'detalleHabilitaciones'=>$detalleHabilitaciones,
                                        'detalleInmuebles'=>$detalleInmuebles,
                                        'estadosBaja' =>$estadosBaja]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateexpedienteRequest  $request
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $log = new LogsExpedienteController();

        $expediente = Expediente::find($request->expediente_id);
        $expediente->catastro_id = $request->catastro_id;
        $expediente->estado_baja_id = $request->estado_baja_id;
        $expediente->nro_expediente = $request->nro_expediente;
        $expediente->nro_comercio = $request->nro_comercio;
        $expediente->actividad_ppal = $request->actividad_ppal;
        $expediente->anexo = $request->anexo;
        $expediente->pdf_solicitud = $request->pdf_solicitud;
        $expediente->bienes_de_uso = $request->bienes_de_uso;
        $expediente->observaciones_grales = $request->observaciones_grales;
        $expediente->detalle_habilitacion_id = $request->detalle_habilitacion_id;
        $expediente->detalle_inmueble_id = $request->detalle_inmueble_id;

        $expediente->save();

        $log->store($expediente, 'u');

        return redirect()->route('expedientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $log = new LogsExpedienteController();

        $expediente = Expediente::find($id);
        $expediente->delete();

        $log->store($expediente, 'd');

        return redirect()->route('expedientes');
    }
}
