<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Expediente</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Expediente: {{$expediente->nro_expediente}}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('expedientes-actualizar')}}">
                            @csrf
                            <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
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
                                </div>
                            </div>
                            {{-- BOTON PARA CARGAR EL PDF DE LA SOLICITUD --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">Solicitud:</label>
                                <input value="{{$expediente->pdf_solicitud}}" name="pdf_solicitud" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                <input type="file" name="pdf_solicitud_nueva" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />

                            </div>

                            {{-- BIENES DE USO Y OBSERVACIONES GENERALES --}}
                            <div>
                                <input value="{{$expediente->bienes_de_uso}} placeholder="detalle de bienes de uso" type="text" name="bienes_de_uso" class="form-control" id="basic-default-nombreCompleto" />
                            </div>
                            <div>
                                <input value="{{$expediente->observaciones_grales}} placeholder="OBSERVACIONES GENERALES" type="text" name="observaciones_grales" class="form-control" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- SECRETARIA DE GOBIERNO --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">SECRETARÌA DE GOBIERNO</label>
                                <input value="{{$expediente->observaciones_grales}}" type="text" name="secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_secretaria_gobierno" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- CATASTRO --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">CATASTRO</label>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Circ</label>
                                    <input required type="text" name="circunscripcion" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Secc</label>
                                    <input required type="text" name="seccion" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Chacra</label>
                                    <input required type="text" name="chacra" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Quinta</label>
                                    <input required type="text" name="quinta" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Fracciòn</label>
                                    <input required type="text" name="fraccion" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Manzana</label>
                                    <input required type="text" name="manzana" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Parcela</label>
                                    <input required type="text" name="parcela" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">SubPar</label>
                                    <input required type="text" name="sub_parcela" class="form-control" id="basic-default-nombreCompleto" />
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
                            </div>

                            {{-- OBRAS PARTICULARES --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">OBRAS PARTICULARES</label>
                                <input required type="text" name="obras_particulares" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_obras_particulares" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_obras_particulares" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA. TASA POR CONSERVACION DE LA RED VIAL</label>
                                <input required type="text" name="alumbrado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_alumbrado" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_alumbrado" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- BROMATOLOGÌA --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">BROMATOLOGÌA</label>
                                <input required type="text" name="bromatologia" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_bromatologia" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_bromatologia" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL</label>
                                <input required type="text" name="inspeccion" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_inspeccion" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_inspeccion" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- JUZGADO DE FALTAS --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">JUZGADO DE FALTAS</label>
                                <input required type="text" name="juzgado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_juzgado" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_juzgado" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- BOMBEROS DE POLICÌA DE BUENOS AIRES --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">BOMBEROS DE POLICÌA DE BUENOS AIRES</label>
                                <input required type="text" name="bomberos" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_bomberos" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_bomberos" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- INSPECCIÒN GENERAL --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">INSPECCIÒN GENERAL</label>
                                <input required type="text" name="inspeccion_general" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_inspeccion_general" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_inspeccion_general" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS</label>
                                <input required type="text" name="deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_deudores_alimentarios" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- HISTORIAL DE MODIFICACIONES --}}
                            <div>
                                <input required type="text" name="deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" placeholder="Historial de modificaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_deudores_alimentarios" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- DETALLE HABILITACION --}}
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Estado de habilitacion</label>
                                    <select name="estado_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                                        <option>-- Seleccione --</option>
                                        @foreach($tiposEstados as $tipo)
                                            <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleHabilitacion->tipoEstado->id) selected @endif>{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label" for="basic-default-fullname">Fecha de primer habilitacion</label>
                                    <input type="date" name="fecha_primer_habilitacion" class="form-control" id="basic-default-nombreCompleto" />
                                    <label class="form-label" for="basic-default-fullname">Fecha de vencimiento</label>
                                    <input type="date" name="fecha_vencimiento" class="form-control" id="basic-default-nombreCompleto" />
                                    <label class="form-label" for="basic-default-fullname">Tipo de habilitacion</label>
                                    <select required name="tipo_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                                        <option>-- Seleccione --</option>
                                        @if($expediente->detalleHabilitacion->tipoHabilitacion)
                                            @foreach($tiposhabilitaciones as $tipo)
                                                <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleHabilitacion->tipoHabilitacion->id) selected @endif>{{$tipo->descripcion}}</option>
                                            @endforeach
                                        @else
                                            @foreach($tiposhabilitaciones as $tipo)
                                                <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                            @endforeach
                                        @endif


                                    </select>
                                    <label class="form-label" for="basic-default-fullname">Certificado de habilitaciòn</label>
                                    <input type="file" name="certificado_habilitacion" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                </div>
            </div>
        </div>
    </body>
</html>
