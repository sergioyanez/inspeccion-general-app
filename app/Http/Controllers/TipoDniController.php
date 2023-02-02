<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_dni;
use App\Http\Requests\StoreTipo_dniRequest;
use App\Http\Requests\UpdateTipo_dniRequest;
use App\Http\Controllers\LogsTipoDniController;
use Illuminate\Http\Response;

class TipoDniController extends Controller{

    /**
     * Muestra los tipos de DNI
     *
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $tipo_dni = Tipo_dni::all();
        return view('dni.tiposDni', ['dnis'=>$tipo_dni]); // Si lo mostramos en vista, hay que pasarle el array (['tipos'=>$tipo_dni])
    }

    /**
     * Muestra un formulario para crear un nuevo tipo DNI
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('dni.crear');
    }

    /**
     * Crea un nuevo tipo DNI
     * @param  \App\Http\Requests\UpdateTipo_dniRequest  $request
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request,[
            'descripcion'=>'required|string|max:50',
        ]);

        $log = new LogsTipoDniController();

        $tipo_dni = new Tipo_dni();
        $tipo_dni->descripcion = $request->descripcion;

        $tipo_dni->save();

        $log->create($tipo_dni, 'c');

        return redirect()->route('dnis');
    }

    /**
     * Muestra un solo tipo de DNI
     *
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $tipo_dni = Tipo_dni::find($id);
        return view('dni.mostrar', ['dni'=>$tipo_dni]);
    }

    /**
     * Eición de un tipo de DNI
     *
     * @param  \App\Http\Requests\UpdateTipo_dniRequest  $request
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){

        $this->validate($request,[
            'descripcion'=>'required|string|max:50',
        ]);

        $log = new LogsTipoDniController();

        $tipo_dni = Tipo_dni::find($request->id);

        $tipo_dni->descripcion = $request->descripcion;
        $tipo_dni->save();

        $log->create($tipo_dni, 'u');

        return redirect()->route('dnis');
    }

    /**
     * Elimina un tipo de DNI
     *
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $log = new LogsTipoDniController();

        $tipo_dni = Tipo_dni::find($id);
        $tipo_dni->delete();

        $log->create($tipo_dni, 'd');

        return redirect()->route('dnis');
    }
}
