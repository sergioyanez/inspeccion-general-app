<?php

namespace App\Http\Controllers;

use App\Models\logs_catastro;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_catastroRequest;
use App\Http\Requests\Updatelogs_catastroRequest;


/**
 * Controller de LogsCatastro: brinda acceso al servicio de guardado del historial de cambios realizados en la tabla correspondiente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see logs_catastro
 * @version 1.0
 * @since 11/12/2022
 */
class LogsCatastroController extends Controller {

    /**
     * Crea en la tabla logs las consultas realizadas
     * sobre la tabla catastro
     *
     * @return \Illuminate\Http\Response
     */
    public function store($catastro, $char) {

        $logs_catastro = new logs_catastro();
        $user = auth()->user();

        $logs_catastro->catastro_id = $catastro->id;
        $logs_catastro->circunscripcion = $catastro->circunscripcion;
        $logs_catastro->seccion = $catastro->seccion;
        $logs_catastro->chacra = $catastro->chacra;
        $logs_catastro->quinta = $catastro->quinta;
        $logs_catastro->fraccion = $catastro->fraccion;
        $logs_catastro->manzana = $catastro->manzana;
        $logs_catastro->parcela = $catastro->parcela;
        $logs_catastro->sub_parcela = $catastro->sub_parcela;
        $logs_catastro->observacion = $catastro->observacion;
        $logs_catastro->fecha_informe = $catastro->fecha_informe;
        $logs_catastro->pdf_informe = $catastro->pdf_informe;
        $logs_catastro->accion = $char;
        // $logs_catastro->usuario_id = $user->id;
        // $logs_catastro->usuario_nombre = $user->usuario;
        $logs_catastro->save();

        return 'guardado';
    }

}
