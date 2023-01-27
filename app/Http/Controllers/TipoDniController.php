<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_dni;
use App\Http\Requests\StoreTipo_dniRequest;
use App\Http\Requests\UpdateTipo_dniRequest;
use App\Http\Controllers\LogsTipoDniController;

class TipoDniController extends Controller{

    /**
     * Crea un nuevo tipo DNI
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $log = new LogsTipoDniController();

        $tipo_dni = new Tipo_dni();
        $tipo_dni->descripcion = $request->descripcion;

        $tipo_dni->save();

        $log->create($tipo_dni, 'c');

        return 'Se creó correctamente';
    }

    /**
     * Muestra los tipos de DNI
     *
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function show(){

        $tipo_dni = Tipo_dni::all();
        return response()->json($tipo_dni, 200); // Si lo mostramos en vista, hay que pasarle el array (['tipos'=>$tipo_dni])
    }

    /**
     * Muestra un solo tipo de DNI
     *
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function showOne($id){

        $tipo_dni = Tipo_dni::find($id);
        return response()->json($tipo_dni, 200); // Si lo mostramos en vista, hay que pasarle el array (['tipos'=>$tipo_dni])
    }

    /**
     * Eición de un tipo de DNI
     *
     * @param  \App\Http\Requests\UpdateTipo_dniRequest  $request
     * @param  \App\Models\Tipo_dni  $tipo_dni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){

        $log = new LogsTipoDniController();
        
        $tipo_dni = Tipo_dni::find($request->id);
        $tipo_dni->descripcion = $request->descripcion;
        $tipo_dni->save();

        $log->create($tipo_dni, 'u');
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

        return 'eliminado correctamente';
    }
}
