<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_inmueble;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_inmuebleRequest;
use App\Http\Requests\Updatelogs_tipo_inmuebleRequest;

class LogsTipoInmuebleController extends Controller {

    /**
     * Mérodo que crea registros en tabla logs por cada
     * consulta realizada en la tabla tipos_inmuebles
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tipo_inmueble, $char) {

        $logs_tipo_inmueble = new logs_tipo_inmueble();
        $user = auth()->user();

        $logs_tipo_inmueble->tipo_inmueble_id = $tipo_inmueble->id;
        $logs_tipo_inmueble->descripcion = $tipo_inmueble->descripcion;
        $logs_tipo_inmueble->accion = $char;
        $logs_tipo_inmueble->usuario_id = $user->id; 
        $logs_tipo_inmueble->usuario_nombre = $user->usuario; 

        $logs_tipo_inmueble->save();

        return 'guardado';
    }

}