<?php

namespace App\Http\Controllers;

use App\Models\Persona_juridica;
use Illuminate\Http\Request;
use App\Http\Requests\StorePersona_juridicaRequest;
use App\Http\Requests\UpdatePersona_juridicaRequest;
use App\Http\Controllers\LogsPersonaJuridicaController;

class PersonaJuridicaController extends Controller {


    /**
     * Método que muestra todas las persona jurídiccas existentes
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $personasJuridicas = Persona_juridica::all();
        return view('personaJuridica.personasJuridicas', ['personasJuridicas'=>$personasJuridicas]);
    }

     /**
     * Muestra un formulario para crear una persona jurídica
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('personaJuridica.crear');
    }

    /**
     * Método para crear una nueva persona jurídica
     * @param  \App\Http\Requests\UpdatePersona_juridicaRequest  $request
     * @param  \App\Models\Persona_juridica  $persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request,[
            'cuit'=>'required|integer',
            'nombre_representante'=>'required|string|max:255',
            'apellido_representante'=>'required|string|max:255',
            'dni_representante'=>'required|string|max:10',
            'telefono'=>'required|integer',
         ]);

        $persona_juridica = new Persona_juridica();
        $persona_juridica->cuit = $request->cuit;
        $persona_juridica->nombre_representante = $request->nombre_representante;
        $persona_juridica->apellido_representante = $request->apellido_representante;
        $persona_juridica->dni_representante = $request->dni_representante;
        $persona_juridica->telefono = $request->telefono;

        if($persona_juridica->save()){
            $log = new LogsPersonaJuridicaController();
            $log->create($persona_juridica, 'c');
            return redirect()->route('personasJuridicas');
        }
        return back()->with('fail','No se pudo cargar persona jurídica');
    }

    /**
     * Muestra una sola persona jurídica
     *
     * @param  \App\Models\Persona_juridica  $persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $personaJuridica = Persona_juridica::find($id);
        return view('personaJuridica.mostrar', ['personaJuridica'=>$personaJuridica]);
    }


    /**
     * Método para editar una persona jurídica
     *
     * @param  \App\Http\Requests\UpdatePersona_juridicaRequest  $request
     * @param  \App\Models\Persona_juridica  $persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        $this->validate($request,[
            'cuit'=>'required|integer',
            'nombre_representante'=>'required|string|max:255',
            'apellido_representante'=>'required|string|max:255',
            'dni_representante'=>'required|string|max:10',
            'telefono'=>'required|integer',
         ]);

        $persona_juridica = Persona_juridica::find($request->id);
        $persona_juridica->cuit = $request->cuit;
        $persona_juridica->nombre_representante = $request->nombre_representante;
        $persona_juridica->apellido_representante = $request->apellido_representante;
        $persona_juridica->dni_representante = $request->dni_representante;
        $persona_juridica->telefono = $request->telefono;

        if($persona_juridica->save()){
            $log = new LogsPersonaJuridicaController();
            $log->create($persona_juridica, 'u');
            return redirect()->route('personasJuridicas');
        }
        return back()->with('fail','No se pudo actualizar la persona jurídica');
    }

    /**
     * Método para eliminar una persona jurídica
     *
     * @param  \App\Models\Persona_juridica  $persona_juridica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $log = new LogsPersonaJuridicaController();

        $persona_juridica = Persona_juridica::find($id);
        $persona_juridica->delete();

        $log->create($persona_juridica, 'd');

        return redirect()->route('personasJuridicas');
    }
}
