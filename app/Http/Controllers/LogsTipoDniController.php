<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_dni;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_dniRequest;
use App\Http\Requests\Updatelogs_tipo_dniRequest;


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
        //$logs_tipo_dni->usuario_id = $user->id;
        //$logs_tipo_dni->usuario_nombre = $user->usuario;

        $logs_tipo_dni->save();


        return 'guardado';
    }
}
