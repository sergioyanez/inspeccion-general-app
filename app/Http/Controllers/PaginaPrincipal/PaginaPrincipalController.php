<?php

namespace App\Http\Controllers\PaginaPrincipal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

/**
 * Controller de la Página Principal: brinda acceso a la vista de la página principal.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @version 1.0
 * @since 11/12/2022
 */
class PaginaPrincipalController extends Controller
{
    public function index(){
        return view('paginaPrincipal.paginaPrincipal',['fecha_actual'=>Carbon::now()->format('Y-m-d')]);
    }
}
