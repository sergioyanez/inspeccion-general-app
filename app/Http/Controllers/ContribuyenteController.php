<?php

namespace App\Http\Controllers;

use App\Models\Contribuyente;
use App\Models\Tipo_dni;
use App\Models\Estado_civil;
use App\Http\Controllers\LogsContribuyenteController;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContribuyenteRequest;
use App\Http\Requests\UpdateContribuyenteRequest;

class ContribuyenteController extends Controller
{
    /**
     * Muesta todos los contribuyentes
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contribuyentes = Contribuyente::all();
        return view('contribuyente.contribuyentes', ['contribuyentes' => $contribuyentes]);
    }

    /**
     * Muestra un formulario para crear un contribuyente
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadosCivil = Estado_civil::all();
        $tiposDni = Tipo_dni::all();
        return view('contribuyente.crear', ['estados'=>$estadosCivil, 'tipos'=>$tiposDni]);
    }

    /**
     * Guarda el contribuyente creado en la base de datos
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $log = new LogsContribuyenteController();

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

        $contribuyente->save();

        $log->store($contribuyente, 'c');

        return redirect()->route('contribuyentes');
    }

    /**
     * Muesta un contribuyente en un formulario con todos los campos cargados
     *
     * @param  \App\Models\Contribuyente  $contribuyente
     * @return \Illuminate\Http\Response
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
     * @param  \App\Models\Contribuyente  $contribuyente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $log = new LogsContribuyenteController();

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

        $contribuyente->save();

        $log->store($contribuyente, 'u');

        return redirect()->route('contribuyentes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contribuyente  $contribuyente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $log = new LogsContribuyenteController();

        $contribuyente = Contribuyente::find($id);
        $contribuyente->delete();

        $log->store($contribuyente, 'd');

        return redirect()->route('contribuyentes');

        
    }
}
