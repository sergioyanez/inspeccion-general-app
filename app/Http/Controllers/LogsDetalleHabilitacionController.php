<?php

namespace App\Http\Controllers;

use App\Models\logs_detalle_habilitacion;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_detalle_habilitacionRequest;
use App\Http\Requests\Updatelogs_detalle_habilitacionRequest;

/**
 * Controller de LogsDetalleHabilitacion: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_detalle_habilitacion
 * @version 1.0
 * @since 11/12/2022
 */
class LogsDetalleHabilitacionController extends Controller {

    /**
     * Método que crea una nueva instancia en la tabla
     * logs_detalles_habilitaciones
     *
     * @return \Illuminate\Http\Response
     */
    public function store($detalle_habilitacion, $char) {

        $logs_detalle_habilitacion = new logs_detalle_habilitacion();
        $user = auth()->user();
        $logs_detalle_habilitacion->detalle_habilitacion_id = $detalle_habilitacion->id;
        $logs_detalle_habilitacion->tipo_habilitacion_id = $detalle_habilitacion->tipo_habilitacion_id;
        $logs_detalle_habilitacion->tipo_estado_id = $detalle_habilitacion->tipo_estado_id;
        $logs_detalle_habilitacion->fecha_vencimiento = $detalle_habilitacion->fecha_vencimiento;
        $logs_detalle_habilitacion->fecha_primer_habilitacion = $detalle_habilitacion->fecha_primer_habilitacion;
        $logs_detalle_habilitacion->pdf_certificado_habilitacion = $detalle_habilitacion->pdf_certificado_habilitacion;
        $logs_detalle_habilitacion->accion = $char;
        $logs_detalle_habilitacion->usuario_id = $user->id;
        $logs_detalle_habilitacion->usuario_nombre = $user->usuario;
        $logs_detalle_habilitacion->save();

        return 'guardado';
    }
}
