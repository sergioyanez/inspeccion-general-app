<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_baja;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_bajaRequest;
use App\Http\Requests\Updatelogs_tipo_bajaRequest;

class LogsTipoBajaController extends Controller {

    /**
     * Método que crea registros cuando se realiza una consulta
     * en la tabla tipos_bajas
     *
     * @return \Illuminate\Http\Response
     */
    public function store($tipo_baja, $char) {

        $logs_tipo_baja = new logs_tipo_baja();
        $user = auth()->user();

        $logs_tipo_baja->tipo_baja_id = $tipo_baja->id;
        $logs_tipo_baja->descripcion = $tipo_baja->descripcion;
        $logs_tipo_baja->accion = $char;
        $logs_tipo_baja->usuario_id = $user->id;
        $logs_tipo_baja->usuario_nombre = $user->usuario;

        $logs_tipo_baja->save();

        return 'guardado';
    }
}
