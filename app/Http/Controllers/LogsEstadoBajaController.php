<?php

namespace App\Http\Controllers;

use App\Models\logs_estado_baja;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Controller de LogsEstadoBaja: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_estado_baja
 * @version 1.0
 * @since 11/12/2022
 */
class LogsEstadoBajaController extends Controller {

    /**
     * Método que crea un nuevo objeto en la tabla
     * logs_estado_baja
     *
     * @return \Illuminate\Http\Response
     */
    public function store($estadoBaja, $char) {

        $logs_estado_baja = new logs_estado_baja();
        $user = auth()->user();

        $logs_estado_baja->estado_baja_id = $estadoBaja->id;
        $logs_estado_baja->tipo_baja_id =$estadoBaja->tipo_baja_id;
        $logs_estado_baja->deuda =$estadoBaja->deuda;
        $logs_estado_baja->fecha_baja = $estadoBaja->fecha_baja;
        $logs_estado_baja->pdf_acta_solicitud_baja = $estadoBaja->pdf_acta_solicitud_baja;
        $logs_estado_baja->pdf_informe_deuda = $estadoBaja->pdf_informe_deuda;
        $logs_estado_baja->pdf_solicitud_baja = $estadoBaja->pdf_solicitud_baja;
        $logs_estado_baja->accion = $char;
        $logs_estado_baja->usuario_id = $user->id;
        $logs_estado_baja->usuario_nombre = $user->usuario;
        $logs_estado_baja->save();
        return "guardado";
    }

}

