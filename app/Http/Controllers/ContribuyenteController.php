<?php

namespace App\Http\Controllers;

use App\Models\Contribuyente;
use App\Models\Expediente;
use App\Models\Tipo_dni;
use App\Models\Estado_civil;
use App\Models\Tipo_inmueble;
use App\Models\Tipo_estado;
use App\Models\Tipo_habilitacion;
use Illuminate\Http\Request;
use App\Http\Controllers\LogsContribuyenteController;
use App\Http\Requests\StoreContribuyenteRequest;
use App\Http\Requests\UpdateContribuyenteRequest;
use App\Models\ExpedienteContribuyente;
use App\Models\ExpedientePersonaJuridica;


class ContribuyenteController extends Controller
{
    /**
     * Muesta todos los contribuyentes
     */
    public function index()
    {
        $contribuyentes = Contribuyente::all();
        return view('contribuyente.contribuyentes', ['contribuyentes' => $contribuyentes]);
    }

    public function indexBuscar(Request $request)
    {
        $tiposEstados = Tipo_estado::all();
        $tiposhabilitaciones = Tipo_habilitacion::all();
        $tiposInmuebles = Tipo_inmueble::all();
        $expediente = Expediente::select('id')->orderBy('id', 'desc')->first();
        $expedientesContribuyentes= ExpedienteContribuyente::all();
        $expedientesPersonasJuridicas = ExpedientePersonaJuridica::all();
        $buscar = $request->buscarpor;
        $contribuyentes = Contribuyente::orderBy('apellido', 'asc')
        ->where('dni', 'LIKE', '%' . $buscar . '%')
        // ->orWhere('apellido', 'LIKE', '%' . $buscar . '%')
        ->paginate(200);
        return view('expediente.crear', ['contribuyentes' => $contribuyentes,
                                        'expediente'=>$expediente,
                                        'expedientesPersonasJuridicas'=>$expedientesPersonasJuridicas,
                                        'expedientesContribuyentes'=>$expedientesContribuyentes,
                                        'tiposInmuebles' => $tiposInmuebles,
                                        'tiposEstados' => $tiposEstados,
                                        'tiposhabilitaciones' => $tiposhabilitaciones]);
    }

    /**
     * Muestra un formulario para crear un contribuyente
     */
    public function create()
    {
        $estadosCivil = Estado_civil::all();
        $tiposDni = Tipo_dni::all();
        $expediente = false;
        $tiposInmuebles = Tipo_inmueble::all();
        return view('contribuyente.crear', ['estados'=>$estadosCivil, 
                                            'tipos'=>$tiposDni, 
                                            'expediente'=>$expediente,
                                            'tiposInmuebles' => $tiposInmuebles]);
    }

    /**
     * Muestra un formulario para crear un contribuyente en el expediente
     */
    public function createEnExpediente()
    {
        $tiposhabilitaciones = Tipo_habilitacion::all();
        $tiposEstados = Tipo_estado::all();
        $tiposInmuebles = Tipo_inmueble::all();
        $estadosCivil = Estado_civil::all();
        $tiposDni = Tipo_dni::all();
        $expedientesContribuyentes= ExpedienteContribuyente::all();
        $expedientesPersonasJuridicas = ExpedientePersonaJuridica::all();
        $expediente = true;
        return view('contribuyente.crear', ['estados'=>$estadosCivil, 
                                            'tipos'=>$tiposDni,
                                            'expediente'=>$expediente,
                                            'tiposInmuebles' => $tiposInmuebles,
                                            'tiposEstados' => $tiposEstados,
                                            'tiposhabilitaciones' => $tiposhabilitaciones,
                                            'expedientesContribuyentes'=>$expedientesContribuyentes,
                                            'expedientesPersonasJuridicas'=>$expedientesPersonasJuridicas]);
    }

