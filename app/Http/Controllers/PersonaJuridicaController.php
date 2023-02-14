<?php

namespace App\Http\Controllers;

use App\Models\Persona_juridica;
use App\Http\Requests\StorePersona_juridicaRequest;
use App\Http\Requests\UpdatePersona_juridicaRequest;
use App\Http\Controllers\LogsPersonaJuridicaController;
use Illuminate\Http\Request;

class PersonaJuridicaController extends Controller {


    /**
     * Método que muestra todas las persona jurídiccas existentes
     */
    public function index()
    {
        $personaJuridica = Persona_juridica::all();
        return view('personaJuridica.personasJuridicas', ['personaJuridica' => $personaJuridica]);
    }

    public function indexBuscar(Request $request)
    {
        $buscar = $request->buscarpor;
        $personasJuridica = Persona_juridica::orderBy('apellido', 'asc')
        ->where('dni_representante', 'LIKE', '%' . $buscar . '%')
        // ->orWhere('apellido', 'LIKE', '%' . $buscar . '%')
        ->paginate(200);
        return view('expediente.crear', ['personasJuridica' => $personasJuridica]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expediente = false;
        return view('personaJuridica.crear', ['expediente' => $expediente]);
    }

    public function createEnExpediente()
    {
        $expediente = true;
        return view('personaJuridica.crear', ['expediente'=>$expediente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersona_juridicaRequest  $request
     */
    public function store(StorePersona_juridicaRequest $request) {

        $personaJuridica = new Persona_juridica();
        $personaJuridica->cuit = $request->cuit;
        $personaJuridica->nombre_representante = $request->nombre_representante;
        $personaJuridica->apellido_representante = $request->apellido_representante;
        $personaJuridica->dni_representante = $request->dni_representante;
        $personaJuridica->telefono = $request->telefono;

        if($personaJuridica->save()){
            $log = new LogsPersonaJuridicaController();
            $log->store($personaJuridica, 'c');
            return redirect()->route('personasJuridicas');
        }
        return back()->with('fail','No se pudo cargar persona jurídica');
    }

    /**
     * Muestra una sola persona jurídica
     * @param  \App\Models\int  $persona_juridica->$id
     */
    public function show($id){
        $personaJuridica = Persona_juridica::find($id);
        return view('personaJuridica.mostrar', ['personaJuridica'=>$personaJuridica]);
    }


    /**
     * Método para editar una persona jurídica
     * @param  \App\Http\Requests\UpdatePersona_juridicaRequest  $request
     * 
     */
    public function update(UpdatePersona_juridicaRequest $request) {

        $personaJuridica = Persona_juridica::find($request->id);
        $personaJuridica->cuit = $request->cuit;
        $personaJuridica->nombre_representante = $request->nombre_representante;
        $personaJuridica->apellido_representante = $request->apellido_representante;
        $personaJuridica->dni_representante = $request->dni_representante;
        $personaJuridica->telefono = $request->telefono;

        if($personaJuridica->save()){
            $log = new LogsPersonaJuridicaController();
            $log->store($personaJuridica, 'u');
            return redirect()->route('personasJuridicas');
        }
        return back()->with('fail','No se pudo actualizar la persona jurídica');
    }

    /**
     * Método para eliminar una persona jurídica
     *
     * @param  int  $id
     */
    public function destroy($id) {

        $personaJuridica = Persona_juridica::find($id);
        if($personaJuridica->delete()){
            $log = new LogsPersonaJuridicaController();
            $log->store($personaJuridica, 'd');
            return redirect()->route('personasJuridicas');
        }
        return back()->with('fail','No se pudo eliminar la persona jurídica');
    }
}