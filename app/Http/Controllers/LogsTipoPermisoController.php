<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_permiso;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_permisoRequest;
use App\Http\Requests\Updatelogs_tipo_permisoRequest;

/**
 * Controller de LogsTipoPermiso: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez02@gmail.com
 * @see logs_tipo_permiso
 * @version 1.0
 * @since 11/12/2022
 */
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
        //$logs_tipo_permiso->usuario_id = $user->id; -> PORBAR CON USUARIO
        //$logs_tipo_permiso->usuario_nombre = $user->usuario; -> IDEM ANTERIOR

        $logs_tipo_permiso->save();

        return 'guardado';
    }
}
