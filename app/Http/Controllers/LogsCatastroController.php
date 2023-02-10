<?php

namespace App\Http\Controllers;

use App\Models\logs_catastro;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelogs_catastroRequest;
use App\Http\Requests\Updatelogs_catastroRequest;

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
        $logs_catastro->usuario_id = $user->id; 
        $logs_catastro->usuario_nombre = $user->usuario; 
        $logs_catastro->save();
        

        return 'guardado';
    }

}