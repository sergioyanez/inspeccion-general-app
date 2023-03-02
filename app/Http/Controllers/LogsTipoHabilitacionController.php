<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_habilitacion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogsTipoHabilitacionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($tipo_habilitacion, $char)
    {
        $logs_tipo_habilitacion = new logs_tipo_habilitacion();

        $user= Auth::user();

        $logs_tipo_habilitacion->tipo_habilitacion_id = $tipo_habilitacion->id;
        $logs_tipo_habilitacion->descripcion = $tipo_habilitacion->descripcion;
        $logs_tipo_habilitacion->plazo_vencimiento = $tipo_habilitacion->plazo_vencimiento;
        $logs_tipo_habilitacion->accion = $char;
        $logs_tipo_habilitacion->usuario_id = $user->id; 
        $logs_tipo_habilitacion->usuario_nombre = $user->usuario;

        return $logs_tipo_habilitacion->save();
    }

}