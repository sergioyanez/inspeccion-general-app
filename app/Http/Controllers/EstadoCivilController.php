<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado_civil;
use App\Http\Controllers\LogsEstadoCivilController;

class EstadoCivilController extends Controller
{

    /**
     * Crea un nuevo estado civil
     * @param  \App\Http\Requests\Request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        // $request->validate( [
        //     'descripcion' => 'required' | 'string' | 'max:25',
        // ]);

        $estado_civil = new Estado_civil();
        $estado_civil->descripcion = $request->descripcion;

        if ($estado_civil->save()){
            $log = new LogsEstadoCivilController();
            $log->create($estado_civil, 'c');
            return back()->with('success','Estado civil se creó correctamente');
        }
        return back()->with('fail','No se pudo cargar el estado civil');
    }

    /**
     * Retorna un Json de estados civiles
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show()
    {
        $estados_civil = Estado_civil::all();
        return view('estadoCivil.EstadoCivil', ['estados'=>$estados_civil]);
       // return response()->json($estados_civil, 200);
    }

    /**
     * Retorna un solo tipo de estado civil
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOne(int $id){
        $estado_civil = Estado_civil::find($id);
        return view('estadoCivil.EditEstadoCivil', ['estado'=>$estado_civil]);
       // return response()->json($estado_civil, 200);
    }

    /**
     * Método para editar un estado civil
     *
     * @param  \App\Http\Requests\Request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $log = new LogsEstadoCivilController();
        $estado_civil = Estado_civil::find($request->id);
        $estado_civil->descripcion = $request->descripcion;
        $estado_civil->save();
        $log->create($estado_civil, 'u');
        return 'Estado Civil actualizado correctamente';
    }

    /**
     * Eliminar un estado civil
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) {

        $log = new LogsEstadoCivilController();
        $estado_civil = Estado_civil::find($id);
        $estado_civil->delete();
        $log->create($estado_civil, 'd');
        return 'Estado Civil eliminado correctamente';
    }

}
