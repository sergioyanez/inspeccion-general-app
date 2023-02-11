<?php

namespace App\Http\Controllers;

use App\Models\logs_detalle_inmueble;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_detalle_inmuebleRequest;

class LogsDetalleInmuebleController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storelogs_detalle_inmuebleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($detalleInmueble,$char)
    {
        $logsDetalleInmueble = new logs_detalle_inmueble();
        $user = auth()->user();
        $logsDetalleInmueble->detalle_inmueble_id = $detalleInmueble->id;
        $logsDetalleInmueble->inmueble_id = $detalleInmueble->inmueble_id;
        $logsDetalleInmueble->tipo_inmueble_id = $detalleInmueble->tipo_inmueble_id;
        $logsDetalleInmueble->fecha_venc_alquiler = $detalleInmueble->fecha_venc_alquiler;
        $logsDetalleInmueble->accion = $char;
        $logsDetalleInmueble->usuario_id = $user->id; 
        $logsDetalleInmueble->usuario_nombre = $user->usuario; 

        $logsDetalleInmueble->save();

        return 'guardado';
    }

}