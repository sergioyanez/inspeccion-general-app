<?php

namespace App\Http\Controllers;

use App\Models\expediente;
use App\Models\ExpedientePersonaJuridica;
use App\Models\ExpedienteContribuyente;
use App\Models\Tipo_inmueble;
use App\Models\Inmueble;
use App\Models\Detalle_inmueble;
use App\Models\Persona_juridica;
use App\Models\Contribuyente;
use App\Models\Catastro;
use App\Models\Detalle_habilitacion;
use App\Models\Estado_baja;
use App\Models\Tipo_dependencia;

use App\Http\Controllers\LogsExpedienteController;
use App\Http\Controllers\LogsDetalleInmuebleController;
use App\Http\Controllers\LogsInmuebleController;
use App\Http\Controllers\LogsCatastroController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreexpedienteRequest;
use App\Http\Requests\UpdateexpedienteRequest;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

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



    public function buscarContribEnExpediente($id)
    {
        $expedienteID = Expediente::select('id')->orderBy('id', 'desc')->first();
        $expedientesContribuyentes = ExpedienteContribuyente::orderBy('id', 'asc')
        ->where('expediente_id', 'LIKE', '%' . $id . '%');
        return $expedientesContribuyentes;

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
        $personasJuridicas = Persona_juridica::all();
        $expediente = Expediente::orderBy('id', 'desc')->first();
        $expedientesContribuyentes = ExpedienteContribuyente::all();
        $expedientesPersonasJuridicas = ExpedientePersonaJuridica::all();
        $tiposInmuebles = Tipo_inmueble::all();
        $tipoDependencias = Tipo_dependencia::all();
        return view('expediente.crear', ['catastro'=>$catastro,
                                        'detalleHabilitaciones'=>$detalleHabilitaciones,
                                        'detalleInmuebles'=>$detalleInmuebles,
                                        'contribuyentes' =>$contribuyentes,
                                        'estadosBaja' =>$estadosBaja,
                                        'personasJuridicas' => $personasJuridicas,
                                        'expediente' =>$expediente,
                                        'expedientesContribuyentes'=>$expedientesContribuyentes,
                                        'expedientesPersonasJuridicas'=>$expedientesPersonasJuridicas,
                                        'tiposInmuebles' => $tiposInmuebles,
                                        'tipoDependencias' => $tipoDependencias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreexpedienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // aca va StoreexpedienteRequest
    {
        // SE CREAR EL INMUEBLE
        $calle = $request->calle;
        $numero = $request->numero;
        
        $inmueble = new Inmueble;
        $inmueble->calle = $calle;
        $inmueble->numero = $numero;
        if($inmueble->save()) {
            $log1 = new LogsInmuebleController();
            $log1->store($inmueble, 'c');
        }

        // SE CREA DETALLE INMUEBLE
        $detalleInmueble = new Detalle_inmueble;
        $detalleInmueble->inmueble_id = $inmueble->id;
        $detalleInmueble->tipo_inmueble_id = $request->tipo_inmueble_id;
        if($request->fecha_vencimiento_alquiler)
            $detalleInmueble->fecha_venc_alquiler = $request->fecha_vencimiento_alquiler;
        if($detalleInmueble->save()) {
            $log2 = new LogsDetalleInmuebleController();
            $log2->store($detalleInmueble, 'c');
        }

        // SE CREA CATASTRO
        $catastro = new Catastro;
        $catastro->circunscripcion = $request->circunscripcion;
        $catastro->seccion = $request->seccion;
        $catastro->chacra = $request->chacra;
        $catastro->quinta = $request->quinta;
        $catastro->fraccion = $request->fraccion;
        $catastro->manzana = $request->manzana;
        $catastro->parcela = $request->parcela;
        $catastro->sub_parcela = $request->sub_parcela;
        if($request->observaciones)
            $catastro->observacion = $request->observaciones;
        if($request->fecha_informe)
            $catastro->fecha_informe = $request->fecha_informe;
        if($request->hasFile('pdf_informe')) {
            $archivo = $request->file('pdf_informe');
            $archivo->move(public_path().'/archivos/', $archivo->getClientOriginalName());
            $catastro->pdf_informe = $archivo->getClientOriginalName();
        }

        // if($request->pdf_informe)
        //     $catastro->pdf_informe = $request->pdf_informe;

        if($catastro->save()){
            $log3 = new LogsCatastroController();
            $log3->store($catastro, 'c');
        }
        
        $expediente = new Expediente();
        $expediente->catastro_id = $catastro->id;       //hecho
        $expediente->estado_baja_id = $request->estado_baja_id;
        $expediente->nro_expediente = $request->nro_expediente;     //hecho
        $expediente->nro_comercio = $request->nro_comercio;         //hecho
        $expediente->actividad_ppal = $request->actividad_ppal;     //hecho
        $expediente->anexo = $request->anexo;                       //hecho
        if($request->hasFile('pdf_solicitud')) {                    //hecho pdf_informe
            $archivo1 = $request->file('pdf_solicitud');
            $archivo1->move(public_path().'/archivos/', $archivo1->getClientOriginalName());
            $expediente->pdf_solicitud = $archivo1->getClientOriginalName();
        }
        // $expediente->pdf_solicitud = $request->pdf_solicitud;
        $expediente->bienes_de_uso = $request->bienes_de_uso;       //hecho
        $expediente->observaciones_grales = $request->observaciones_grales;     //hecho
        $expediente->detalle_habilitacion_id = $request->detalle_habilitacion_id;
        $expediente->detalle_inmueble_id = $detalleInmueble->id;       //hecho

        

        if ($expediente->save()){
            $log = new LogsExpedienteController();
            $log->store($expediente, 'c');

            return redirect()->route('expedientes-crear');
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
    public function update(UpdateexpedienteRequest $request)
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
