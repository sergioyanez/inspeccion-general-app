<?php

namespace App\Http\Controllers;

use App\Models\logs_inmueble;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Controller de LogsInmueble: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_inmueble
 * @version 1.0
 * @since 11/12/2022
 */
class LogsInmuebleController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($inmueble, $char)
    {
        $logs_inmueble = new logs_inmueble();

        //$user= Auth::user();

        $logs_inmueble->inmueble_id = $inmueble->id;
        $logs_inmueble->calle = $inmueble->calle;
        $logs_inmueble->numero = $inmueble->numero;
        $logs_inmueble->accion = $char;
        //$logs_inmueble->usuario_id = $user->id;
        //$logs_inmueble->usuario_nombre = $user->usuario;

        return $logs_inmueble->save();
    }

}
