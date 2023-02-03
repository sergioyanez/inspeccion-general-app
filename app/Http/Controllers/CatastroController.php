<?php

namespace App\Http\Controllers;

use App\Models\Catastro;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCatastroRequest;
use App\Http\Requests\UpdateCatastroRequest;
use App\Http\Controllers\LogsCatastroController;

class CatastroController extends Controller {

    /**
     * Método que muestra la lista de todos
     * los catastros que hay en la base de datos
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $catastro = Catastro::all();
        return view('catastro.catastros', ['catastros'=>$catastro]);
    }

    /**
     * Muestra un formulario para crear un catastro
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('catastro.crear');
    }

    /**
     * Método que crea un nuevo Catastro
     * @param  \App\Http\Requests\StoreCatastroRequest  $request
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request,[
            'circunscripcion'=>'required|string|max:10',
            'seccion'=>'required|string|max:10',
            'chacra'=>'required|string|max:10',
            'quinta'=>'required|string|max:10',
            'fraccion'=>'required|string|max:10',
            'manzana'=>'required|string|max:10',
            'parcela'=>'required|string|max:10',
            'sub_parcela'=>'required|string|max:10',
            'observacion'=>'required|string|max:10',
            'fecha_informe'=>'required',
            'pdf_informe'=>'required|string|max:255',
         ]);


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
            $log->create($catastro, 'c');
            return redirect()->route('catastros');
        }

        return back()->with('fail','No se pudo cargar el catastro');
    }


    /**
     * Muestra un solo catastro
     *
     * @param  \App\Models\Catastro  $catastro
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $catastro = Catastro::find($id);
        return view('catastro.mostrar', ['catastro'=>$catastro]);
    }

    /**
     * Método para editar un catastro existente
     *
     * @param  \App\Http\Requests\UpdateCatastroRequest  $request
     * @param  \App\Models\Catastro  $catastro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        $this->validate($request,[
            'circunscripcion'=>'required|string|max:10',
            'seccion'=>'required|string|max:10',
            'chacra'=>'required|string|max:10',
            'quinta'=>'required|string|max:10',
            'fraccion'=>'required|string|max:10',
            'manzana'=>'required|string|max:10',
            'parcela'=>'required|string|max:10',
            'sub_parcela'=>'required|string|max:10',
            'observacion'=>'required|string|max:10',
            'fecha_informe'=>'required',
            'pdf_informe'=>'required|string|max:255',
         ]);
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
            $log->create($catastro, 'u');
            return redirect()->route('catastros');
        }
        return back()->with('fail','No se pudo actualizar el catastro');
    }

    /**
     * Método para eliminar un catastro existente
     *
     * @param  \App\Models\Catastro  $catastro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $catastro = Catastro::find($id);
        if($catastro->delete()){
            $log = new LogsCatastroController();
            $log->create($catastro, 'd');
            return redirect()->route('catastros');
        }
        return back()->with('fail','No se pudo eliminar el catastro');
    }
}
