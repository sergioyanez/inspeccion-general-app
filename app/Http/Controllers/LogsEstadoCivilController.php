<?php

namespace App\Http\Controllers;

use App\Models\logs_estado_civil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Controller de LogsEstadoCivil: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_estado_civil
 * @version 1.0
 * @since 11/12/2022
 */
class LogsEstadoCivilController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($estado_civil, $char)
    {
        $logs_estado_civil = new logs_estado_civil();

        $user= Auth::user();

        $logs_estado_civil->estado_civil_id = $estado_civil->id;
        $logs_estado_civil->descripcion = $estado_civil->descripcion;
        $logs_estado_civil->accion = $char;
        // $logs_estado_civil->usuario_id = $user->id;
        // $logs_estado_civil->usuario_nombre = $user->usuario;

        return $logs_estado_civil->save();
    }

}
