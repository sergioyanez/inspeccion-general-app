<?php

namespace App\Http\Controllers;

use App\Models\expediente;
use App\Models\ExpedientePersonaJuridica;
use App\Models\ExpedienteContribuyente;
use App\Models\Tipo_inmueble;
use App\Models\Tipo_dependencia;
use App\Models\Inmueble;
use App\Models\Detalle_inmueble;
use App\Models\Persona_juridica;
use App\Models\Contribuyente;
use App\Models\Catastro;
use App\Models\Detalle_habilitacion;
use App\Models\Estado_baja;
use App\Models\Tipo_estado;
use App\Models\Tipo_habilitacion;
use App\Models\Informe_dependencias;
use App\Models\Tipo_baja;


use App\Http\Controllers\LogsExpedienteController;
use App\Http\Controllers\LogsDetalleInmuebleController;
use App\Http\Controllers\LogsInmuebleController;
use App\Http\Controllers\LogsCatastroController;
use App\Http\Controllers\LogsDetalleHabilitacionController;
use App\Http\Controllers\LogsInformeDependenciaController;
use App\Http\Controllers\LogsEstadoBajaController;

use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\DetalleInmuebleController;
use App\Http\Controllers\DetalleHabilitacionController;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreexpedienteRequest;
use App\Http\Requests\UpdateexpedienteRequest;
use App\Http\Requests\Update1expedienteRequest;
use App\Http\Requests\Update2expedienteRequest;
use Exception;
use Illuminate\Validation\ValidationException;

/**
 * Controller de Expediente: brinda acceso a los servicios de expediente.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see Expediente
 * @version 1.0
 * @since 11/12/2022
 */
