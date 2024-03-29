<?php

namespace App\Http\Controllers;

use App\Models\logs_informe_dependencia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Controller de LogsInformeDependencia: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_informe_dependencia
 * @version 1.0
 * @since 11/12/2022
 */
class LogsInformeDependenciaController extends Controller {

    /**
     * Método que crea y almacena un objeto sobre la tabla
     * logs_informes_dependencias, por cada consulta
     * realizada sobre la misma
     *
     * @return \Illuminate\Http\Response
     */
    public function store($informe_dependencia, $char) {

        $logs_informe_dependencia = new logs_informe_dependencia();
        $user = auth()->user();

        $logs_informe_dependencia->informe_dependencia_id = $informe_dependencia->id;
        $logs_informe_dependencia->tipo_dependencia_id = $informe_dependencia->tipo_dependencia_id;
        $logs_informe_dependencia->expediente_id = $informe_dependencia->expediente_id;
        $logs_informe_dependencia->pdf_informe = $informe_dependencia->pdf_informe;
        $logs_informe_dependencia->fecha_informe = $informe_dependencia->fecha_informe;
        $logs_informe_dependencia->observaciones = $informe_dependencia->observaciones;
        $logs_informe_dependencia->accion = $char;
        $logs_informe_dependencia->usuario_id = $user->id;
        $logs_informe_dependencia->usuario_nombre = $user->usuario;

        return $logs_informe_dependencia->save();
    }

}
