<?php

namespace App\Http\Controllers;

use App\Models\logs_expediente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_expedienteRequest;
use App\Http\Requests\Updatelogs_expedienteRequest;

/**
 * Controller de LogsExpediente: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_expediente
 * @version 1.0
 * @since 11/12/2022
 */
class LogsExpedienteController extends Controller
{

    public function store($expediente, $char)
    {
        $logs_expediente = new logs_expediente();
        $user = auth()->user();

        $logs_expediente->expediente_id = $expediente->id;
        $logs_expediente->catastro_id = $expediente->catastro_id;
        $logs_expediente->nro_expediente = $expediente->nro_expediente;
        $logs_expediente->nro_comercio = $expediente->nro_comercio;
        $logs_expediente->actividad_ppal = $expediente->actividad_ppal;
        $logs_expediente->anexo = $expediente->anexo;
        $logs_expediente->pdf_solicitud = $expediente->pdf_solicitud;
        $logs_expediente->bienes_de_uso = $expediente->bienes_de_uso;
        $logs_expediente->observaciones_grales = $expediente->observaciones_grales;
        $logs_expediente->detalle_de_habilitacion_id = $expediente->detalle_habilitacion_id;
        $logs_expediente->estado_baja_id = $expediente->estado_baja_id;
        $logs_expediente->detalle_inmueble_id = $expediente->detalle_inmueble_id;
        $logs_expediente->accion = $char;
        $logs_expediente->usuario_id = $user->id;
        $logs_expediente->usuario_nombre = $user->usuario;
        $logs_expediente->save();

        return 'guardado';
    }




}
