<?php

namespace App\Http\Controllers;

use App\Models\Catastro;
use App\Http\Requests\StoreCatastroRequest;
use App\Http\Requests\UpdateCatastroRequest;
use App\Http\Controllers\LogsCatastroController;

/**
 * Controller de Catastro: brinda acceso a los servicios de catastro.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see Catastro
 * @version 1.0
 * @since 11/12/2022
 */
class CatastroController extends Controller {

    /**
     * Método que muestra la lista de todos
     * los catastros que hay en la base de datos
     */
    public function index() {

        $catastro = Catastro::all();
        return view('catastro.catastros', ['catastros'=>$catastro]);
    }

    /**
     * Muestra un formulario para crear un catastro
     */
    public function create() {
        return view('catastro.crear');
    }

    /**
     * Método que crea un nuevo Catastro
     * @param  \App\Http\Requests\StoreCatastroRequest  $request
     */
    public function store(StoreCatastroRequest $request) {
        $catastro = new Catastro();
        $catastro->id = $request->id;
        $catastro->circunscripcion = $request->circunscripcion;
        $catastro->seccion = $request->seccion;
        $catastro->chacra = $request->chacra;
        $catastro->quinta = $request->quinta;
        $catastro->fraccion = $request->fraccion;
        $catastro->manzana = $request->manzana;
        $catastro->parcela = $request->parcela;
        $catastro->sub_parcela = $request->sub_parcela;
        $catastro->observacion = $request->observacion;
        $catastro->fecha_informe = $request->fecha_informe;
        $catastro->pdf_informe = $request->pdf_informe;

        if($catastro->save()){
            $log = new LogsCatastroController();
            $log->store($catastro, 'c');
            return redirect()->route('catastros');
        }

        return back()->with('fail','No se pudo crear el catastro');
    }


    /**
     * Muestra un catastro
     * @param  int $id
     */
    public function show($id){

        $catastro = Catastro::find($id);
        return view('catastro.mostrar', ['catastro'=>$catastro]);
    }

    /**
     * Método para editar un catastro existente
     * @param  \App\Http\Requests\UpdateCatastroRequest  $request
     */
    public function update(UpdateCatastroRequest $request) {

        $catastro = Catastro::find($request->id);
        $catastro->circunscripcion = $request->circunscripcion;
        $catastro->seccion = $request->seccion;
        $catastro->chacra = $request->chacra;
        $catastro->quinta = $request->quinta;
        $catastro->fraccion = $request->fraccion;
        $catastro->manzana = $request->manzana;
        $catastro->parcela = $request->parcela;
        $catastro->sub_parcela = $request->sub_parcela;
        $catastro->observacion = $request->observacion;
        $catastro->fecha_informe = $request->fecha_informe;
        $catastro->pdf_informe = $request->pdf_informe;

        if($catastro->save()){
            $log = new LogsCatastroController();
            $log->store($catastro, 'u');
            return redirect()->route('catastros');
        }
        return back()->with('fail','No se pudo actualizar el catastro');
    }

    /**
     * Método para eliminar un catastro existente
     * @param  int $id
     */
    public function destroy($id) {
        $catastro = Catastro::find($id);
        if($catastro->delete()){
            $log = new LogsCatastroController();
            $log->store($catastro, 'd');
            return redirect()->route('catastros');
        }
        return back()->with('fail','No se pudo eliminar el catastro');
    }
}