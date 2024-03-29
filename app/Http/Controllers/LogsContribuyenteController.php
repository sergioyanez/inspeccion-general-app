<?php

namespace App\Http\Controllers;

use App\Models\logs_contribuyente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_contribuyenteRequest;
use App\Http\Requests\Updatelogs_contribuyenteRequest;


/**
 * Controller de LogsContribuyente: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_contribuyente
 * @version 1.0
 * @since 11/12/2022
 */
class LogsContribuyenteController extends Controller
{
    // Crea un nuevo registro de log contribuyente
    public function store($contribuyente, $char)
    {
        $logs_contribuyente = new logs_contribuyente();
        $user = auth()->user();

        $logs_contribuyente->contribuyente_id = $contribuyente->id;
        $logs_contribuyente->tipo_dni_id = $contribuyente->tipo_dni_id;
        $logs_contribuyente->estado_civil_id = $contribuyente->estado_civil_id;
        $logs_contribuyente->cuit = $contribuyente->cuit;
        $logs_contribuyente->ingresos_brutos = $contribuyente->ingresos_brutos;
        $logs_contribuyente->nombre = $contribuyente->nombre;
        $logs_contribuyente->apellido = $contribuyente->apellido;
        $logs_contribuyente->dni = $contribuyente->dni;
        $logs_contribuyente->fecha_nacimiento = $contribuyente->fecha_nacimiento;
        $logs_contribuyente->telefono = $contribuyente->telefono;
        $logs_contribuyente->nombre_conyuge = $contribuyente->nombre_conyuge;
        $logs_contribuyente->apellido_conyuge = $contribuyente->apellido_conyuge;
        $logs_contribuyente->dni_conyuge = $contribuyente->dni_conyuge;
        $logs_contribuyente->accion = $char;
        $logs_contribuyente->usuario_id = $user->id;
        $logs_contribuyente->usuario_nombre = $user->usuario;
        $logs_contribuyente->save();

        return 'guardado';
    }
}
