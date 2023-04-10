<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_habilitacion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Controller de LogsTipoHabilitacion: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_tipo_habilitacion
 * @version 1.0
 * @since 11/12/2022
 */
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
