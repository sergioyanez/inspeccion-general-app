<?php

namespace App\Http\Controllers;

use App\Models\Tipo_baja;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTipo_bajaRequest;
use App\Http\Requests\UpdateTipo_bajaRequest;
use App\Http\Controllers\LogsTipoBajaController;
use Illuminate\Http\Response;


class TipoBajaController extends Controller {

    /**
     * Método que muestra todos los tipos de baja existentes
     *
     * @param  \App\Models\Tipo_baja  $tipo_baja
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $tiposBajas = Tipo_baja::all();
        return view('tipoBaja.tiposBajas', ['tiposBajas'=>$tiposBajas]);
    }

    /**
     * Muestra un formulario para crear un tipo de bajo
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('tipoBaja.crear');
    }

    /**
     * Método que crea un nuevo tipo de baja
     *@param  \App\Http\Requests\StoreTipo_permisoRequest  $request
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request,[
            'descripcion'=>'required|string|max:50',
        ]);

        $tipo_baja = new Tipo_baja();
        $tipo_baja->descripcion = $request->descripcion;

        if($tipo_baja->save()){
            $log = new LogsTipoBajaController();
            $log->create($tipo_baja, 'c');
            return redirect()->route('tiposBajas');
        }

        return back()->with('fail','No se pudo cargar el tipo de baja');
    }


    /**
     * Método que muestra un solo tipo de baja
     *
     * @param  \App\Models\Tipo_baja  $tipo_baja
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $tipoBaja = Tipo_baja::find($id);
        return view('tipoBaja.mostrar', ['tipoBaja'=>$tipoBaja]);
    }

    /**
     * Método que edita un tipo de baja existente
     *@param  \App\Http\Requests\UpdateTipo_permisoRequest  $request
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        $this->validate($request,[
            'descripcion'=>'required|string|max:50',
        ]);

        $log = new LogsTipoBajaController();
        $tipo_baja = Tipo_baja::find($request->id);

        $tipo_baja->descripcion = $request->descripcion;

        $tipo_baja->save();

        $log->create($tipo_baja, 'u');

        return redirect()->route('tiposBajas');
    }

    /**
     * Método que elimina un tipo de baja existente
     *
     * @param  \App\Models\Tipo_baja  $tipo_baja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $log = new LogsTipoBajaController();
        $tipo_baja = Tipo_baja::find($id);

        $tipo_baja->delete();

        $log->create($tipo_baja, 'd');

        return redirect()->route('tiposBajas');
    }
}
