<?php

namespace App\Http\Controllers;

use App\Models\logs_usuario;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_usuarioRequest;
use App\Http\Requests\Updatelogs_usuarioRequest;

class LogsUsuarioController extends Controller {

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($usuario, $char) {

        $log_usuario = new logs_usuario();
        $user = auth()->user();

        $log_usuario->usuario_bd_id = $usuario->id;
        $log_usuario->usuario = $usuario->usuario;
        $log_usuario->tipo_permiso_id = $usuario->tipo_permiso_id;
        $log_usuario->email = $usuario->email;
        $log_usuario->password = $usuario->password;
        $log_usuario->accion = $char;
        $log_usuario->usuario_id = $usuario->id; 
        $log_usuario->usuario_nombre = $usuario->usuario; 

        $log_usuario->save();
    }

}
