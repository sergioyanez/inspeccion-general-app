<?php

namespace App\Http\Controllers;

use App\Models\Tipo_inmueble;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTipo_inmuebleRequest;
use App\Http\Requests\UpdateTipo_inmuebleRequest;
use App\Http\Controllers\LogsTipoInmuebleController;
use Illuminate\Http\Response;

class TipoInmuebleController extends Controller {

    /**
     * Métodos que muestra todos los tipos de inmueble existentes
     *
     * @param  \App\Models\Tipo_inmueble  $tipo_inmueble
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $tiposInmuebles = Tipo_inmueble::all();
        return view('tipoInmueble.tiposInmuebles', ['tiposInmuebles'=>$tiposInmuebles]);
    }

    /**
     * Muestra un formulario para crear un tipo de inmueble
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('tipoInmueble.crear');
    }

    /**
     * Método que crea un nuevo tipo de inmueble
     * @param  \App\Http\Requests\StoreTipo_bajaRequest  $request
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request,[
            'descripcion'=>'required|string|max:50',
        ]);

        $tipo_inmueble = new Tipo_inmueble();
        $tipo_inmueble->descripcion = $request->descripcion;

        if($tipo_inmueble->save()){
            $log = new LogsTipoInmuebleController();
            $log->create($tipo_inmueble, 'c');
            return redirect()->route('tiposInmuebles');
        }

        return back()->with('fail','No se pudo cargar el tipo de inmueble');
    }

    /**
     * Métodos que muestra un solo tipo de inmueble
     *
     * @param  \App\Models\Tipo_inmueble  $tipo_inmueble
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $tipoInmueble = Tipo_inmueble::find($id);
        return view('tipoInmueble.mostrar', ['tipoInmueble'=>$tipoInmueble]);
    }

    /**
     * Método que edita un tipo de inmueble determinado
     * @param  \App\Http\Requests\UpdateTipo_bajaRequest  $request
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        $this->validate($request,[
            'descripcion'=>'required|string|max:50',
        ]);

        $tipo_inmueble = Tipo_inmueble::find($request->id);

        $tipo_inmueble->descripcion = $request->descripcion;

        if($tipo_inmueble->save()){
            $log = new LogsTipoInmuebleController();
            $log->create($tipo_inmueble, 'u');
            return redirect()->route('tiposInmuebles');
        }
        return back()->with('fail','No se pudo cargar el tipo de inmueble');
    }

    /**
     * Método que elimina un tipo de inmueble determinado
     *
     * @param  \App\Models\Tipo_inmueble  $tipo_inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $log = new LogsTipoInmuebleController();
        $tipo_inmueble = Tipo_inmueble::find($id);

        $tipo_inmueble->delete();
        $log->create($tipo_inmueble, 'd');

        return redirect()->route('tiposInmuebles');
    }
}
