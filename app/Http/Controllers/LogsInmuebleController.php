<?php

namespace App\Http\Controllers;

use App\Models\logs_inmueble;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        $user= Auth::user();

        $logs_inmueble->inmueble_id = $inmueble->id;
        $logs_inmueble->calle = $inmueble->calle;
        $logs_inmueble->numero = $inmueble->numero;
        $logs_inmueble->accion = $char;
        $logs_inmueble->usuario_id = $user->id; 
        $logs_inmueble->usuario_nombre = $user->usuario;

        return $logs_inmueble->save();
    }

}
