<?php

namespace App\Http\Controllers;

use App\Models\Persona_juridica;
use App\Models\Expediente;
use App\Models\ExpedientePersonaJuridica;
use App\Models\ExpedienteContribuyente;
use App\Models\Tipo_inmueble;
use App\Models\Tipo_estado;
use App\Models\Tipo_habilitacion;
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
        $personasJuridicas = Persona_juridica::all();
        return view('personaJuridica.personasJuridicas', ['personasJuridicas' => $personasJuridicas]);
    }

    public function indexBuscar(Request $request)
    {
        $tiposEstados = Tipo_estado::all();
        $tiposhabilitaciones = Tipo_habilitacion::all();
        $tiposInmuebles = Tipo_inmueble::all();
        $expediente = Expediente::select()->orderBy('id', 'desc')->first();
        $expedientesContribuyentes= ExpedienteContribuyente::all();
        $expedientesPersonasJuridicas = ExpedientePersonaJuridica::all();
        $buscar = $request->buscarpor1;
        $personasJuridicas = Persona_juridica::orderBy('dni_representante', 'asc')
        ->where('dni_representante', 'LIKE', '%' . $buscar . '%')
        ->orwhere('cuit', 'LIKE', '%' . $buscar . '%')
        ->paginate(200);
        return view('expediente.mostrar', ['personasJuridicas' => $personasJuridicas,
                                        'expediente'=>$expediente,
                                        'expedientesPersonasJuridicas'=>$expedientesPersonasJuridicas,
                                        'expedientesContribuyentes'=>$expedientesContribuyentes,
                                        'tiposInmuebles' => $tiposInmuebles,
                                        'tiposEstados' => $tiposEstados,
                                        'tiposhabilitaciones' => $tiposhabilitaciones]);
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
            //if(!$request->expediente){
            //    return redirect()->route('personasJuridicas');
            //}
            //else{
                $expediente = Expediente::select()->orderBy('id', 'desc')->first();
                $expedientesPersonasJuridicas = ExpedientePersonaJuridica::all();
                $expedientesContribuyentes= ExpedienteContribuyente::all();
                $personasJuridicas=Persona_juridica::all();
                $tiposInmuebles = Tipo_inmueble::all();
                $tiposEstados = Tipo_estado::all();
                $tiposhabilitaciones = Tipo_habilitacion::all();
                return view('expediente.mostrar', ['personasJuridicas' => $personasJuridicas,
                                                'expediente'=>$expediente,
                                                'expedientesPersonasJuridicas'=>$expedientesPersonasJuridicas,
                                                'expedientesContribuyentes'=>$expedientesContribuyentes,
                                                'tiposInmuebles' => $tiposInmuebles,
                                                'tiposEstados' => $tiposEstados,
                                                'tiposhabilitaciones' => $tiposhabilitaciones]);
            //}

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
