<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * Controller de BusquedaExpediente: brinda acceso a la vista de búsqueda de expedientes.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez02@gmail.com
 * @version 1.0
 * @since 11/12/2022
 */
class BusquedaExpedienteController extends Controller
{
    public function index()
    {

        return view('busquedaExpediente');
    }
}
