<?php

namespace App\Http\Controllers;

use App\Models\expediente;
use App\Models\Contribuyente;
use App\Models\Catastro;
use App\Models\Detalle_habilitacion;
use App\Models\Detalle_inmueble;
use App\Models\Estado_baja;
use App\Http\Controllers\LogsExpedienteController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreexpedienteRequest;
use App\Http\Requests\UpdateexpedienteRequest;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $expedientes = Expediente::all();
        return view('expediente.expedientes', ['expedientes' => $expedientes]);
    }*/

    public function index() {
        $expedientes = Expediente::query()
            ->when(request('buscarporcomercio'), function ($query) {
                return $query->where('nro_comercio', 'LIKE', '%' . request('buscarporcomercio') . '%');


            })
            ->paginate(200);
            return view('expediente.expedientes', ['expedientes' => $expedientes]);
    }

    public function index1() {
        $expedientes = Expediente::query()
            ->with(['contribuyentes', 'personasJuridicas'])
            ->when(request('buscarporcontribuyente'), function ($query) {

                return $query->whereHas('contribuyentes', function ($c) {
                            $c->where('nombre', 'LIKE', '%' . request('buscarporcontribuyente') . '%');
                            $c->orwhere('apellido', 'LIKE', '%' . request('buscarporcontribuyente') . '%');
                        }
                    )
                    ->orWhereHas('personasJuridicas', function ($p) {
                            $p->where('nombre_representante', 'LIKE', '%' . request('buscarporcontribuyente') . '%');
                            $p->orwhere('apellido_representante', 'LIKE', '%' . request('buscarporcontribuyente') . '%');
                        }
                    );

            })
            ->paginate(200);
            return view('expediente.expedientes', ['expedientes' => $expedientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contribuyentes = Contribuyente::all();
        $catastro = Catastro::all();
        $detalleHabilitaciones = Detalle_habilitacion::all();
        $detalleInmuebles = Detalle_inmueble::all();
        $estadosBaja = Estado_baja::all();
        return view('expediente.crear', ['catastro'=>$catastro,
                                        'detalleHabilitaciones'=>$detalleHabilitaciones,
                                        'detalleInmuebles'=>$detalleInmuebles,
                                        'contribuyentes' =>$contribuyentes,
                                        'estadosBaja' =>$estadosBaja]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreexpedienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expediente = new Expediente();
        $expediente->catastro_id = $request->catastro_id;
        $expediente->estado_baja_id = $request->estado_baja_id;
        $expediente->nro_expediente = $request->nro_expediente;
        $expediente->nro_comercio = $request->nro_comercio;
        $expediente->actividad_ppal = $request->actividad_ppal;
        $expediente->anexo = $request->anexo;
        $expediente->pdf_solicitud = $request->pdf_solicitud;
        $expediente->bienes_de_uso = $request->bienes_de_uso;
        $expediente->observaciones_grales = $request->observaciones_grales;
        $expediente->detalle_habilitacion_id = $request->detalle_habilitacion_id;
        $expediente->detalle_inmueble_id = $request->detalle_inmueble_id;
        $contribuyente_id = $request->contribuyente_id;

        if ($expediente->save()){
            $log = new LogsExpedienteController();
            $log->store($expediente, 'c');
            if($contribuyente_id) {
                $expedienteContribuyente = new ExpedienteContribuyenteController();
                $expedienteContribuyente->store($contribuyente_id, $expediente->id);
            }
            
            return redirect()->route('expedientes');
        }
        return back()->with('fail','No se pudo crear el expediente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expediente = Expediente::find($id);
        $catastro = Catastro::all();
        $detalleHabilitaciones = Detalle_habilitacion::all();
        $detalleInmuebles = Detalle_inmueble::all();
        $estadosBaja = Estado_baja::all();
        return view('expediente.mostrar', ['expediente'=>$expediente,
                                        'catastro'=>$catastro,
                                        'detalleHabilitaciones'=>$detalleHabilitaciones,
                                        'detalleInmuebles'=>$detalleInmuebles,
                                        'estadosBaja' =>$estadosBaja]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateexpedienteRequest  $request
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $expediente = Expediente::find($request->expediente_id);
        $expediente->catastro_id = $request->catastro_id;
        $expediente->estado_baja_id = $request->estado_baja_id;
        $expediente->nro_expediente = $request->nro_expediente;
        $expediente->nro_comercio = $request->nro_comercio;
        $expediente->actividad_ppal = $request->actividad_ppal;
        $expediente->anexo = $request->anexo;
        $expediente->pdf_solicitud = $request->pdf_solicitud;
        $expediente->bienes_de_uso = $request->bienes_de_uso;
        $expediente->observaciones_grales = $request->observaciones_grales;
        $expediente->detalle_habilitacion_id = $request->detalle_habilitacion_id;
        $expediente->detalle_inmueble_id = $request->detalle_inmueble_id;

        if ($expediente->save()){
            $log = new LogsExpedienteController();
            $log->create($expediente, 'u');
            return redirect()->route('expedientes');
        }
        return back()->with('fail','No se pudo crear el expediente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expediente = Expediente::find($id);
        if ($expediente->delete()){
            $log = new LogsExpedienteController();
            $log->create($expediente, 'd');
            return redirect()->route('expedientes');
        }
        return back()->with('fail','No se pudo crear el expediente');
    }
}