class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        $detalleHabilitaciones = Detalle_habilitacion::all();
        $detalleInmuebles = Detalle_inmueble::all();
        $tiposInmuebles = Tipo_inmueble::all();
        $tiposEstados = Tipo_estado::all();

        return view('expediente.crear', ['detalleHabilitaciones'=>$detalleHabilitaciones,
                                        'detalleInmuebles'=>$detalleInmuebles,
                                        'tiposInmuebles' => $tiposInmuebles,
                                        'tiposEstados' => $tiposEstados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreexpedienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreexpedienteRequest $request)
    {
        // SE CREA INMUEBLE
        $inmueble = new InmuebleController();
        $inmueble_id = $inmueble->store($request->calle, $request->numero);

        // SE CREA DETALLE INMUEBLE
        $detalleInmueble = new DetalleInmuebleController();
        $detalleInmueble_id = $detalleInmueble->store($inmueble_id, $request->tipo_inmueble_id, $request->fecha_vencimiento_alquiler);

        // SE CREA DETALLE DE HABILITACION
        $detalleHabilitacion = new DetalleHabilitacionController();
        $detalleHabilitacion_id = $detalleHabilitacion->store($request->estado_habilitacion_id);

        // SE CREA EXPEDIENTE
        $expediente = new Expediente();
        $numero_expediente = $request->nro_expediente . $request->nro_expediente1 . $request->nro_expediente2;
        if(Expediente::where('nro_expediente',$numero_expediente)->exists()){
            throw ValidationException::withMessages([
                'nro_expediente' => 'Expediente duplicado.',
            ]);
        }
        $expediente->nro_expediente = $numero_expediente;
        $numero_comercio = $request->nro_comercio . $request->nro_comercio1 . $request->nro_comercio3 . $request->nro_comercio2;
        $expediente->nro_comercio = $numero_comercio;
        $expediente->actividad_ppal = $request->actividad_ppal;     
        if($request->hasFile('pdf_solicitud')) {
            $archivo1 = $request->file('pdf_solicitud');
            //$archivo1_name = $archivo1->getClientOriginalName();
            $archivo1->move(public_path().'/archivos/', $archivo1->getClientOriginalName());
            $expediente->pdf_solicitud = '/archivos/' . $archivo1->getClientOriginalName();
            
        }
        $expediente->bienes_de_uso = $request->bienes_de_uso;       
        $expediente->observaciones_grales = $request->observaciones_grales;     
        $expediente->detalle_habilitacion_id = $detalleHabilitacion_id;
        $expediente->detalle_inmueble_id = $detalleInmueble_id;

        if ($expediente->save()){
            $log = new LogsExpedienteController();
            $log->store($expediente, 'c');

            // SECRETARIA DE GOBIERNO
            $infomeDependencias = new Informe_dependencias;
            $infomeDependencias->expediente_id = $expediente->id;
            $infomeDependencias->tipo_dependencia_id = 1;
            if($infomeDependencias->save()){
                $log5 = new LogsInformeDependenciaController();
                $log5->store($infomeDependencias, 'c');
            }

            // OBRAS PARTICULARES
            $infomeDependencias = new Informe_dependencias;
            $infomeDependencias->expediente_id = $expediente->id;
            $infomeDependencias->tipo_dependencia_id = 3;
            if($infomeDependencias->save()){
                $log6 = new LogsInformeDependenciaController();
                $log6->store($infomeDependencias, 'c');
            }

            // TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA
            $infomeDependencias = new Informe_dependencias;
            $infomeDependencias->expediente_id = $expediente->id;
            $infomeDependencias->tipo_dependencia_id = 4;
            if($infomeDependencias->save()){
                $log7 = new LogsInformeDependenciaController();
                $log7->store($infomeDependencias, 'c');
            }

            // BROMATOLOGÌA
            $infomeDependencias = new Informe_dependencias;
            $infomeDependencias->expediente_id = $expediente->id;
            $infomeDependencias->tipo_dependencia_id = 5;
            if($infomeDependencias->save()){
                $log8 = new LogsInformeDependenciaController();
                $log8->store($infomeDependencias, 'c');
            }

            // TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL
            $infomeDependencias = new Informe_dependencias;
            $infomeDependencias->expediente_id = $expediente->id;
            $infomeDependencias->tipo_dependencia_id = 6;
            if($infomeDependencias->save()){
                $log9 = new LogsInformeDependenciaController();
                        $log9->store($infomeDependencias, 'c');
            }

            // JUZGADO DE FALTAS
            $infomeDependencias = new Informe_dependencias;
            $infomeDependencias->expediente_id = $expediente->id;
            $infomeDependencias->tipo_dependencia_id = 7;
            if($infomeDependencias->save()){
                $log10 = new LogsInformeDependenciaController();
                $log10->store($infomeDependencias, 'c');
            }

            // BOMBEROS DE POLICÌA DE BUENOS AIRES
            $infomeDependencias = new Informe_dependencias;
            $infomeDependencias->expediente_id = $expediente->id;
            $infomeDependencias->tipo_dependencia_id = 8;
            if($infomeDependencias->save()){
                $log11 = new LogsInformeDependenciaController();
                $log11->store($infomeDependencias, 'c');
            }

            // INSPECCIÒN GENERAL
            $infomeDependencias = new Informe_dependencias;
            $infomeDependencias->expediente_id = $expediente->id;
            $infomeDependencias->tipo_dependencia_id = 9;
            if($infomeDependencias->save()){
                $log12 = new LogsInformeDependenciaController();
                $log12->store($infomeDependencias, 'c');
            }

            // REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS
            $infomeDependencias = new Informe_dependencias;
            $infomeDependencias->expediente_id = $expediente->id;
            $infomeDependencias->tipo_dependencia_id = 10;
            if($infomeDependencias->save()){
                $log13 = new LogsInformeDependenciaController();
                $log13->store($infomeDependencias, 'c');
            }

            return redirect()->route('expedientes-mostrar', [$expediente->id]);
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
        $detalleHabilitaciones = Detalle_habilitacion::all();
        $detalleInmuebles = Detalle_inmueble::all();
        $tiposInmuebles = Tipo_inmueble::all();
        $tiposEstados = Tipo_estado::all();
        $tiposhabilitaciones = Tipo_habilitacion::all();
        $expedientesContribuyentes = ExpedienteContribuyente::all(); 
        $expedientesPersonasJuridicas = ExpedientePersonaJuridica::all();   

        return view('expediente.mostrar', ['expediente'=>$expediente,
                                        'detalleHabilitaciones'=>$detalleHabilitaciones,
                                        'detalleInmuebles'=>$detalleInmuebles,
                                        'tiposEstados' => $tiposEstados,
                                        'tiposhabilitaciones' => $tiposhabilitaciones,
                                        'tiposInmuebles' => $tiposInmuebles,
                                        'expedientesContribuyentes' => $expedientesContribuyentes,
                                        'expedientesPersonasJuridicas' => $expedientesPersonasJuridicas]);
    }

    public function show1($id)
    {
        //$infoDependencias = new Informe_dependencias();

        $expediente = Expediente::find($id);
        $catastro = Catastro::all();
        $informesDependencias = Informe_dependencias::orderBy('id', 'asc')->where('expediente_id', $expediente->id)->paginate(200);

        return view('expediente.mostrar1', ['expediente'=>$expediente,
                                        'catastro'=>$catastro,
                                        'informesDependencias' => $informesDependencias]);
    }

    public function show2($id)
    {
        $tiposBajas = Tipo_baja::all();
        $expediente = Expediente::find($id);
        $detalleHabilitaciones = Detalle_habilitacion::all();
        $estadosBaja = Estado_baja::all();
        $tiposEstados = Tipo_estado::all();
        $tiposhabilitaciones = Tipo_habilitacion::all();
        $informesDependencias = Informe_dependencias::orderBy('id', 'asc')->where('expediente_id', $expediente->id)->paginate(200);
        $contribuyentes = ExpedienteContribuyente::orderBy('id', 'asc')->where('expediente_id', $expediente->id)->paginate(200);
        $personasJuridicas = ExpedientePersonaJuridica::orderBy('id', 'asc')->where('expediente_id', $expediente->id)->paginate(200);

        return view('expediente.mostrar2', ['expediente'=>$expediente,
                                        'detalleHabilitaciones'=>$detalleHabilitaciones,
                                        'estadosBaja' =>$estadosBaja,
                                        'tiposEstados' => $tiposEstados,
                                        'tiposhabilitaciones' => $tiposhabilitaciones,
                                        'informesDependencias' => $informesDependencias,
                                        //'contribuyentes' => $contribuyentes,
                                        //'personasJuridicas' => $personasJuridicas,
                                        'tiposBajas' => $tiposBajas]);
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
        //SE ACTUALIZA EL INMUEBLE
        $inmueble = Inmueble::find($request->inmueble_id);
        if($inmueble->calle != $request->calle || $inmueble->numero != $request->numero) {
            $inmueble->calle = $request->calle;
            $inmueble->numero = $request->numero;
            if($inmueble->save()) {
                $log1 = new LogsInmuebleController();
                $log1->store($inmueble, 'u');
            }
        } else {
            $inmueble->calle = $request->calle;
            $inmueble->numero = $request->numero;
            $inmueble->save();
        }

        // SE ACTUALIZA DETALLE INMUEBLE
        $detalleInmueble = Detalle_inmueble::find($request->detalle_inmueble_id);
        $detalleInmueble->inmueble_id = $request->inmueble_id;
        $detalleInmueble->tipo_inmueble_id = $request->tipo_inmueble_id;
        if($request->fecha_vencimiento_alquiler) {
            if($detalleInmueble->fecha_venc_alquiler != $request->fecha_vencimiento_alquiler) {
                $detalleInmueble->fecha_venc_alquiler = $request->fecha_vencimiento_alquiler;
                if($detalleInmueble->save()) {
                    $log2 = new LogsDetalleInmuebleController();
                    $log2->store($detalleInmueble, 'u');
                }
            } else {
                $detalleInmueble->fecha_venc_alquiler = $request->fecha_vencimiento_alquiler;
                $detalleInmueble->save();
            }
        }

        // SE CREA/ACTUALIZA EL EXPEDIENTE
        $expediente = Expediente::find($request->expediente_id);
        $expediente->nro_expediente = $request->nro_expediente;
        $expediente->nro_comercio = $request->nro_comercio;
        $expediente->actividad_ppal = $request->actividad_ppal;
        //$expediente->anexo = $request->anexo;
        $expediente->detalle_inmueble_id = $detalleInmueble->id;
        if($request->hasFile('pdf_solicitud_nueva')) {
            $archivo1 = $request->file('pdf_solicitud_nueva');
            $archivo1->move(public_path().'/archivos/', $archivo1->getClientOriginalName());
            //$archivo1->move(public_path().'/archivos/', $archivo1->getClientOriginalName());
            $expediente->pdf_solicitud = '/archivos/' . $archivo1->getClientOriginalName();
        }
        $expediente->bienes_de_uso = $request->bienes_de_uso;
        $expediente->observaciones_grales = $request->observaciones_grales;
        
        if ($expediente->save()){
            $log = new LogsExpedienteController();
            $log->store($expediente, 'u');
            return redirect()->route('expedientes-mostrar1', [$expediente->id]);

        }
        return back()->with('fail','No se pudo editar el expediente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateexpedienteRequest  $request
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update1(Update1expedienteRequest $request)
    {
        // SE CREA/ACTUALIZA CATASTRO
        if($request->catastro_id != null) {
            $catastro = Catastro::find($request->catastro_id);
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
            if($request->hasFile('pdf_informe_nuevo')) {
                $archivo = $request->file('pdf_informe_nuevo');
                $archivo->move(public_path().'/archivos/', $archivo->getClientOriginalName());
                $catastro->pdf_informe = '/archivos/' . $archivo->getClientOriginalName();
            }
            if($catastro->save()){
                $log3 = new LogsCatastroController();
                $log3->store($catastro, 'u');
            }
        }
        else {
            //if($request->circunscripcion || $request->seccion || $request->chacra || $request->quinta || $request->fraccion || $request->manzana
            //|| $request->parcela || $request->sub_parcela || $request->observaciones || $request->fecha_informe || $request->hasFile('pdf_informe')) {
                $catastro = new Catastro;
                //if($request->circunscripcion)
                $catastro->circunscripcion = $request->circunscripcion;
                $catastro->seccion = $request->seccion;
                if($request->chacra) {
                    $catastro->chacra = $request->chacra;
                }
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
                    $catastro->pdf_informe = '/archivos/' . $archivo->getClientOriginalName();
                }
                if($catastro->save()){
                    $log3 = new LogsCatastroController();
                    $log3->store($catastro, 'c');
                }
            //}
        }

        // SE CREA/ACTUALIZA EL EXPEDIENTE
        $expediente = Expediente::find($request->expediente_id);
        
        if(isset($catastro->id)) {
            $expediente->catastro_id = $catastro->id;
        }
        
        if ($expediente->save()){
            $log = new LogsExpedienteController();
            $log->store($expediente, 'u');

            // SECRETARIA DE GOBIERNO
            if($request->secretaria_id != null) {
                $infomeDependencias = Informe_dependencias::find($request->secretaria_id);
                $infomeDependencias->expediente_id = $expediente->id;
                $infomeDependencias->tipo_dependencia_id = 1;
                $infomeDependencias->observaciones = $request->secretaria_gobierno;
                if($request->fecha_secretaria_gobierno)
                    $infomeDependencias->fecha_informe = $request->fecha_secretaria_gobierno;
                if($request->hasFile('pdf_secretaria_gobierno')) {
                    $archivo5 = $request->file('pdf_secretaria_gobierno');
                    $archivo5->move(public_path().'/archivos/', $archivo5->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo5->getClientOriginalName();
                }
                if($request->hasFile('pdf_secretaria_gobierno_nuevo')) {
                    $archivo5 = $request->file('pdf_secretaria_gobierno_nuevo');
                    $archivo5->move(public_path().'/archivos/', $archivo5->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo5->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log5 = new LogsInformeDependenciaController();
                    $log5->store($infomeDependencias, 'u');
                }
            }

            // OBRAS PARTICULARES
            if($request->obras_id != null) {
                $infomeDependencias = Informe_dependencias::find($request->obras_id);
                $infomeDependencias->expediente_id = $expediente->id;
                $infomeDependencias->tipo_dependencia_id = 3;
                $infomeDependencias->observaciones = $request->obras_particulares;
                if($request->fecha_obras_particulares)
                    $infomeDependencias->fecha_informe = $request->fecha_obras_particulares;
                if($request->hasFile('pdf_obras_particulares')) {
                    $archivo6 = $request->file('pdf_obras_particulares');
                    $archivo6->move(public_path().'/archivos/', $archivo6->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo6->getClientOriginalName();
                }
                if($request->hasFile('pdf_obras_particulares_nuevo')) {
                    $archivo6 = $request->file('pdf_obras_particulares_nuevo');
                    $archivo6->move(public_path().'/archivos/', $archivo6->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo6->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log6 = new LogsInformeDependenciaController();
                    $log6->store($infomeDependencias, 'u');
                }
            }

            // TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA
            if($request->alumbrado_id != null) {
                $infomeDependencias = Informe_dependencias::find($request->alumbrado_id);
                $infomeDependencias->expediente_id = $expediente->id;
                $infomeDependencias->tipo_dependencia_id = 4;
                $infomeDependencias->observaciones = $request->alumbrado;
                if($request->fecha_alumbrado)
                    $infomeDependencias->fecha_informe = $request->fecha_alumbrado;
                if($request->hasFile('pdf_alumbrado')) {
                    $archivo7 = $request->file('pdf_alumbrado');
                    $archivo7->move(public_path().'/archivos/', $archivo7->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo7->getClientOriginalName();
                }
                if($request->hasFile('pdf_alumbrado_nuevo')) {
                    $archivo7 = $request->file('pdf_alumbrado_nuevo');
                    $archivo7->move(public_path().'/archivos/', $archivo7->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo7->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log7 = new LogsInformeDependenciaController();
                    $log7->store($infomeDependencias, 'u');
                }
            }

            // BROMATOLOGÌA
            if($request->bromatologia_id != null) {
                $infomeDependencias = Informe_dependencias::find($request->bromatologia_id);
                $infomeDependencias->expediente_id = $expediente->id;
                $infomeDependencias->tipo_dependencia_id = 5;
                $infomeDependencias->observaciones = $request->bromatologia;
                if($request->fecha_bromatologia)
                    $infomeDependencias->fecha_informe = $request->fecha_bromatologia;
                if($request->hasFile('pdf_bromatologia')) {
                    $archivo8 = $request->file('pdf_bromatologia');
                    $archivo8->move(public_path().'/archivos/', $archivo8->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo8->getClientOriginalName();
                }
                if($request->hasFile('pdf_bromatologia_nuevo')) {
                    $archivo8 = $request->file('pdf_bromatologia_nuevo');
                    $archivo8->move(public_path().'/archivos/', $archivo8->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo8->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log8 = new LogsInformeDependenciaController();
                    $log8->store($infomeDependencias, 'u');
                }
            }

            // TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL
            if($request->inspeccion_id != null) {
                $infomeDependencias = Informe_dependencias::find($request->inspeccion_id);
                $infomeDependencias->expediente_id = $expediente->id;
                $infomeDependencias->tipo_dependencia_id = 6;
                $infomeDependencias->observaciones = $request->inspeccion;
                if($request->fecha_inspeccion)
                    $infomeDependencias->fecha_informe = $request->fecha_inspeccion;
                if($request->hasFile('pdf_inspeccion')) {
                    $archivo9 = $request->file('pdf_inspeccion');
                    $archivo9->move(public_path().'/archivos/', $archivo9->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo9->getClientOriginalName();
                }
                if($request->hasFile('pdf_inspeccion_nuevo')) {
                    $archivo9 = $request->file('pdf_inspeccion_nuevo');
                    $archivo9->move(public_path().'/archivos/', $archivo9->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo9->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log9 = new LogsInformeDependenciaController();
                    $log9->store($infomeDependencias, 'u');
                }
            }

            // JUZGADO DE FALTAS
            if($request->juzgado_id != null) {
                $infomeDependencias = Informe_dependencias::find($request->juzgado_id);
                $infomeDependencias->expediente_id = $expediente->id;
                $infomeDependencias->tipo_dependencia_id = 7;
                $infomeDependencias->observaciones = $request->juzgado;
                if($request->fecha_juzgado)
                    $infomeDependencias->fecha_informe = $request->fecha_juzgado;
                if($request->hasFile('pdf_juzgado')) {
                    $archivo10 = $request->file('pdf_juzgado');
                    $archivo10->move(public_path().'/archivos/', $archivo10->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo10->getClientOriginalName();
                }
                if($request->hasFile('pdf_juzgado_nuevo')) {
                    $archivo10 = $request->file('pdf_juzgado_nuevo');
                    $archivo10->move(public_path().'/archivos/', $archivo10->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo10->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log10 = new LogsInformeDependenciaController();
                    $log10->store($infomeDependencias, 'u');
                }
            }

            // BOMBEROS DE POLICÌA DE BUENOS AIRES
            if($request->bomberos_id != null) {
                $infomeDependencias = Informe_dependencias::find($request->bomberos_id);
                $infomeDependencias->expediente_id = $expediente->id;
                $infomeDependencias->tipo_dependencia_id = 8;
                $infomeDependencias->observaciones = $request->bomberos;
                if($request->fecha_bomberos)
                    $infomeDependencias->fecha_informe = $request->fecha_bomberos;
                if($request->hasFile('pdf_bomberos')) {
                    $archivo11 = $request->file('pdf_bomberos');
                    $archivo11->move(public_path().'/archivos/', $archivo11->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo11->getClientOriginalName();
                }
                if($request->hasFile('pdf_bomberos_nuevo')) {
                    $archivo11 = $request->file('pdf_bomberos_nuevo');
                    $archivo11->move(public_path().'/archivos/', $archivo11->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo11->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log11 = new LogsInformeDependenciaController();
                    $log11->store($infomeDependencias, 'u');
                }
            }

            // INSPECCIÒN GENERAL
            if($request->inspeccion_general_id != null) {
                $infomeDependencias = Informe_dependencias::find($request->inspeccion_general_id);
                $infomeDependencias->expediente_id = $expediente->id;
                $infomeDependencias->tipo_dependencia_id = 9;
                $infomeDependencias->observaciones = $request->inspeccion_general;
                if($request->fecha_inspeccion_general)
                    $infomeDependencias->fecha_informe = $request->fecha_inspeccion_general;
                if($request->hasFile('pdf_inspeccion_general')) {
                    $archivo12 = $request->file('pdf_inspeccion_general');
                    $archivo12->move(public_path().'/archivos/', $archivo12->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo12->getClientOriginalName();
                }
                if($request->hasFile('pdf_inspeccion_general_nuevo')) {
                    $archivo12 = $request->file('pdf_inspeccion_general_nuevo');
                    $archivo12->move(public_path().'/archivos/', $archivo12->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo12->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log12 = new LogsInformeDependenciaController();
                    $log12->store($infomeDependencias, 'u');
                }
            }

            // REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS
            if($request->deudores_alimentarios_id != null) {
                $infomeDependencias = Informe_dependencias::find($request->deudores_alimentarios_id);
                $infomeDependencias->expediente_id = $expediente->id;
                $infomeDependencias->tipo_dependencia_id = 10;
                $infomeDependencias->observaciones = $request->deudores_alimentarios;
                if($request->fecha_deudores_alimentarios)
                    $infomeDependencias->fecha_informe = $request->fecha_deudores_alimentarios;
                if($request->hasFile('pdf_deudores_alimentarios')) {
                    $archivo13 = $request->file('pdf_deudores_alimentarios');
                    $archivo13->move(public_path().'/archivos/', $archivo13->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo13->getClientOriginalName();
                }
                if($request->hasFile('pdf_deudores_alimentarios_nuevo')) {
                    $archivo13 = $request->file('pdf_deudores_alimentarios_nuevo');
                    $archivo13->move(public_path().'/archivos/', $archivo13->getClientOriginalName());
                    $infomeDependencias->pdf_informe = '/archivos/' . $archivo13->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log13 = new LogsInformeDependenciaController();
                    $log13->store($infomeDependencias, 'u');
                }
            }
            return redirect()->route('expedientes-mostrar2', [$expediente->id]);
        }
    }

    public function update2(Update2expedienteRequest $request)
    {
        // SE ACTUALIZA DETALLE DE HABILITACION
        $detalleHabilitacion = Detalle_habilitacion::find($request->detalle_habilitacion);
        if($request->tipo_habilitacion_id != "-- Seleccione --")
            $detalleHabilitacion->tipo_habilitacion_id = $request->tipo_habilitacion_id;
        $detalleHabilitacion->tipo_estado_id = $request->estado_habilitacion_id;
        $detalleHabilitacion->fecha_vencimiento = $request->fecha_vencimiento;
        $detalleHabilitacion->fecha_primer_habilitacion = $request->fecha_primer_habilitacion;
        if($request->hasFile('certificado_nuevo')) {
            $archivo2 = $request->file('certificado_nuevo');
            $archivo2->move(public_path().'/archivos/', $archivo2->getClientOriginalName());
            $detalleHabilitacion->pdf_certificado_habilitacion = '/archivos/' . $archivo2->getClientOriginalName();
        }
        else {
            if($request->certificado_habilitacion)
                $detalleHabilitacion->pdf_certificado_habilitacion = $request->certificado_habilitacion;
        }
        if($detalleHabilitacion->save()){
            $log4 = new LogsDetalleHabilitacionController();
            $log4->store($detalleHabilitacion, 'u');
        }

        // SE CREA/ACTUALIZA ESTADO DE BAJA
        if($request->estado_baja_id != null) {
            $estadoBaja = Estado_baja::find($request->estado_baja_id);
            // PROVISORIA
            if( $request->tipo_baja_id ==1){

                $estadoBaja->tipo_baja_id = $request->tipo_baja_id;
                $estadoBaja->deuda = $request->deuda;
                $estadoBaja->fecha_baja = $request->fecha_baja_provisoria;
                $estadoBaja->pdf_acta_solicitud_baja = null;
                if($request->hasFile('acta_baja_nuevo')) {
                    $archivo2 = $request->file('acta_baja_nuevo');
                    $archivo2->move(public_path().'/archivos/', $archivo2->getClientOriginalName());
                    $estadoBaja->pdf_solicitud_baja = '/archivos/' . $archivo2->getClientOriginalName();
                }
                if($estadoBaja->deuda){
                    if($request->hasFile('informe_deuda_nuevo')){
                        $archivo3 = $request->file('informe_deuda_nuevo');
                        $archivo3->move(public_path().'/archivos/', $archivo3->getClientOriginalName());
                        $estadoBaja->pdf_informe_deuda = '/archivos/' . $archivo3->getClientOriginalName();
                    }else{
                        throw ValidationException::withMessages([
                            'informe_deuda_nuevo' => 'Debe cargar un PDF.',
                        ]);
                    }
                }

                if($estadoBaja->save()){
                    $log = new LogsEstadoBajaController();
                    $log->store($estadoBaja, 'c');
                }
            }
            // PERMANENTE o de oficio
            else {
                if($request->fecha_baja1 && $request->hasFile('acta_baja_nuevo1')){
                    $estadoBaja->tipo_baja_id = $request->tipo_baja_id;
                    $estadoBaja->fecha_baja = $request->fecha_baja1;
                    $estadoBaja->deuda = 0;
                    $estadoBaja->pdf_informe_deuda = null;
                    $estadoBaja->pdf_solicitud_baja = null;
                    if($request->hasFile('acta_baja_nuevo1')) {
                        $archivo4 = $request->file('acta_baja_nuevo1');
                        $archivo4->move(public_path().'/archivos/', $archivo4->getClientOriginalName());
                        $estadoBaja->pdf_acta_solicitud_baja = '/archivos/' . $archivo4->getClientOriginalName();
                    }
                    if($estadoBaja->save()){
                        $log6 = new LogsEstadoBajaController();
                        $log6->store($estadoBaja, 'u');
                    }
                }else{
                    throw ValidationException::withMessages([
                        'fecha_baja1' => 'Debe cargar una fecha.',
                        'acta_baja_nuevo1' => 'Debe cargar un PDF.',
                    ]);
                }
            }
        }
        else {
            if($request->fecha_baja){
                $estadoBaja = new Estado_baja();
                $estadoBaja->tipo_baja_id = $request->tipo_baja_id;
                $estadoBaja->deuda = $request->deuda;
                $estadoBaja->fecha_baja = $request->fecha_baja;
                if($request->hasFile('acta_baja')) {
                    $archivo5 = $request->file('acta_baja');
                    $archivo5->move(public_path().'/archivos/', $archivo5->getClientOriginalName());
                    $estadoBaja->pdf_solicitud_baja = '/archivos/' . $archivo5->getClientOriginalName();
                }
                if($estadoBaja->deuda){
                    if($request->hasFile('pdf_informe_deuda')) {
                        $archivo6 = $request->file('pdf_informe_deuda');
                        $archivo6->move(public_path().'/archivos/', $archivo6->getClientOriginalName());
                        $estadoBaja->pdf_informe_deuda = '/archivos/' . $archivo6->getClientOriginalName();
                    }else{
                        throw ValidationException::withMessages([
                            'pdf_informe_deuda' => 'Debe cargar un PDF.',
                        ]);
                    }
                }
                if($estadoBaja->save()){
                    $log5 = new LogsEstadoBajaController();
                    $log5->store($estadoBaja, 'c');
                }
            }
            if($request->fecha_baja1 && $request->hasFile('acta_baja_nuevo1')){
                $estadoBaja = new Estado_baja();
                $estadoBaja->tipo_baja_id = $request->tipo_baja_id;
                $estadoBaja->fecha_baja = $request->fecha_baja1;
                $estadoBaja->pdf_solicitud_baja = null;
                $estadoBaja->pdf_informe_deuda = null;
                if($request->hasFile('acta_baja1')) {
                    $archivo7 = $request->file('acta_baja1');
                    $archivo7->move(public_path().'/archivos/', $archivo7->getClientOriginalName());
                    $estadoBaja->pdf_acta_solicitud_baja = '/archivos/' . $archivo7->getClientOriginalName();
                }
                if($estadoBaja->save()){
                    $log5 = new LogsEstadoBajaController();
                    $log5->store($estadoBaja, 'c');
                }
            }
        }


        // SE CREA/ACTUALIZA EL EXPEDIENTE
        $expediente = Expediente::find($request->expediente_id);

        $expediente->detalle_habilitacion_id = $detalleHabilitacion->id;
        if(isset($estadoBaja->id)){
            $expediente->estado_baja_id = $estadoBaja->id;
        }


        if ($expediente->save()){
            $log = new LogsExpedienteController();
            $log->store($expediente, 'u');

            return redirect()->route('pagina-principal');
        }
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
        return back()->with('fail','No se pudo eliminar el expediente');
    }
}
