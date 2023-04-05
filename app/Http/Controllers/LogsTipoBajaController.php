<?php

namespace App\Http\Controllers;

use App\Models\logs_tipo_baja;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_tipo_bajaRequest;
use App\Http\Requests\Updatelogs_tipo_bajaRequest;

/**
 * Controller de LogsTipoBaja: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_tipo_baja
 * @version 1.0
 * @since 11/12/2022
 */
class LogsTipoBajaController extends Controller {

    /**
     * Método que crea registros cuando se realiza una consulta
     * en la tabla tipos_bajas
     *
     * @return \Illuminate\Http\Response
     */
    public function store($tipo_baja, $char) {

        $logs_tipo_baja = new logs_tipo_baja();
        $user = auth()->user();

        $logs_tipo_baja->tipo_baja_id = $tipo_baja->id;
        $logs_tipo_baja->descripcion = $tipo_baja->descripcion;
        $logs_tipo_baja->accion = $char;

        //$logs_tipo_permiso->usuario_id = $user->id; -> PORBAR CON USUARIO
        //$logs_tipo_permiso->usuario_nombre = $user->usuario; -> IDEM ANTERIOR

        $logs_tipo_baja->save();

        return 'guardado';
    }
}
