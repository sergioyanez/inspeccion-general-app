<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_permiso;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_permisoRequest;
use App\Http\Requests\Updatelogs_tipo_permisoRequest;

class LogsTipoPermisoController extends Controller {
    
    /**
     * Método que crea un registro por cada consulta
     * realizada sobre la tabla tipos_permisos
     *
     * @return \Illuminate\Http\Response
     */
    public function store($tipo_permiso, $char) {
        
        $logs_tipo_permiso = new logs_tipo_permiso();
        $user = auth()->user();

        $logs_tipo_permiso->tipo_permiso_id = $tipo_permiso->id;
        $logs_tipo_permiso->tipo = $tipo_permiso->tipo;
        $logs_tipo_permiso->accion = $char;
        $logs_tipo_permiso->usuario_id = $user->id; 
        $logs_tipo_permiso->usuario_nombre = $user->usuario; 

        $logs_tipo_permiso->save();

        return 'guardado';
    }
}