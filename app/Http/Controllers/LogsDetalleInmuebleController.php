<?php

namespace App\Http\Controllers;

use App\Models\logs_detalle_inmueble;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_detalle_inmuebleRequest;

/**
 * Controller de LogsDetalleInmueble: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez02@gmail.com
 * @see logs_detalle_inmueble
 * @version 1.0
 * @since 11/12/2022
 */
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
        // $logsDetalleInmueble->usuario_id = $user->id;
        // $logsDetalleInmueble->usuario_nombre = $user->usuario;
        $logsDetalleInmueble->save();

        return 'guardado';
    }

}
