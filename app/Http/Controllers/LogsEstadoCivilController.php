<?php

namespace App\Http\Controllers;

use App\Models\logs_estado_civil;
use App\Http\Controllers\Controller;

class LogsEstadoCivilController extends Controller
{
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($estado_civil, $char)
    {
        $logs_estado_civil = new logs_estado_civil();

        $user = auth()->user();

        $logs_estado_civil->estado_civil_id = $estado_civil->id;
        $logs_estado_civil->descripcion = $estado_civil->descripcion;
        $logs_estado_civil->accion = $char;
        //$logs_estado_civil->usuario_id = $user->id; -> PORBAR CON USUARIO
        //$logs_estado_civil->usuario_nombre = $user->usuario; -> IDEM ANTERIOR

        return $logs_estado_civil->save();
    }

}
