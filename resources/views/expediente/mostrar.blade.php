<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Expediente</title>
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        @isset($expediente->nro_expediente)
                            <h2 class="mb-0">Expediente: {{$expediente->nro_expediente}}</h2>
                        @endisset
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('expedientes-actualizar')}}" enctype="multipart/form-data">
                            @csrf
                            @isset($expediente->id)
                                <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
                            @endisset
                            
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nùmero de expediente</label>
                                <input value="{{$expediente->nro_expediente}}" type="text" name="nro_expediente" class="form-control" id="basic-default-nombreCompleto"/>
                                <input type="submit" value="Ver PDF">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nùmero de comercio</label>
                                <input value="{{$expediente->nro_comercio}}" type="text" name="nro_comercio" class="form-control" id="basic-default-nombreCompleto" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Actividad principal</label>
                                <input value="{{$expediente->actividad_ppal}}" type="text" name="actividad_ppal" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Anexo</label>
                                <input value="{{$expediente->anexo}}" type="text" name="anexo" class="form-control" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- DATOS DEL INMUEBLE --}}
                            <div>
                                <input type="hidden" name="inmueble_id" value="{{$expediente->detalleInmueble->inmueble->id}}">
                                <label class="form-label" for="basic-default-fullname">Domicilio inmueble/s</label>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Calle:</label>
                                    <input value="{{$expediente->detalleInmueble->inmueble->calle}}" required type="text" name="calle" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Nº:</label>
                                    <input value="{{$expediente->detalleInmueble->inmueble->numero}}" required type="text" name="numero" class="form-control" id="basic-default-nombreCompleto" />
                                </div>

                                <input type="hidden" name="detalle_inmueble_id" value="{{$expediente->detalleInmueble->id}}">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Tipo de inmueble</label>
                                    <select required name="tipo_inmueble_id" class="form-control" id="tipo_inmueble">
                                        <option>-- Seleccione --</option>
                                        @foreach($tiposInmuebles as $tipo)
                                            {{-- <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option> --}}
                                            <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleInmueble->tipoInmueble->id) selected @endif>{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="fecha_alquiler" >
                                    <label class="form-label" for="basic-default-fullname">Fecha vencimiento alquiler</label>
                                    <input required value="{{$expediente->detalleInmueble->fecha_venc_alquiler}}" type="date" name="fecha_vencimiento_alquiler" class="form-control" id="fechaVencimiento" />
                                </div>
                                {{-- <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Tipo de inmueble</label>
                                    <select required name="tipo_inmueble_id" class="form-control" id="basic-default-nombreCompleto" >
                                        <option>-- Seleccione --</option>
                                        @foreach($tiposInmuebles as $tipo)
                                            <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleInmueble->tipoInmueble->id) selected @endif>{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Fecha vencimiento alquiler</label>
                                    <input required value="{{$expediente->detalleInmueble->fecha_venc_alquiler}}" type="date" name="fecha_vencimiento_alquiler" class="form-control" id="basic-default-nombreCompleto" />
                                </div> --}}
                            </div>
                            {{-- BOTON PARA CARGAR EL PDF DE LA SOLICITUD --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">Solicitud:</label>
                                @if ($expediente->pdf_solicitud)
                                    <p name="pdf_solicitud">PDF solicitud cargado: {{$expediente->pdf_solicitud}}</p>
                                    {{-- <input value="{{$expediente->pdf_solicitud}}" name="pdf_solicitud" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" /> --}}
                                @endif
                                <input type="file" name="pdf_solicitud_nueva" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- BIENES DE USO Y OBSERVACIONES GENERALES --}}
                            <div>
                                <input value="{{$expediente->bienes_de_uso}}" placeholder="detalle de bienes de uso" type="text" name="bienes_de_uso" class="form-control" id="basic-default-nombreCompleto" />
                            </div>
                            <div>
                                <input value="{{$expediente->observaciones_grales}}" placeholder="OBSERVACIONES GENERALES" type="text" name="observaciones_grales" class="form-control" id="basic-default-nombreCompleto" />
                            </div>


                            @foreach ($informesDependencias as $item)
                            {{ $item }}
                            @endforeach
                            <div>
                                @forelse ($informesDependencias as $item)
                                    
                                    {{-- SECRETARIA DE GOBIERNO --}}
                                    <label class="form-label" for="basic-default-fullname">{{$item->tipoDependencia->nombre}}</label>
                                    @if ($item->tipo_dependencia_id == 1)
                                        <input type="hidden" name="secretaria_id" value="{{ $item->id }}">
                                        <div>
                                            <input value="{{ $item->observaciones }}" type="text" name="secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" />
                                            @if ($item->pdf_informe)
                                                <p name="pdf_secretaria_gobierno">PDF cargado: {{ $item->pdf_informe }}</p>
                                            @endif
                                            <input type="file" name="pdf_secretaria_gobierno_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>
                                    @endif

                                    {{-- OBRAS PARTICULARES --}}
                                    @if ($item->tipo_dependencia_id == 3)
                                        <input type="hidden" name="obras_id" value="{{ $item->id }}">
                                        <div>
                                            <input value="{{ $item->observaciones }}" type="text" name="obras_particulares" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_obras_particulares" class="form-control" id="basic-default-nombreCompleto" />
                                            @if ($item->pdf_informe)
                                                <p name="pdf_obras_particulares">PDF cargado: {{ $item->pdf_informe }}</p>
                                            @endif
                                            <input type="file" name="pdf_obras_particulares_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>
                                    @endif

                                    {{-- TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA --}}
                                    @if ($item->expediente_id == $expediente->id and $item->tipo_dependencia_id == 4)
                                        <input type="hidden" name="alumbrado_id" value="{{ $item->id }}"> 
                                        <div>
                                            <input value="{{ $item->observaciones }}" type="text" name="alumbrado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_alumbrado" class="form-control" id="basic-default-nombreCompleto" />
                                            @if ($item->pdf_informe)
                                                <p name="pdf_alumbrado">PDF cargado: {{ $item->pdf_informe }}</p>
                                            @endif
                                            <input type="file" name="pdf_alumbrado_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>
                                    @endif
                                    
                                    {{-- BROMATOLOGÌA --}}
                                    @if ($item->tipo_dependencia_id == 5)
                                        <input type="hidden" name="bromatologia_id" value="{{ $item->id }}"> 
                                        <div>
                                            <input value="{{ $item->observaciones }}" type="text" name="bromatologia" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_bromatologia" class="form-control" id="basic-default-nombreCompleto" />
                                            @if ($item->pdf_informe)
                                                <p name="pdf_bromatologia">PDF cargado: {{ $item->pdf_informe }}</p>
                                            @endif
                                            <input type="file" name="pdf_bromatologia_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>
                                    @endif
                                    
                                    {{-- TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL --}}
                                    @if ($item->tipo_dependencia_id == 6)
                                        <input type="hidden" name="inspeccion_id" value="{{ $item->id }}"> 
                                        <div>
                                            <input value="{{ $item->observaciones }}" type="text" name="inspeccion" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_inspeccion" class="form-control" id="basic-default-nombreCompleto" />
                                            @if ($item->pdf_informe)
                                                <p name="pdf_inspeccion">PDF cargado: {{ $item->pdf_informe }}</p>
                                            @endif
                                            <input type="file" name="pdf_inspeccion_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>
                                    @endif
                                    
                                    {{-- JUZGADO DE FALTAS --}}
                                    @if ($item->tipo_dependencia_id == 7)
                                        <input type="hidden" name="juzgado_id" value="{{ $item->id }}"> 
                                        <div>
                                            <input value="{{ $item->observaciones }}" type="text" name="juzgado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_juzgado" class="form-control" id="basic-default-nombreCompleto" />
                                            @if ($item->pdf_informe)
                                                <p name="pdf_juzgado">PDF cargado: {{ $item->pdf_informe }}</p>
                                            @endif
                                            <input type="file" name="pdf_juzgado_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>
                                    @endif

                                    {{-- BOMBEROS DE POLICÌA DE BUENOS AIRES --}}
                                    @if ($item->tipo_dependencia_id == 8)
                                        <input type="hidden" name="bomberos_id" value="{{ $item->id }}"> 
                                        <div>
                                            <input value="{{ $item->observaciones }}" type="text" name="bomberos" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_bomberos" class="form-control" id="basic-default-nombreCompleto" />
                                            @if ($item->pdf_informe)
                                                <p name="pdf_bomberos">PDF cargado: {{ $item->pdf_informe }}</p>
                                            @endif
                                            <input type="file" name="pdf_bomberos_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>
                                    @endif

                                    {{-- INSPECCIÒN GENERAL --}}
                                    @if ($item->tipo_dependencia_id == 9)
                                        <input type="hidden" name="inspeccion_general_id" value="{{ $item->id }}"> 
                                        <div>
                                            <input value="{{ $item->observaciones }}" type="text" name="inspeccion_general" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_inspeccion_general" class="form-control" id="basic-default-nombreCompleto" />
                                            @if ($item->pdf_informe)
                                                <p name="pdf_inspeccion_general">PDF cargado: {{ $item->pdf_informe }}</p>
                                            @endif
                                            <input type="file" name="pdf_inspeccion_general_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>
                                    @endif

                                    {{-- REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS --}}
                                    @if ($item->tipo_dependencia_id == 10)
                                        <input type="hidden" name="deudores_alimentarios_id" value="{{ $item->id }}"> 
                                        <div>
                                            <input value="{{ $item->observaciones }}" type="text" name="deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" />
                                            @if ($item->pdf_informe)
                                                <p name="pdf_deudores_alimentarios">PDF cargado: {{ $item->pdf_informe }}</p>
                                            @endif
                                            <input type="file" name="pdf_deudores_alimentarios_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>
                                    @endif

                                    
                                    {{-- @if ($item->expediente_id == $expediente->id and $item->tipo_dependencia_id == 1)
                                        
                                        <input type="hidden" name="secretaria_id" value="{{ $item->id }}"> 
                                        <div>
                                            <label class="form-label" for="basic-default-fullname">SECRETARÌA DE GOBIERNO</label>
                                            <input value="{{ $item->observaciones }}" type="text" name="secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" />
                                            @if ($item->pdf_informe)
                                                <p name="pdf_secretaria_gobierno">Certificado de secretarìa de gobierno: {{ $item->pdf_informe }}</p>
                                            @endif
                                            <input type="file" name="pdf_secretaria_gobierno_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>
                                    @endif --}}
                                        {{-- <div>
                                            <label class="form-label" for="basic-default-fullname">SECRETARÌA DE GOBIERNO</label>
                                            <input type="text" name="secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input type="date" name="fecha_secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" />
                                            <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                            <input type="file" name="pdf_secretaria_gobierno" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>
                                    @endif --}}
                                    
                                    {{-- OBRAS PARTICULARES --}}
                                    {{-- @if ($item->expediente_id == $expediente->id and $item->tipo_dependencia_id == 3)
                                        <input type="hidden" name="obras_id" value="{{ $item->id }}">
                                        <div>
                                            <label class="form-label" for="basic-default-fullname">OBRAS PARTICULARES</label>
                                            <input value="{{ $item->observaciones }}" type="text" name="obras_particulares" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_obras_particulares" class="form-control" id="basic-default-nombreCompleto" />
                                            @if ($item->pdf_informe)
                                                <p name="pdf_obras_particulares">Certificado de obras particulares: {{ $item->pdf_informe }}</p>
                                            @endif
                                            <input type="file" name="pdf_obras_particulares_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />

                                            
                                            {{-- <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                            <input value="{{ $item->pdf_informe }}" type="file" name="pdf_obras_particulares" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                        </div>  --}}
                                    {{-- @else
                                        <div>
                                                <label class="form-label" for="basic-default-fullname">OBRAS PARTICULARES</label>
                                                <input type="text" name="obras_particulares" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                                <input type="date" name="fecha_obras_particulares" class="form-control" id="basic-default-nombreCompleto" />
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                <input type="file" name="pdf_obras_particulares" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            </div>
                                    @endif  --}}
                                    {{-- TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA --}}
                                    {{-- @if ($item->expediente_id == $expediente->id and $item->tipo_dependencia_id == 4)
                                        <input type="hidden" name="alumbrado_id" value="{{ $item->id }}"> 
                                        <div>
                                            <label class="form-label" for="basic-default-fullname">TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA. TASA POR CONSERVACION DE LA RED VIAL</label>
                                            <input value="{{ $item->observaciones }}" type="text" name="alumbrado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_alumbrado" class="form-control" id="basic-default-nombreCompleto" />
                                            <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                            <input value="{{ $item->pdf_informe }}" type="file" name="pdf_alumbrado" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" /> 
                                        </div> --}}
                                    {{-- @else
                                            <div>
                                                <label class="form-label" for="basic-default-fullname">TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA. TASA POR CONSERVACION DE LA RED VIAL</label>
                                                <input type="text" name="alumbrado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                                <input type="date" name="fecha_alumbrado" class="form-control" id="basic-default-nombreCompleto" />
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                <input type="file" name="pdf_alumbrado" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            </div> --}}
                                    {{-- @endif --}}
                                    {{-- BROMATOLOGÌA --}}
                                    {{-- @if ($item->expediente_id == $expediente->id and $item->tipo_dependencia_id == 5)
                                        <input type="hidden" name="bromatologia_id" value="{{ $item->id }}"> 
                                        <div>
                                            <label class="form-label" for="basic-default-fullname">BROMATOLOGÌA</label>
                                            <input value="{{ $item->observaciones }}" type="text" name="bromatologia" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_bromatologia" class="form-control" id="basic-default-nombreCompleto" />
                                            <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                            <input value="{{ $item->pdf_informe }}" type="file" name="pdf_bromatologia" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" /> 
                                        </div> --}}
                                    {{-- @else
                                            <div>
                                                <label class="form-label" for="basic-default-fullname">BROMATOLOGÌA</label>
                                                <input type="text" name="bromatologia" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                                <input type="date" name="fecha_bromatologia" class="form-control" id="basic-default-nombreCompleto" />
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                <input type="file" name="pdf_bromatologia" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            </div> --}}
                                    {{-- @endif --}}
                                    {{-- TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL --}}
                                    {{-- @if ($item->expediente_id == $expediente->id and $item->tipo_dependencia_id == 6)
                                        <input type="hidden" name="inspeccion_id" value="{{ $item->id }}"> 
                                        <div>
                                            <label class="form-label" for="basic-default-fullname">TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL</label>
                                            <input value="{{ $item->observaciones }}" type="text" name="inspeccion" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_inspeccion" class="form-control" id="basic-default-nombreCompleto" />
                                            <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                            <input value="{{ $item->pdf_informe }}" type="file" name="pdf_inspeccion" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" /> 
                                        </div> --}}
                                    {{-- @else
                                            <div>
                                                <label class="form-label" for="basic-default-fullname">TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL</label>
                                                <input type="text" name="inspeccion" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                                <input type="date" name="fecha_inspeccion" class="form-control" id="basic-default-nombreCompleto" />
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                <input type="file" name="pdf_inspeccion" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            </div> --}}
                                    {{-- @endif --}}
                                    {{-- JUZGADO DE FALTAS --}}
                                    {{-- @if ($item->expediente_id == $expediente->id and $item->tipo_dependencia_id == 7)
                                        <input type="hidden" name="juzgado_id" value="{{ $item->id }}"> 
                                        <div>
                                            <label class="form-label" for="basic-default-fullname">JUZGADO DE FALTAS</label>
                                            <input value="{{ $item->observaciones }}" type="text" name="juzgado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_juzgado" class="form-control" id="basic-default-nombreCompleto" />
                                            <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                            <input value="{{ $item->pdf_informe }}" type="file" name="pdf_juzgado" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" /> 
                                        </div> --}}
                                    {{-- @else
                                            <div>
                                                <label class="form-label" for="basic-default-fullname">JUZGADO DE FALTAS</label>
                                                <input type="text" name="juzgado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                                <input type="date" name="fecha_juzgado" class="form-control" id="basic-default-nombreCompleto" />
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                <input type="file" name="pdf_juzgado" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            </div> --}}
                                    {{-- @endif --}}
                                    {{-- BOMBEROS DE POLICÌA DE BUENOS AIRES --}}
                                    {{-- @if ($item->expediente_id == $expediente->id and $item->tipo_dependencia_id == 8)
                                        <input type="hidden" name="bomberos_id" value="{{ $item->id }}"> 
                                        <div>
                                            <label class="form-label" for="basic-default-fullname">BOMBEROS DE POLICÌA DE BUENOS AIRES</label>
                                            <input value="{{ $item->observaciones }}" type="text" name="bomberos" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_bomberos" class="form-control" id="basic-default-nombreCompleto" />
                                            <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                            <input value="{{ $item->pdf_informe }}" type="file" name="pdf_bomberos" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" /> 
                                        </div> --}}
                                    {{-- @else
                                            <div>
                                                <label class="form-label" for="basic-default-fullname">BOMBEROS DE POLICÌA DE BUENOS AIRES</label>
                                                <input type="text" name="bomberos" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                                <input type="date" name="fecha_bomberos" class="form-control" id="basic-default-nombreCompleto" />
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                <input type="file" name="pdf_bomberos" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            </div> --}}
                                    {{-- @endif --}}
                                    {{-- INSPECCIÒN GENERAL --}}
                                    {{-- @if ($item->expediente_id == $expediente->id and $item->tipo_dependencia_id == 9)
                                        <input type="hidden" name="inspeccion_general_id" value="{{ $item->id }}"> 
                                        <div>
                                            <label class="form-label" for="basic-default-fullname">INSPECCIÒN GENERAL</label>
                                            <input value="{{ $item->observaciones }}" type="text" name="inspeccion_general" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_inspeccion_general" class="form-control" id="basic-default-nombreCompleto" />
                                            <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                            <input value="{{ $item->pdf_informe }}" type="file" name="pdf_inspeccion_general" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" /> 
                                        </div> --}}
                                    {{-- @else
                                            <div>
                                                <label class="form-label" for="basic-default-fullname">INSPECCIÒN GENERAL</label>
                                                <input type="text" name="inspeccion_general" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                                <input type="date" name="fecha_inspeccion_general" class="form-control" id="basic-default-nombreCompleto" />
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                <input type="file" name="pdf_inspeccion_general" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            </div> --}}
                                    {{-- @endif --}}
                                    {{-- REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS --}}
                                    {{-- @if ($item->expediente_id == $expediente->id and $item->tipo_dependencia_id == 10)
                                        <input type="hidden" name="deudores_alimentarios_id" value="{{ $item->id }}"> 
                                        <div>
                                            <label class="form-label" for="basic-default-fullname">REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS</label>
                                            <input value="{{ $item->observaciones }}" type="text" name="deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                            <label class="form-label" for="basic-default-fullname">Rauch</label>
                                            <input value="{{ $item->fecha_informe }}" type="date" name="fecha_deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" />
                                            <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                            <input value="{{ $item->pdf_informe }}" type="file" name="pdf_deudores_alimentarios" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" /> 
                                        </div> --}}
                                    {{-- @else
                                            <div>
                                                <label class="form-label" for="basic-default-fullname">REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS</label>
                                                <input type="text" name="deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                                <input type="date" name="fecha_deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" />
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                <input type="file" name="pdf_deudores_alimentarios" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            </div> --}}
                                    {{-- @endif --}}
                                @empty
                                    {{-- SECRETARIA DE GOBIERNO --}}
                                    {{-- <div>
                                        <label class="form-label" for="basic-default-fullname">SECRETARÌA DE GOBIERNO</label>
                                        <input type="text" name="secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                        <label class="form-label" for="basic-default-fullname">Rauch</label>
                                        <input type="date" name="fecha_secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        <input type="file" name="pdf_secretaria_gobierno" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
    
                                    </div> --}}
                                    {{-- OBRAS PARTICULARES --}}
                                    {{-- <div>
                                        <label class="form-label" for="basic-default-fullname">OBRAS PARTICULARES</label>
                                        <input type="text" name="obras_particulares" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                        <label class="form-label" for="basic-default-fullname">Rauch</label>
                                        <input type="date" name="fecha_obras_particulares" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        <input type="file" name="pdf_obras_particulares" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                    </div> --}}
                                    {{-- TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA --}}
                                    {{-- <div>
                                        <label class="form-label" for="basic-default-fullname">TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA. TASA POR CONSERVACION DE LA RED VIAL</label>
                                        <input type="text" name="alumbrado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                        <label class="form-label" for="basic-default-fullname">Rauch</label>
                                        <input type="date" name="fecha_alumbrado" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        <input type="file" name="pdf_alumbrado" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                    </div> --}}
                                    {{-- BROMATOLOGÌA --}}
                                    {{-- <div>
                                        <label class="form-label" for="basic-default-fullname">BROMATOLOGÌA</label>
                                        <input type="text" name="bromatologia" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                        <label class="form-label" for="basic-default-fullname">Rauch</label>
                                        <input type="date" name="fecha_bromatologia" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        <input type="file" name="pdf_bromatologia" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                    </div> --}}
                                    {{-- TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL --}}
                                    {{-- <div>
                                        <label class="form-label" for="basic-default-fullname">TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL</label>
                                        <input type="text" name="inspeccion" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                        <label class="form-label" for="basic-default-fullname">Rauch</label>
                                        <input type="date" name="fecha_inspeccion" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        <input type="file" name="pdf_inspeccion" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                    </div> --}}
                                    {{-- JUZGADO DE FALTAS --}}
                                    {{-- <div>
                                        <label class="form-label" for="basic-default-fullname">JUZGADO DE FALTAS</label>
                                        <input type="text" name="juzgado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                        <label class="form-label" for="basic-default-fullname">Rauch</label>
                                        <input type="date" name="fecha_juzgado" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        <input type="file" name="pdf_juzgado" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                    </div> --}}
                                    {{-- BOMBEROS DE POLICÌA DE BUENOS AIRES --}}
                                    {{-- <div>
                                        <label class="form-label" for="basic-default-fullname">BOMBEROS DE POLICÌA DE BUENOS AIRES</label>
                                        <input type="text" name="bomberos" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                        <label class="form-label" for="basic-default-fullname">Rauch</label>
                                        <input type="date" name="fecha_bomberos" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        <input type="file" name="pdf_bomberos" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                    </div> --}}
                                    {{-- INSPECCIÒN GENERAL --}}
                                    {{-- <div>
                                        <label class="form-label" for="basic-default-fullname">INSPECCIÒN GENERAL</label>
                                        <input type="text" name="inspeccion_general" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                        <label class="form-label" for="basic-default-fullname">Rauch</label>
                                        <input type="date" name="fecha_inspeccion_general" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        <input type="file" name="pdf_inspeccion_general" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                    </div> --}}
                                    {{-- REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS --}}
                                    {{-- <div>
                                        <label class="form-label" for="basic-default-fullname">REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS</label>
                                        <input type="text" name="deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                        <label class="form-label" for="basic-default-fullname">Rauch</label>
                                        <input type="date" name="fecha_deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        <input type="file" name="pdf_deudores_alimentarios" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                    </div> --}}
                                @endforelse
                            </div>

                            {{-- CATASTRO --}}
                            <div>
                                @if ($expediente->catastro_id != null)
                                    <input type="hidden" name="catastro_id" value="{{$expediente->catastro_id}}">
                                    <label class="form-label" for="basic-default-fullname">CATASTRO</label>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Circ</label>
                                        <input value="{{$expediente->catastro->circunscripcion}}" required type="text" name="circunscripcion" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Secc</label>
                                        <input value="{{$expediente->catastro->seccion}}" required type="text" name="seccion" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Chacra</label>
                                        <input value="{{$expediente->catastro->chacra}}" required type="text" name="chacra" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Quinta</label>
                                        <input value="{{$expediente->catastro->quinta}}" required type="text" name="quinta" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Fracciòn</label>
                                        <input value="{{$expediente->catastro->fraccion}}" required type="text" name="fraccion" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Manzana</label>
                                        <input value="{{$expediente->catastro->manzana}}" required type="text" name="manzana" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Parcela</label>
                                        <input value="{{$expediente->catastro->parcela}}" required type="text" name="parcela" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">SubPar</label>
                                        <input value="{{$expediente->catastro->sub_parcela}}" required type="text" name="sub_parcela" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Observaciones</label>
                                        <input value="{{$expediente->catastro->observacion}}" type="text" name="observaciones" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Fecha informe</label>
                                        <input value="{{$expediente->catastro->fecha_informe}}" type="date" name="fecha_informe" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        @if ($expediente->catastro->pdf_informe)
                                            <p name="pdf_informe">PDF catastro cargado: {{$expediente->catastro->pdf_informe}}</p>
                                            {{-- <input value="{{$expediente->catastro->pdf_informe}}" type="file" name="pdf_informe" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" /> --}}
                                        @endif
                                        <input type="file" name="pdf_informe_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                    </div>
                                @else
                                    <label class="form-label" for="basic-default-fullname">CATASTRO</label>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Circ</label>
                                        <input type="text" name="circunscripcion" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Secc</label>
                                        <input type="text" name="seccion" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Chacra</label>
                                        <input type="text" name="chacra" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Quinta</label>
                                        <input type="text" name="quinta" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Fracciòn</label>
                                        <input type="text" name="fraccion" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Manzana</label>
                                        <input type="text" name="manzana" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Parcela</label>
                                        <input type="text" name="parcela" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">SubPar</label>
                                        <input type="text" name="sub_parcela" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Observaciones</label>
                                        <input type="text" name="observaciones" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Fecha informe</label>
                                        <input type="date" name="fecha_informe" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        <input type="file" name="pdf_informe" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                    </div>
                                    
                                @endif
                                
                            </div>

                            {{-- HISTORIAL DE MODIFICACIONES --}}
                            {{-- <div>
                                <input required type="text" name="deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" placeholder="Historial de modificaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_deudores_alimentarios" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div> --}}

                            {{-- DETALLE HABILITACION --}}
                            <div>
                                <input type="hidden" name="detalle_habilitacion" value="{{$expediente->detalleHabilitacion->id}}">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Estado de habilitacion</label>
                                    <select required name="estado_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                                        <option>-- Seleccione --</option>
                                        @foreach($tiposEstados as $tipo)
                                            <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleHabilitacion->tipoEstado->id) selected @endif>{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label" for="basic-default-fullname">Fecha de primer habilitacion</label>
                                    <input value="{{ $expediente->detalleHabilitacion->fecha_primer_habilitacion }}" type="date" name="fecha_primer_habilitacion" class="form-control" id="basic-default-nombreCompleto" />
                                    <label class="form-label" for="basic-default-fullname">Fecha de vencimiento</label>
                                    <input value="{{ $expediente->detalleHabilitacion->fecha_vencimiento }}" type="date" name="fecha_vencimiento" class="form-control" id="basic-default-nombreCompleto" />
                                    <label class="form-label" for="basic-default-fullname">Tipo de habilitacion</label>
                                    <select name="tipo_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                                        @if($expediente->detalleHabilitacion->tipoHabilitacion)
                                            @foreach($tiposhabilitaciones as $tipo)
                                                <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleHabilitacion->tipoHabilitacion->id) selected @endif>{{$tipo->descripcion}}</option>
                                            @endforeach
                                        @else
                                            <option>-- Seleccione --</option>
                                            @foreach($tiposhabilitaciones as $tipo)
                                                <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <label class="form-label" for="basic-default-fullname">Certificado de habilitaciòn</label>
                                    @if ($expediente->detalleHabilitacion->pdf_certificado_habilitacion)
                                        <p name="certificado_habilitacion">Certificado de habilitaciòn cargado: {{$expediente->detalleHabilitacion->pdf_certificado_habilitacion}}</p>
                                    @endif
                                    <input type="file" name="certificado_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                </div>
            </div>
        </div>
    </body>
</html>
