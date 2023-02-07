<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Http\Requests\UpdateInmuebleRequest;
use App\Http\Requests\StoreInmuebleRequest;
use App\Http\Controllers\LogsInmuebleController;

/**
 * Class InmuebleController
 * @package App\Http\Controllers
 */
class InmuebleController extends Controller
{

    /**
     * Muestra todos los inmuebles
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $inmuebles = Inmueble::all();
        return view('inmueble.inmuebles', ['inmuebles'=>$inmuebles]);
    }

    /**
     * Muestra un formulario para crear un inmueble
     *
     * @return \Illuminate\Http\Response
    */
    public function create() {
        return view('inmueble.crear');
    }

    /**
     * Crea un nuevo inmueble
     *
     * @param  \App\Http\Requests\StoreInmuebleRequest  $request
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInmuebleRequest $request)
    {
        $inmueble = new Inmueble();
        $inmueble->calle = $request->calle;
        $inmueble->numero = $request->numero;

        if ($inmueble->save()){
            $log = new LogsInmuebleController();
            $log->create($inmueble, 'c');
            return redirect()->route('inmuebles');
        }
        return back()->with('fail','No se pudo cargar el inmueble');
    }

    /**
     * Retorna un solo tipo de Inmueble
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $inmueble = Inmueble::find($id);
        return view('inmueble.mostrar', ['inmueble'=>$inmueble]);
    }

    /**
     * Actualiza un inmueble.
     *
     * @param  \App\Http\Requests\UpdateInmuebleRequest  $request
     */
    public function update(UpdateInmuebleRequest $request)
    {

        $inmueble = Inmueble::find($request->id);
        $inmueble->calle = $request->calle;
        $inmueble->numero = $request->numero;

        if($inmueble->save()){
            $log = new LogsInmuebleController();
            $log->create($inmueble, 'u');
            return redirect()->route('inmuebles');
        }

        return back()->with('fail','No se pudo editar el inmueble');
    }


    /**
     * Elimina un inmueble
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     */
    public function destroy(int $id)
    {
        $inmueble = Inmueble::find($id);
        if($inmueble->delete()){
            $log = new LogsInmuebleController();
            $log->create($inmueble, 'd');
            return redirect()->route('inmuebles');
        }

        return back()->with('fail','No se pudo eliminar el inmueble');
    }
}