    /**
     * Guarda el contribuyente creado en la base de datos
     * @param  \App\Http\Requests\StoreContribuyenteRequest $request
     */
    public function store(Request $request)
    {
        $contribuyente = new contribuyente();
        $contribuyente->tipo_dni_id = $request->tipo_dni_id;
        $contribuyente->estado_civil_id = $request->estado_civil_id;
        $contribuyente->cuit = $request->cuit;
        $contribuyente->ingresos_brutos = $request->ingresos_brutos;
        $contribuyente->nombre = $request->nombre;
        $contribuyente->apellido = $request->apellido;
        $contribuyente->dni = $request->dni;
        $contribuyente->fecha_nacimiento = $request->fecha_nacimiento;
        $contribuyente->telefono = $request->telefono;
        $contribuyente->nombre_conyuge = $request->nombre_conyuge;
        $contribuyente->apellido_conyuge = $request->apellido_conyuge;
        $contribuyente->dni_conyuge = $request->dni_conyuge;

        if($contribuyente->save()){
            $log = new LogsContribuyenteController();
            $log->store($contribuyente, 'c');
            //if(!$request->expediente){
            //    return redirect()->route('contribuyentes');
            //}
            //else{
                $expediente = Expediente::select('id')->orderBy('id', 'desc')->first();
                $expedientesContribuyentes= ExpedienteContribuyente::all();
                $expedientesPersonasJuridicas = ExpedientePersonaJuridica::all();
                $contribuyentes=Contribuyente::all();
                $tiposInmuebles = Tipo_inmueble::all();
                $tiposEstados = Tipo_estado::all();
                $tiposhabilitaciones = Tipo_habilitacion::all();
                return view('expediente.crear', ['contribuyentes' => $contribuyentes,
                            'expediente'=>$expediente,
                            'expedientesContribuyentes'=>$expedientesContribuyentes,
                            'expedientesPersonasJuridicas'=>$expedientesPersonasJuridicas,
                            'tiposInmuebles' => $tiposInmuebles,
                            'tiposEstados' => $tiposEstados,
                            'tiposhabilitaciones' => $tiposhabilitaciones]);
            //}

        }
        return back()->with('fail','No se pudo crear el contribuyente');
    }

    /**
     * Muesta un contribuyente en un formulario con todos los campos cargados
     * @param  int $id
     */
    public function show($id)
    {
        $contribuyente = contribuyente::find($id);
        $estadosCivil = Estado_civil::all();
        $tiposDni = Tipo_dni::all();
        return view('contribuyente.mostrar', ['contribuyente' => $contribuyente, 'estados'=>$estadosCivil, 'tipos'=>$tiposDni]);
    }

    /**
     * Guarda los datos actualizados del contribuyente
     *
     * @param  \App\Http\Requests\UpdateContribuyenteRequest  $request
     */
    public function update(UpdateContribuyenteRequest $request)
    {
        $contribuyente = contribuyente::find($request->contribuyente_id);
        $contribuyente->tipo_dni_id = $request->tipo_dni_id;
        $contribuyente->estado_civil_id = $request->estado_civil_id;
        $contribuyente->cuit = $request->cuit;
        $contribuyente->ingresos_brutos = $request->ingresos_brutos;
        $contribuyente->nombre = $request->nombre;
        $contribuyente->apellido = $request->apellido;
        $contribuyente->dni = $request->dni;
        $contribuyente->fecha_nacimiento = $request->fecha_nacimiento;
        $contribuyente->telefono = $request->telefono;
        $contribuyente->nombre_conyuge = $request->nombre_conyuge;
        $contribuyente->apellido_conyuge = $request->apellido_conyuge;
        $contribuyente->dni_conyuge = $request->dni_conyuge;

        if($contribuyente->save()){
            $log = new LogsContribuyenteController();
            $log->store($contribuyente, 'u');
            return redirect()->route('contribuyentes');
        }
        return back()->with('fail','No se pudo editar el contribuyente');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     */
    public function destroy($id)
    {
        $contribuyente = Contribuyente::find($id);
        if($contribuyente->delete()){
            $log = new LogsContribuyenteController();
            $log->store($contribuyente, 'd');
            return redirect()->route('contribuyentes');
        }
        return back()->with('fail','No se pudo eliminar el contribuyente');
    }
}
