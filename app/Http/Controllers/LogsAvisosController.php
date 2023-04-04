<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\logs_AvisoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller de LogsAvisos: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez02@gmail.com
 * @see logs_AvisoModel
 * @version 1.0
 * @since 11/12/2022
 */
class LogsAvisosController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($aviso, $char)
    {
        $logsAvisos = new logs_AvisoModel();

        $user= Auth::user();

        $logsAvisos->fecha_aviso = $aviso->fecha_aviso;
        $logsAvisos->aviso_bd_id = $aviso->id;
        $logsAvisos->avisado_por = $aviso->avisado_por;
        $logsAvisos->tipo_comunicacion =  $aviso->tipo_comunicacion;
        $logsAvisos->expediente_id = $aviso->expediente_id;
        $logsAvisos->detalle = $aviso->detalle;
        $logsAvisos->archivo_pdf = $aviso->archivo_pdf;
        $logsAvisos->accion = $char;
        $logsAvisos->usuario_bd_id = $user->id;
        $logsAvisos->usuario = $user->usuario;

        return $logsAvisos->save();
    }
}
