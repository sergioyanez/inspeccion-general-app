<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_dni;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_dniRequest;
use App\Http\Requests\Updatelogs_tipo_dniRequest;

/**
 * Controller de LogsTipoDni: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_tipo_dni
 * @version 1.0
 * @since 11/12/2022
 */
class LogsTipoDniController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($tipo_dni, $char) {

        $logs_tipo_dni = new logs_tipo_dni();
        $user = auth()->user();

        $logs_tipo_dni->tipo_dni_id = $tipo_dni->id;
        $logs_tipo_dni->descripcion = $tipo_dni->descripcion;
        $logs_tipo_dni->accion = $char;
        $logs_tipo_dni->usuario_id = $user->id;
        $logs_tipo_dni->usuario_nombre = $user->usuario;

        $logs_tipo_dni->save();


        return 'guardado';
    }
}
