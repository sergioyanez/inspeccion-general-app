<?php

namespace App\Http\Controllers;

use App\Models\logs_usuario;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_usuarioRequest;
use App\Http\Requests\Updatelogs_usuarioRequest;

/**
 * Controller de LogsUsuario: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_usuario
 * @version 1.0
 * @since 11/12/2022
 */
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
        $log_usuario->usuario_id = $user->id; 
        $log_usuario->usuario_nombre = $user->usuario; 

        $log_usuario->save();
    }

}