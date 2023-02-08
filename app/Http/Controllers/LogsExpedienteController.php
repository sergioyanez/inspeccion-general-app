<?php

namespace App\Http\Controllers;

use App\Models\logs_estado_civil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogsEstadoCivilController extends Controller
{
  
    /**
     * creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($estado_civil, $char)
    {
        $logs_estado_civil = new logs_estado_civil();

        $user= Auth::user();

        $logs_estado_civil->estado_civil_id = $estado_civil->id;
        $logs_estado_civil->descripcion = $estado_civil->descripcion;
        $logs_estado_civil->accion = $char;
        $logs_estado_civil->usuario_id = $user->id; 
        $logs_estado_civil->usuario_nombre = $user->usuario;

        return $logs_estado_civil->save();
    }

}