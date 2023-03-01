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


use App\Http\Controllers\LogsExpedienteController;
use App\Http\Controllers\LogsDetalleInmuebleController;
use App\Http\Controllers\LogsInmuebleController;
use App\Http\Controllers\LogsCatastroController;
use App\Http\Controllers\LogsDetalleHabilitacionController;
use App\Http\Controllers\LogsInformeDependenciaController;

use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\DetalleInmuebleController;
use App\Http\Controllers\DetalleHabilitacionController;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreexpedienteRequest;
use App\Http\Requests\UpdateexpedienteRequest;
use Exception;


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
        $tiposEstados = Tipo_estado::all();
        $tiposhabilitaciones = Tipo_habilitacion::all();
        //$informesDependencias = Informe_dependencias::orderBy('id', 'asc')->where('expediente_id', $expediente->id)->paginate(200);

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
                                        'tiposEstados' => $tiposEstados,
                                        'tiposhabilitaciones' => $tiposhabilitaciones,
                                        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreexpedienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreexpedienteRequest $request) // aca va StoreexpedienteRequest
    {
        $inmueble = new InmuebleController();
        $inmueble_id = $inmueble->store($request->calle, $request->numero);

        $detalleInmueble = new DetalleInmuebleController();
        $detalleInmueble_id = $detalleInmueble->store($inmueble_id, $request->tipo_inmueble_id, $request->fecha_vencimiento_alquiler);
        // SE CREA EL INMUEBLE
        // $calle = $request->calle;
        // $numero = $request->numero;

        // $inmueble = new Inmueble;
        // $inmueble->calle = $calle;
        // $inmueble->numero = $numero;
        // if($inmueble->save()) {
        //     $log1 = new LogsInmuebleController();
        //     $log1->store($inmueble, 'c');
        // }

        // SE CREA DETALLE INMUEBLE
        // $detalleInmueble = new Detalle_inmueble;
        // $detalleInmueble->inmueble_id = $inmueble->id;
        // $detalleInmueble->tipo_inmueble_id = $request->tipo_inmueble_id;
        // if($request->fecha_vencimiento_alquiler)
        //     $detalleInmueble->fecha_venc_alquiler = $request->fecha_vencimiento_alquiler;
        // if($detalleInmueble->save()) {
        //     $log2 = new LogsDetalleInmuebleController();
        //     $log2->store($detalleInmueble, 'c');
        // }

        $detalleHabilitacion = new DetalleHabilitacionController();
        $detalleHabilitacion_id = $detalleHabilitacion->store($request->estado_habilitacion_id);
        // SE CREA DETALLE DE HABILITACION
        // este $detalleHabilitacion = new Detalle_habilitacion;
        //$detalleHabilitacion->tipo_habilitacion_id = $request->tipo_habilitacion_id;
        // este $detalleHabilitacion->tipo_estado_id = $request->estado_habilitacion_id;
        //$detalleHabilitacion->fecha_vencimiento = $request->fecha_vencimiento;
        //$detalleHabilitacion->fecha_primer_habilitacion = $request->fecha_primer_habilitacion;
        //if($request->hasFile('certificado_habilitacion')) {
        //    $archivo2 = $request->file('certificado_habilitacion');
        //    $archivo2->move(public_path().'/archivos/', $archivo2->getClientOriginalName());
        //    $detalleHabilitacion->pdf_certificado_habilitacion = $archivo2->getClientOriginalName();
        //}
        // if($detalleHabilitacion->save()){
        //     $log4 = new LogsDetalleHabilitacionController();
        //     $log4->store($detalleHabilitacion, 'c');
        // }

        $expediente = new Expediente();
        //$expediente->catastro_id = $catastro->id;       //hecho
        //$expediente->estado_baja_id = $request->estado_baja_id;
        $expediente->nro_expediente = $request->nro_expediente;     //hecho
        $expediente->nro_comercio = $request->nro_comercio;         //hecho
        $expediente->actividad_ppal = $request->actividad_ppal;     //hecho
        $expediente->anexo = $request->anexo;                       //hecho
        if($request->hasFile('pdf_solicitud')) {                    //hecho pdf_informe
            $archivo1 = $request->file('pdf_solicitud');
            $archivo1->move(public_path().'/archivos/', $archivo1->getClientOriginalName());
            $expediente->pdf_solicitud = $archivo1->getClientOriginalName();
        }
        //$expediente->bienes_de_uso = $request->bienes_de_uso;       //hecho
        //$expediente->observaciones_grales = $request->observaciones_grales;     //hecho
        // $expediente->detalle_habilitacion_id = $detalleHabilitacion->id;        //hecho
        $expediente->detalle_habilitacion_id = $detalleHabilitacion_id;
        //$expediente->detalle_inmueble_id = $detalleInmueble->id;       //hecho
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
        $infoDependencias = new Informe_dependencias();
        $expediente = Expediente::find($id);
        $catastro = Catastro::all();
        $detalleHabilitaciones = Detalle_habilitacion::all();
        $detalleInmuebles = Detalle_inmueble::all();
        $tiposInmuebles = Tipo_inmueble::all();
        $estadosBaja = Estado_baja::all();
        $tiposEstados = Tipo_estado::all();
        $tiposhabilitaciones = Tipo_habilitacion::all();
        $informesDependencias = Informe_dependencias::orderBy('id', 'asc')->where('expediente_id', $expediente->id)->paginate(10);


        // $contribuyentes = Contribuyente::orderBy('apellido', 'asc')
        // ->where('dni', 'LIKE', '%' . $buscar . '%')
        // // ->orWhere('apellido', 'LIKE', '%' . $buscar . '%')
        // ->paginate(200);


        $informesDependencias = Informe_dependencias::orderBy('id', 'asc')->where('expediente_id', $expediente->id)->paginate(200);

        // if($informesDependencias.)
        // $secretariaGobierno =

        return view('expediente.mostrar', ['expediente'=>$expediente,
                                        'catastro'=>$catastro,
                                        'detalleHabilitaciones'=>$detalleHabilitaciones,
                                        'detalleInmuebles'=>$detalleInmuebles,
                                        'estadosBaja' =>$estadosBaja,
                                        'tiposEstados' => $tiposEstados,
                                        'tiposhabilitaciones' => $tiposhabilitaciones,
                                        'tiposInmuebles' => $tiposInmuebles,
                                        'informesDependencias' => $informesDependencias]);
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
        //$inmueble = Inmueble::find($request->inmueble_id);
        //$inmuebleController = new InmuebleController();
        //$inmuebleController->update($inmueble);
        // VER ESTO
        //SE CREA EL INMUEBLE
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



        // SE CREA DETALLE INMUEBLE
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



        // SE CREA CATASTRO
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
                $catastro->pdf_informe = $archivo->getClientOriginalName();
            }
            // else {
            //     $catastro->pdf_informe = $request->pdf_informe;
            // }
            if($catastro->save()){
                $log3 = new LogsCatastroController();
                $log3->store($catastro, 'u');
            }
        }
        else {
            if($request->circunscripcion) {
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

                if($catastro->save()){
                    $log3 = new LogsCatastroController();
                    $log3->store($catastro, 'c');
                }
            }
        }



        // SE CREA DETALLE DE HABILITACION
        $detalleHabilitacion = Detalle_habilitacion::find($request->detalle_habilitacion);
        if($request->tipo_habilitacion_id != "-- Seleccione --")
            $detalleHabilitacion->tipo_habilitacion_id = $request->tipo_habilitacion_id;
        $detalleHabilitacion->tipo_estado_id = $request->estado_habilitacion_id;
        $detalleHabilitacion->fecha_vencimiento = $request->fecha_vencimiento;
        $detalleHabilitacion->fecha_primer_habilitacion = $request->fecha_primer_habilitacion;
        if($request->hasFile('certificado_nuevo')) {
            $archivo2 = $request->file('certificado_nuevo');
            $archivo2->move(public_path().'/archivos/', $archivo2->getClientOriginalName());
            $detalleHabilitacion->pdf_certificado_habilitacion = $archivo2->getClientOriginalName();
        }
        else {
            if($request->certificado_habilitacion)
                $detalleHabilitacion->pdf_certificado_habilitacion = $request->certificado_habilitacion;
        }
        if($detalleHabilitacion->save()){
            $log4 = new LogsDetalleHabilitacionController();
            $log4->store($detalleHabilitacion, 'u');
        }


        // SE CREA EL EXPEDIENTE
        $expediente = Expediente::find($request->expediente_id);
        $expediente->nro_expediente = $request->nro_expediente;
        $expediente->nro_comercio = $request->nro_comercio;
        $expediente->actividad_ppal = $request->actividad_ppal;
        $expediente->anexo = $request->anexo;
        $expediente->detalle_inmueble_id = $detalleInmueble->id;
        if($request->hasFile('pdf_solicitud_nueva')) {                    //hecho pdf_informe
            $archivo1 = $request->file('pdf_solicitud_nueva');
            $archivo1->move(public_path().'/archivos/', $archivo1->getClientOriginalName());
            $expediente->pdf_solicitud = $archivo1->getClientOriginalName();
        }
        // else {
        //     $expediente->pdf_solicitud = $request->pdf_solicitud;
        // }
        $expediente->bienes_de_uso = $request->bienes_de_uso;
        $expediente->observaciones_grales = $request->observaciones_grales;
        if(isset($catastro->id))
         {
            $expediente->catastro_id = $catastro->id;
        }

        $expediente->detalle_habilitacion_id = $detalleHabilitacion->id;

        // FALTA ESTO
        $expediente->estado_baja_id = $request->estado_baja_id;



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
                    $infomeDependencias->pdf_informe = $archivo5->getClientOriginalName();
                }
                if($request->hasFile('pdf_secretaria_gobierno_nuevo')) {
                    $archivo5 = $request->file('pdf_secretaria_gobierno_nuevo');
                    $archivo5->move(public_path().'/archivos/', $archivo5->getClientOriginalName());
                    $infomeDependencias->pdf_informe = $archivo5->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log5 = new LogsInformeDependenciaController();
                    $log5->store($infomeDependencias, 'u');
                }
            }
            // else {
            //     if($request->secretaria_gobierno || $request->fecha_secretaria_gobierno || $request->hasFile('pdf_secretaria_gobierno')) {
            //         $infomeDependencias = new Informe_dependencias;
            //         $infomeDependencias->expediente_id = $expediente->id;
            //         $infomeDependencias->tipo_dependencia_id = 1;
            //         $infomeDependencias->observaciones = $request->secretaria_gobierno;
            //         if($request->fecha_secretaria_gobierno)
            //             $infomeDependencias->fecha_informe = $request->fecha_secretaria_gobierno;
            //         if($request->hasFile('pdf_secretaria_gobierno')) {
            //             $archivo5 = $request->file('pdf_secretaria_gobierno');
            //             $archivo5->move(public_path().'/archivos/', $archivo5->getClientOriginalName());
            //             $infomeDependencias->pdf_informe = $archivo5->getClientOriginalName();
            //         }
            //         if($infomeDependencias->save()){
            //             $log5 = new LogsInformeDependenciaController();
            //             $log5->store($infomeDependencias, 'c');
            //         }
            //     }
            // }

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
                    $infomeDependencias->pdf_informe = $archivo6->getClientOriginalName();
                }
                if($request->hasFile('pdf_obras_particulares_nuevo')) {
                    $archivo6 = $request->file('pdf_obras_particulares_nuevo');
                    $archivo6->move(public_path().'/archivos/', $archivo6->getClientOriginalName());
                    $infomeDependencias->pdf_informe = $archivo6->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log6 = new LogsInformeDependenciaController();
                    $log6->store($infomeDependencias, 'u');
                }
            }
            // else {
            //     if($request->obras_particulares || $request->fecha_obras_particulares || $request->hasFile('pdf_obras_particulares')) {

            //         $infomeDependencias = new Informe_dependencias;
            //         $infomeDependencias->expediente_id = $expediente->id;
            //         $infomeDependencias->tipo_dependencia_id = 3;
            //         $infomeDependencias->observaciones = $request->obras_particulares;
            //         if($request->fecha_obras_particulares)
            //             $infomeDependencias->fecha_informe = $request->fecha_obras_particulares;
            //         if($request->hasFile('pdf_obras_particulares')) {
            //             $archivo6 = $request->file('pdf_obras_particulares');
            //             $archivo6->move(public_path().'/archivos/', $archivo6->getClientOriginalName());
            //             $infomeDependencias->pdf_informe = $archivo6->getClientOriginalName();
            //         }
            //         if($infomeDependencias->save()){
            //             $log6 = new LogsInformeDependenciaController();
            //             $log6->store($infomeDependencias, 'c');
            //         }
            //     }
            // }

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
                    $infomeDependencias->pdf_informe = $archivo7->getClientOriginalName();
                }
                if($request->hasFile('pdf_alumbrado_nuevo')) {
                    $archivo7 = $request->file('pdf_alumbrado_nuevo');
                    $archivo7->move(public_path().'/archivos/', $archivo7->getClientOriginalName());
                    $infomeDependencias->pdf_informe = $archivo7->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log7 = new LogsInformeDependenciaController();
                    $log7->store($infomeDependencias, 'u');
                }
            }
            // else {
            //     if($request->alumbrado || $request->fecha_alumbrado || $request->hasFile('pdf_alumbrado')) {

            //         $infomeDependencias = new Informe_dependencias;
            //         $infomeDependencias->expediente_id = $expediente->id;
            //         $infomeDependencias->tipo_dependencia_id = 4;
            //         $infomeDependencias->observaciones = $request->alumbrado;
            //         if($request->fecha_alumbrado)
            //             $infomeDependencias->fecha_informe = $request->fecha_alumbrado;
            //         if($request->hasFile('pdf_alumbrado')) {
            //             $archivo7 = $request->file('pdf_alumbrado');
            //             $archivo7->move(public_path().'/archivos/', $archivo7->getClientOriginalName());
            //             $infomeDependencias->pdf_informe = $archivo7->getClientOriginalName();
            //         }
            //         if($infomeDependencias->save()){
            //             $log7 = new LogsInformeDependenciaController();
            //             $log7->store($infomeDependencias, 'c');
            //         }
            //     }
            // }

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
                    $infomeDependencias->pdf_informe = $archivo8->getClientOriginalName();
                }
                if($request->hasFile('pdf_bromatologia_nuevo')) {
                    $archivo8 = $request->file('pdf_bromatologia_nuevo');
                    $archivo8->move(public_path().'/archivos/', $archivo8->getClientOriginalName());
                    $infomeDependencias->pdf_informe = $archivo8->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log8 = new LogsInformeDependenciaController();
                    $log8->store($infomeDependencias, 'u');
                }
            }
            // else {
            //     if($request->bromatologia || $request->fecha_bromatologia || $request->hasFile('pdf_bromatologia')) {

            //         $infomeDependencias = new Informe_dependencias;
            //         $infomeDependencias->expediente_id = $expediente->id;
            //         $infomeDependencias->tipo_dependencia_id = 5;
            //         $infomeDependencias->observaciones = $request->bromatologia;
            //         if($request->fecha_bromatologia)
            //             $infomeDependencias->fecha_informe = $request->fecha_bromatologia;
            //         if($request->hasFile('pdf_bromatologia')) {
            //             $archivo8 = $request->file('pdf_bromatologia');
            //             $archivo8->move(public_path().'/archivos/', $archivo8->getClientOriginalName());
            //             $infomeDependencias->pdf_informe = $archivo8->getClientOriginalName();
            //         }
            //         if($infomeDependencias->save()){
            //             $log8 = new LogsInformeDependenciaController();
            //             $log8->store($infomeDependencias, 'c');
            //         }
            //     }
            // }

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
                    $infomeDependencias->pdf_informe = $archivo9->getClientOriginalName();
                }
                if($request->hasFile('pdf_inspeccion_nuevo')) {
                    $archivo9 = $request->file('pdf_inspeccion_nuevo');
                    $archivo9->move(public_path().'/archivos/', $archivo9->getClientOriginalName());
                    $infomeDependencias->pdf_informe = $archivo9->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log9 = new LogsInformeDependenciaController();
                    $log9->store($infomeDependencias, 'u');
                }
            }
            // else {
            //     if($request->inspeccion || $request->fecha_inspeccion || $request->hasFile('pdf_inspeccion')) {

            //         $infomeDependencias = new Informe_dependencias;
            //         $infomeDependencias->expediente_id = $expediente->id;
            //         $infomeDependencias->tipo_dependencia_id = 6;
            //         $infomeDependencias->observaciones = $request->inspeccion;
            //         if($request->fecha_inspeccion)
            //             $infomeDependencias->fecha_informe = $request->fecha_inspeccion;
            //         if($request->hasFile('pdf_inspeccion')) {
            //             $archivo9 = $request->file('pdf_inspeccion');
            //             $archivo9->move(public_path().'/archivos/', $archivo9->getClientOriginalName());
            //             $infomeDependencias->pdf_informe = $archivo9->getClientOriginalName();
            //         }
            //         if($infomeDependencias->save()){
            //             $log9 = new LogsInformeDependenciaController();
            //             $log9->store($infomeDependencias, 'c');
            //         }
            //     }
            // }

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
                    $infomeDependencias->pdf_informe = $archivo10->getClientOriginalName();
                }
                if($request->hasFile('pdf_juzgado_nuevo')) {
                    $archivo10 = $request->file('pdf_juzgado_nuevo');
                    $archivo10->move(public_path().'/archivos/', $archivo10->getClientOriginalName());
                    $infomeDependencias->pdf_informe = $archivo10->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log10 = new LogsInformeDependenciaController();
                    $log10->store($infomeDependencias, 'u');
                }
            }
            // else {
            //     if($request->juzgado || $request->fecha_juzgado || $request->hasFile('pdf_juzgado')) {

            //         $infomeDependencias = new Informe_dependencias;
            //         $infomeDependencias->expediente_id = $expediente->id;
            //         $infomeDependencias->tipo_dependencia_id = 7;
            //         $infomeDependencias->observaciones = $request->juzgado;
            //         if($request->fecha_juzgado)
            //             $infomeDependencias->fecha_informe = $request->fecha_juzgado;
            //         if($request->hasFile('pdf_juzgado')) {
            //             $archivo10 = $request->file('pdf_juzgado');
            //             $archivo10->move(public_path().'/archivos/', $archivo10->getClientOriginalName());
            //             $infomeDependencias->pdf_informe = $archivo10->getClientOriginalName();
            //         }
            //         if($infomeDependencias->save()){
            //             $log10 = new LogsInformeDependenciaController();
            //             $log10->store($infomeDependencias, 'c');
            //         }
            //     }
            // }

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
                    $infomeDependencias->pdf_informe = $archivo11->getClientOriginalName();
                }
                if($request->hasFile('pdf_bomberos_nuevo')) {
                    $archivo11 = $request->file('pdf_bomberos_nuevo');
                    $archivo11->move(public_path().'/archivos/', $archivo11->getClientOriginalName());
                    $infomeDependencias->pdf_informe = $archivo11->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log11 = new LogsInformeDependenciaController();
                    $log11->store($infomeDependencias, 'u');
                }
            }
            // else {
            //     if($request->bomberos || $request->fecha_bomberos || $request->hasFile('pdf_bomberos')) {

            //         $infomeDependencias = new Informe_dependencias;
            //         $infomeDependencias->expediente_id = $expediente->id;
            //         $infomeDependencias->tipo_dependencia_id = 8;
            //         $infomeDependencias->observaciones = $request->bomberos;
            //         if($request->fecha_bomberos)
            //             $infomeDependencias->fecha_informe = $request->fecha_bomberos;
            //         if($request->hasFile('pdf_bomberos')) {
            //             $archivo11 = $request->file('pdf_bomberos');
            //             $archivo11->move(public_path().'/archivos/', $archivo11->getClientOriginalName());
            //             $infomeDependencias->pdf_informe = $archivo11->getClientOriginalName();
            //         }
            //         if($infomeDependencias->save()){
            //             $log11 = new LogsInformeDependenciaController();
            //             $log11->store($infomeDependencias, 'c');
            //         }
            //     }
            // }

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
                    $infomeDependencias->pdf_informe = $archivo12->getClientOriginalName();
                }
                if($request->hasFile('pdf_inspeccion_general_nuevo')) {
                    $archivo12 = $request->file('pdf_inspeccion_general_nuevo');
                    $archivo12->move(public_path().'/archivos/', $archivo12->getClientOriginalName());
                    $infomeDependencias->pdf_informe = $archivo12->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log12 = new LogsInformeDependenciaController();
                    $log12->store($infomeDependencias, 'u');
                }
            }
            // else {
            //     if($request->inspeccion_general || $request->fecha_inspeccion_general || $request->hasFile('pdf_inspeccion_general')) {

            //         $infomeDependencias = new Informe_dependencias;
            //         $infomeDependencias->expediente_id = $expediente->id;
            //         $infomeDependencias->tipo_dependencia_id = 9;
            //         $infomeDependencias->observaciones = $request->inspeccion_general;
            //         if($request->fecha_inspeccion_general)
            //             $infomeDependencias->fecha_informe = $request->fecha_inspeccion_general;
            //         if($request->hasFile('pdf_inspeccion_general')) {
            //             $archivo12 = $request->file('pdf_inspeccion_general');
            //             $archivo12->move(public_path().'/archivos/', $archivo12->getClientOriginalName());
            //             $infomeDependencias->pdf_informe = $archivo12->getClientOriginalName();
            //         }
            //         if($infomeDependencias->save()){
            //             $log12 = new LogsInformeDependenciaController();
            //             $log12->store($infomeDependencias, 'c');
            //         }
            //     }
            // }

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
                    $infomeDependencias->pdf_informe = $archivo13->getClientOriginalName();
                }
                if($request->hasFile('pdf_deudores_alimentarios_nuevo')) {
                    $archivo13 = $request->file('pdf_deudores_alimentarios_nuevo');
                    $archivo13->move(public_path().'/archivos/', $archivo13->getClientOriginalName());
                    $infomeDependencias->pdf_informe = $archivo13->getClientOriginalName();
                }
                if($infomeDependencias->save()){
                    $log13 = new LogsInformeDependenciaController();
                    $log13->store($infomeDependencias, 'u');
                }
            }
            // else {
            //     if($request->deudores_alimentarios || $request->fecha_deudores_alimentarios || $request->hasFile('pdf_deudores_alimentarios')) {

            //         $infomeDependencias = new Informe_dependencias;
            //         $infomeDependencias->expediente_id = $expediente->id;
            //         $infomeDependencias->tipo_dependencia_id = 10;
            //         $infomeDependencias->observaciones = $request->deudores_alimentarios;
            //         if($request->fecha_deudores_alimentarios)
            //             $infomeDependencias->fecha_informe = $request->fecha_deudores_alimentarios;
            //         if($request->hasFile('pdf_deudores_alimentarios')) {
            //             $archivo13 = $request->file('pdf_deudores_alimentarios');
            //             $archivo13->move(public_path().'/archivos/', $archivo13->getClientOriginalName());
            //             $infomeDependencias->pdf_informe = $archivo13->getClientOriginalName();
            //         }
            //         if($infomeDependencias->save()){
            //             $log13 = new LogsInformeDependenciaController();
            //             $log13->store($infomeDependencias, 'c');
            //         }
            //     }
            // }



            return redirect()->route('expedientes');
        }
        return back()->with('fail','No se pudo crear el expediente');
    }

    // public function existe($array, $number) {
    //     if($array.contains($number))
    //         return true;
    //     return false;
    // }

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
