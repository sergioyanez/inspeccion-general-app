<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado_civil;
use App\Http\Requests\UpdateEstado_civilRequest;
use App\Http\Requests\StoreEstado_civilRequest;
use App\Http\Controllers\LogsEstadoCivilController;

class EstadoCivilController extends Controller
{
    /**
     * Muestra todos los tipos de estado civil
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $estadosCiviles = Estado_civil::all();
        return view('estadoCivil.estadosCiviles', ['estadosCiviles'=>$estadosCiviles]);
    }

    /**
     * Muestra un formulario para crear un estado civil
     *
     * @return \Illuminate\Http\Response
    */
    public function create() {
        return view('estadoCivil.crear');
    }

    /**
     * Crea un nuevo estado civil
     * @param  \App\Http\Requests\StoreEstado_civilRequest  $request
     * @param  \App\Models\Estado_civil  $estado_civil
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstado_civilRequest $request) {

        $estado_civil = new Estado_civil();
        $estado_civil->descripcion = $request->descripcion;

        if ($estado_civil->save()){
            $log = new LogsEstadoCivilController();
            $log->create($estado_civil, 'c');
            return redirect()->route('estadosCiviles');
        }
        return back()->with('fail','No se pudo cargar el estado civil');
    }

    /**
     * Retorna un estado civil
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id) {
        $estadoCivil = Estado_civil::find($id);
        return view('estadoCivil.mostrar', ['estadoCivil'=>$estadoCivil]);
    }

    /**
     * Método para editar un estado civil
     *
     * @param  \App\Http\Requests\UpdateEstado_civilRequest  $request
     * @param  \App\Models\Estado_civil  $estado_civil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstado_civilRequest $request) {

        $estadoCivil = Estado_civil::find($request->id);
        $estadoCivil->descripcion = $request->descripcion;

        if($estadoCivil->save()){
            $log = new LogsEstadoCivilController();
            $log->create($estadoCivil, 'u');
            return redirect()->route('estadosCiviles');
        }

        return back()->with('fail','No se pudo editar el estado civil');
    }

    /**
     * Eliminar un estado civil
     *
     * @param  \App\Models\Estado_civil $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $estadoCivil = Estado_civil::find($id);
        if ($estadoCivil->delete()){
            $log = new LogsEstadoCivilController();
            $log->create($estadoCivil, 'd');
            return redirect()->route('estadosCiviles');
        }
        return back()->with('fail','No se pudo eliminar el estado civil');
    }

}
