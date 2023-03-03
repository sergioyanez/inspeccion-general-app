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
                        {{-- @isset($expediente->nro_expediente)
                            <h2 class="mb-0">Expediente: {{$expediente->nro_expediente}}</h2>
                        @endisset --}}
                        <div>
                            <h3>Contribuyentes del expediente {{$expediente->nro_expediente}}</h3>
                            @forelse ($contribuyentes as $item)
                                <p>Nombre: {{ $item->contribuyente->nombre }} 
                                    Apellido: {{ $item->contribuyente->apellido }}
                                    Dni: {{ $item->contribuyente->apellido }}</p>
                            @empty
                            @endforelse
                        </div>
                        <div>
                            <h3>Personas juridicas del expediente {{$expediente->nro_expediente}}</h3>
                            @forelse ($personasJuridicas as $item1)
                                <p>Nombre: {{ $item1->personaJuridica->nombre_representante }} 
                                    Apellido: {{ $item1->personaJuridica->apellido_representante }}
                                    Dni: {{ $item1->personaJuridica->dni_representante }}</p>
                            @empty
                                
                            @endforelse
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{route('expedientes-actualizar2')}}" enctype="multipart/form-data">
                            @csrf
                            @isset($expediente->id)
                                <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
                            @endisset
                            {{-- TERCER PAGINA DEL FIGMA --}}
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

                            {{-- ESTADO DE BAJA --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">Estado de baja</label>
                                {{-- <input value="{{ $expediente-> }}" type="text" name="fecha_primer_habilitacion" class="form-control" id="basic-default-nombreCompleto" /> --}}
                                <input type="text" name="estado_baja" class="form-control" id="basic-default-nombreCompleto" />

                                <select required name="tipo_baja_id" class="form-control" id="tipo_baja">
                                    <option>-- Seleccione --</option>
                                    @foreach($tiposBajas as $tipo)
                                        <option value="{{$tipo->id}}" >{{$tipo->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="provisoria">
                                @if($expediente->estadoBaja)
                                    <label class="form-label" for="basic-default-fullname">Monto adeudado</label>
                                    <input value="{{$expediente->estadoBaja->deuda}}" type="text" name="deuda" class="form-control" />
                                @else
                                    <label class="form-label" for="basic-default-fullname">Monto adeudado</label>
                                    <input type="text" name="deuda" class="form-control" />
                                @endif

                                <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                @if ($expediente->estadoBaja)
                                    <input value="{{$expediente->estadoBaja->fecha_baja}}" type="date" name="fecha_baja" class="form-control" id="fechaVencimiento" />
                                @else
                                    <input type="date" name="fecha_baja" class="form-control" id="fechaVencimiento" />
                                @endif

                                <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                @if ($expediente->estadoBaja)
                                    <p name="acta_baja">Acta de solicitud de baja: {{$expediente->detalleHabilitacion->pdf_certificado_habilitacion}}</p>
                                @else
                                    <input type="file" name="pdf_acta_solicitud_baja" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                @endif

                                <label class="form-label" for="basic-default-fullname">Informe de deuda</label>
                                @if ($expediente->estadoBaja)
                                    <p name="informe_deuda">Informe de deuda: {{$expediente->estadoBaja->pdf_acta_solicitud_baja}}</p>
                                @else
                                    <input type="file" name="pdf_informe_deuda" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                @endif

                            </div>
                            <div id="permanente">
                                <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                @if ($expediente->estadoBaja)
                                    <input value="{{$expediente->estadoBaja->fecha_baja}}" type="date" name="fecha_baja" class="form-control" id="fechaVencimiento" />
                                @else
                                    <input type="date" name="fecha_baja" class="form-control" id="fechaVencimiento" />
                                @endif

                                <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                @if ($expediente->estadoBaja)
                                    <p name="acta_baja">Acta de solicitud de baja: {{$expediente->detalleHabilitacion->pdf_certificado_habilitacion}}</p>
                                @else
                                    <input type="file" name="pdf_acta_solicitud_baja" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                @endif
                            </div>
                            
                                {{-- <select required name="tipo_inmueble_id" class="form-control" id="tipo_inmueble">
                                    <option>-- Seleccione --</option>
                                    @foreach($tiposInmuebles as $tipo)
                                        
                                        <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleInmueble->tipoInmueble->id) selected @endif>{{$tipo->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="fecha_alquiler" >
                                <label class="form-label" for="basic-default-fullname">Fecha vencimiento alquiler</label>
                                <input value="{{$expediente->detalleInmueble->fecha_venc_alquiler}}" type="date" name="fecha_vencimiento_alquiler" class="form-control" id="fechaVencimiento" />
                            </div> --}}
                            
                            
                            
                            
                            

                            <button type="submit" class="btn btn-primary">Finalizar</button>
                        </form>
                        <a href="{{route('expedientes-mostrar1', $expediente->id)}}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </body>
</html>
