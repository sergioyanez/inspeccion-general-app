<?php

namespace App\Http\Controllers;

use App\Models\logs_detalle_habilitacion;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_detalle_habilitacionRequest;
use App\Http\Requests\Updatelogs_detalle_habilitacionRequest;

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