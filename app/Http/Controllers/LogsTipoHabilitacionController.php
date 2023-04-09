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
    public function create($tipoHabilitacion, $char)
    {
        $logsTipoHabilitacion = new logs_tipo_habilitacion();

        $user= Auth::user();

        $logsTipoHabilitacion->tipo_habilitacion_id = $tipoHabilitacion->id;
        $logsTipoHabilitacion->descripcion = $tipoHabilitacion->descripcion;
        $logsTipoHabilitacion->plazo_vencimiento = $tipoHabilitacion->plazo_vencimiento;
        $logsTipoHabilitacion->accion = $char;
        $logsTipoHabilitacion->usuario_id = $user->id;
        $logsTipoHabilitacion->usuario_nombre = $user->usuario;

        return $logsTipoHabilitacion->save();
    }

}
