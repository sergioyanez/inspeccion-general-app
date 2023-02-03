<?php

namespace App\Http\Controllers;

use App\Models\logs_informe_dependencia;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_informe_dependenciaRequest;
use App\Http\Requests\Updatelogs_informe_dependenciaRequest;

class LogsInformeDependenciaController extends Controller {
    
    /**
     * Método que crea un objeto sobre la tabla
     * logs_informes_dependencias, por cada consulta
     * realizada sobre la misma
     * 
     * @return \Illuminate\Http\Response
     */
    public function create($informe_dependencia, $char) {
        
        $logs_informe_dependencia = new logs_informe_dependencia();
        //$user = auth()->user();

        $logs_informe_dependencia->informe_dependencia_id = $informe_dependencia->id;
        $logs_informe_dependencia->tipo_dependencia_id = $informe_dependencia->tipo_dependencia_id;
        $logs_informe_dependencia->expediente_id = $informe_dependencia->expediente_id;
        $logs_informe_dependencia->pdf_informe = $informe_dependencia->pdf_informe;
        $logs_informe_dependencia->fecha_informe = $informe_dependencia->fecha_informe;
        $logs_informe_dependencia->observaciones = $informe_dependencia->observaciones;
        $logs_informe_dependencia->accion = $char;
        //$logs_informe_dependencia->usuario_id = $user->id; -> PORBAR CON USUARIO
        //$logs_informe_dependencia->usuario_nombre = $user->usuario; -> IDEM ANTERIOR

        return $logs_informe_dependencia->save();
    }

}
