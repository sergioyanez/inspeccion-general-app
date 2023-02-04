<?php

namespace App\Http\Controllers;

use App\Models\Tipo_baja;
use App\Http\Requests\StoreTipo_bajaRequest;
use App\Http\Requests\UpdateTipo_bajaRequest;
use App\Http\Controllers\LogsTipoBajaController;



class TipoBajaController extends Controller {

    /**
     * Método que muestra todos los tipos de baja existentes
     */
    public function index() {

        $tiposBajas = Tipo_baja::all();
        return view('tipoBaja.tiposBajas', ['tiposBajas'=>$tiposBajas]);
    }

    /**
     * Muestra un formulario para crear un tipo de bajo
     */
    public function create() {
        return view('tipoBaja.crear');
    }

    /**
     * Método que crea un nuevo tipo de baja
     *@param  \App\Http\Requests\StoreTipo_bajaRequest  $request
     */
    public function store(StoreTipo_bajaRequest $request) {

        $tipoBaja = new Tipo_baja();
        $tipoBaja->descripcion = $request->descripcion;

        if($tipoBaja->save()){
            $log = new LogsTipoBajaController();
            $log->create($tipoBaja, 'c');
            return redirect()->route('tiposBajas');
        }

        return back()->with('fail','No se pudo cargar el tipo de baja');
    }


    /**
     * Método que muestra un solo tipo de baja
     *
     * @param  \App\Models\int  $tipo_baja->$id
     */
    public function show($id) {

        $tipoBaja = Tipo_baja::find($id);
        return view('tipoBaja.mostrar', ['tipoBaja'=>$tipoBaja]);
    }

    /**
     * Método que edita un tipo de baja existente
     *@param  \App\Http\Requests\UpdateTipo_bajaRequest  $request
     */
    public function update(UpdateTipo_bajaRequest $request) {

        $tipoBaja = Tipo_baja::find($request->id);
        $tipoBaja->descripcion = $request->descripcion;

        if($tipoBaja->save()){
            $log = new LogsTipoBajaController();
            $log->create($tipoBaja, 'u');
            return redirect()->route('tiposBajas');
        }
        return back()->with('fail','No se pudo actualizar el tipo de baja');
    }

    /**
     * Método que elimina un tipo de baja existente
     *
     * @param  \App\Models\int  $tipo_baja->$id
     */
    public function destroy($id) {

        $tipoBaja = Tipo_baja::find($id);

        if($tipoBaja->delete()){
            $log = new LogsTipoBajaController();
            $log->create($tipoBaja, 'd');
            return redirect()->route('tiposBajas');
        }
        return back()->with('fail','No se pudo eliminar el tipo de baja');
    }
}
