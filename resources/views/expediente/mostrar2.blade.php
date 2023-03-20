@include('header.header')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{-- @isset($expediente->nro_expediente)
                            <h2 class="mb-0">Expediente: {{$expediente->nro_expediente}}</h2>
                        @endisset --}}
                        {{-- <div>
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
                        </div> --}}
                    </div>
                    @if(Auth::user()->tipo_permiso_id == 1)
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
                                        <label class="form-label" for="basic-default-fullname">Estado de habilitación</label>
                                        <select required name="estado_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                                            <option>-- Seleccione --</option>
                                            @foreach($tiposEstados as $tipo)
                                                <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleHabilitacion->tipoEstado->id) selected @endif>{{$tipo->descripcion}}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label" for="basic-default-fullname">Fecha de primer habilitación</label>
                                        <input value="{{ $expediente->detalleHabilitacion->fecha_primer_habilitacion }}" type="date" name="fecha_primer_habilitacion" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Fecha de vencimiento</label>
                                        <input value="{{ $expediente->detalleHabilitacion->fecha_vencimiento }}" type="date" name="fecha_vencimiento" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Tipo de habilitación</label>
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
                                        {{-- <label class="form-label" for="basic-default-fullname">Certificado de habilitaciòn</label>
                                        @if (request('fecha_primer_habilitacion'))
                                        
                                            @if ($expediente->detalleHabilitacion->pdf_certificado_habilitacion)
                                                <p name="certificado_habilitacion">Certificado de habilitaciòn cargado: {{$expediente->detalleHabilitacion->pdf_certificado_habilitacion}}</p>
                                            @endif
                                            <input type="file" name="certificado_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            @error('certificado_nuevo')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        @else
                                            @if ($expediente->detalleHabilitacion->pdf_certificado_habilitacion)
                                                <p name="certificado_habilitacion">Certificado de habilitaciòn cargado: {{$expediente->detalleHabilitacion->pdf_certificado_habilitacion}}</p>
                                            @endif
                                            <input type="file" name="certificado_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            @error('certificado_nuevo')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                        @enderror  
                                        @endif --}}
                                        <label class="form-label" for="basic-default-fullname">Certificado de habilitación</label>
                                        @if ($expediente->detalleHabilitacion->pdf_certificado_habilitacion)
                                            <p name="certificado_habilitacion">Certificado de habilitación cargado: <a href="{{ url($expediente->detalleHabilitacion->pdf_certificado_habilitacion) }}" target="blank_" >{{ $expediente->detalleHabilitacion->pdf_certificado_habilitacion}}</a>
                                        @endif
                                        <input type="file" name="certificado_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                    </div>
                                </div>

                                {{-- ESTADO DE BAJA --}}
                                <div>
                                    @if($expediente->estado_baja_id != null)
                                        <input type="hidden" name="estado_baja_id" value="{{$expediente->estado_baja_id}}" id="estado_baja_id">
                                        <input type="hidden" name="tipo_baja_id" value="{{$expediente->estadoBaja->tipoBaja->id}}" id="tipo_baja_id">
                                        <label class="form-label" for="basic-default-fullname">Estado de baja</label>
                                        @if ($expediente->estadoBaja->tipoBaja->descripcion == "Provisoria")
                                            <select required name="tipo_baja_id" class="form-control" id="tipo_baja">
                                                <option >-- Seleccione --</option>
                                                @foreach($tiposBajas as $tipo)
                                                    <option value="{{$tipo->id}}"@if($tipo->id == $expediente->estadoBaja->tipoBaja->id) selected @endif >{{$tipo->descripcion}}</option>
                                                @endforeach
                                            </select>
                                            {{-- <div id="provisoria"> --}}
                                            <div>
                                                <label class="form-label" for="basic-default-fullname">Monto adeudado</label>
                                                <input value="{{$expediente->estadoBaja->deuda}}" type="text" name="deuda" class="form-control" />

                                                <label class="form-label" for="basic-default-fullname">Fecha de baja:</label>
                                                <input value="{{$expediente->estadoBaja->fecha_baja}}" type="date" name="fecha_baja_provisoria" class="form-control" id="fechaVencimientoProvisoria" />

                                                <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja:</label>
                                                @if ($expediente->estadoBaja->pdf_solicitud_baja)
                                                    {{-- <input name="acta_baja"  value="{{$expediente->estadoBaja->pdf_solicitud_baja}}"/> --}}
                                                    <p name="acta_baja">Acta solicitud de baja: <a href="{{ url($expediente->estadoBaja->pdf_solicitud_baja) }}" target="blank_" >{{$expediente->estadoBaja->pdf_solicitud_baja}}</a>
                                                @endif
                                                <input type="file" name="acta_baja_nuevo" class="form-control" class="form-control-file" id="ActaSolicitudBajaProvisoria" />

                                                <label class="form-label" for="basic-default-fullname">Informe de deuda</label>
                                                @if ($expediente->estadoBaja->pdf_informe_deuda)
                                                    {{-- <input name="informe_deuda" value="{{$expediente->estadoBaja->pdf_informe_deuda}}"/> --}}
                                                    <p name="informe_deuda">Acta solicitud de baja: <a href="{{ url($expediente->estadoBaja->pdf_informe_deuda) }}" target="blank_" >{{$expediente->estadoBaja->pdf_informe_deuda}}</a>
                                                @endif
                                                <input type="file" name="informe_deuda_nuevo" class="form-control" class="form-control-file" id="informeDeuda" />
                                            </div>

                                            <div id="permanente">
                                                <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                                <input type="date" name="fecha_baja1" class="form-control" id="fechaVencimientoPermanente"/>

                                                <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                                <input type="file" name="acta_baja_nuevo1" class="form-control" class="form-control-file" id="ActaSolicitudBajaPermanente" />
                                            </div>
                                        @else
                                            @if ($expediente->estadoBaja->tipoBaja->descripcion == "Permanente")
                                                <input readonly value="{{$expediente->estadoBaja->tipoBaja->descripcion}}" type="text" name="estado_baja" class="form-control" />
                                                <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                                <input readonly value="{{$expediente->estadoBaja->fecha_baja}}" type="text" name="fecha_baja1" class="form-control" />
                                                <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                                @if($expediente->estadoBaja->pdf_acta_solicitud_baja)
                                                    {{-- <input readonly value="{{$expediente->estadoBaja->pdf_acta_solicitud_baja}}" type="text" name="acta_baja" class="form-control" /> --}}
                                                    <p name="acta_baja">Acta de solicitud de baja cargado: <a href="{{ url($expediente->estadoBaja->pdf_acta_solicitud_baja) }}" target="blank_" >{{ $expediente->estadoBaja->pdf_acta_solicitud_baja}}</a>

                                                    @endif
                                                <input type="file" name="acta_baja_nuevo1" class="form-control" class="form-control-file" id="ActaSolicitudBajaPermanente" />
                                            @endif
                                        @endif

                                    @else
                                        <label class="form-label" for="basic-default-fullname">Estado de baja</label>
                                        <input type="text" name="estado_baja" class="form-control" id="basic-default-nombreCompleto" />
                                        <select required name="tipo_baja_id" class="form-control" id="tipo_baja">
                                            <option>-- Seleccione --</option>
                                            @foreach($tiposBajas as $tipo)
                                                <option value="{{$tipo->id}}" >{{$tipo->descripcion}}</option>
                                            @endforeach
                                        </select>

                                        <div id="provisoria">
                                            <label class="form-label" for="basic-default-fullname">Monto adeudado</label>
                                            <input type="text" name="deuda" class="form-control" />

                                            <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                            <input type="date" name="fecha_baja" class="form-control" id="fechaVencimientoProvisoria" />

                                            <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                            <input type="file" name="acta_baja" class="form-control" class="form-control-file"  />

                                            <label class="form-label" for="basic-default-fullname">Informe de deuda</label>
                                            <input type="file" name="pdf_informe_deuda" class="form-control" class="form-control-file"  />
                                        </div>
                                        <div id="permanente">
                                            <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                            <input type="date" name="fecha_baja1" class="form-control" id="fechaVencimientoPermanente"/>

                                            <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                            <input type="file" name="acta_baja1" class="form-control" class="form-control-file"  />
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Finalizar</button>
                            </form>
                            <a href="{{route('expedientes-mostrar1', $expediente->id)}}" class="btn btn-primary">Volver</a>
                        </div>
                    @else
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
                                        <label class="form-label" for="basic-default-fullname">Estado de habilitación</label>
                                        <select readonly name="estado_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                                            @foreach($tiposEstados as $tipo)
                                                @if($expediente->detalleHabilitacion->tipoEstado->id == $tipo->id)
                                                    <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleHabilitacion->tipoEstado->id) selected @endif>{{$tipo->descripcion}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label class="form-label" for="basic-default-fullname">Fecha de primer habilitación</label>
                                        <input readonly value="{{ $expediente->detalleHabilitacion->fecha_primer_habilitacion }}" type="date" name="fecha_primer_habilitacion" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Fecha de vencimiento</label>
                                        <input readonly value="{{ $expediente->detalleHabilitacion->fecha_vencimiento }}" type="date" name="fecha_vencimiento" class="form-control" id="basic-default-nombreCompleto" />
                                        <label class="form-label" for="basic-default-fullname">Tipo de habilitación</label>
                                        <select readonly name="tipo_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                                            @if($expediente->detalleHabilitacion->tipoHabilitacion)
                                                @foreach($tiposhabilitaciones as $tipo)
                                                    @if($tipo->id == $expediente->detalleHabilitacion->tipoHabilitacion->id)
                                                        <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleHabilitacion->tipoHabilitacion->id) selected @endif>{{$tipo->descripcion}}</option>
                                                    @endif
                                                @endforeach
                                            @else
                                                {{--<option>-- Seleccione --</option>
                                                 @foreach($tiposhabilitaciones as $tipo)
                                                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                                @endforeach --}}
                                            @endif
                                        </select>
                                        <label class="form-label" for="basic-default-fullname">Certificado de habilitación</label>
                                        @if ($expediente->detalleHabilitacion->pdf_certificado_habilitacion)
                                            {{-- <p name="certificado_habilitacion">Certificado de habilitaciòn cargado: {{$expediente->detalleHabilitacion->pdf_certificado_habilitacion}}</p> --}}
                                            <p name="certificado_habilitacion">Certificado de habilitación cargado: <a href="{{ url($expediente->detalleHabilitacion->pdf_certificado_habilitacion) }}" target="blank_" >{{ $expediente->detalleHabilitacion->pdf_certificado_habilitacion}}</a>

                                            @endif
                                        {{-- <input type="file" name="certificado_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" /> --}}
                                    </div>
                                </div>

                                {{-- ESTADO DE BAJA --}}
                                <div>
                                    @if($expediente->estado_baja_id != null)
                                        <input type="hidden" name="estado_baja_id" value="{{$expediente->estado_baja_id}}" id="estado_baja_id">
                                        <input type="hidden" name="tipo_baja_id" value="{{$expediente->estadoBaja->tipoBaja->id}}" id="tipo_baja_id">
                                        <label class="form-label" for="basic-default-fullname">Estado de baja</label>
                                        @if ($expediente->estadoBaja->tipoBaja->descripcion == "Provisoria")
                                            <select readonly name="tipo_baja_id" class="form-control" id="tipo_baja">
                                                {{-- <option >-- Seleccione --</option> --}}
                                                @foreach($tiposBajas as $tipo)
                                                    @if($tipo->id == $expediente->estadoBaja->tipoBaja->id)
                                                        <option value="{{$tipo->id}}"@if($tipo->id == $expediente->estadoBaja->tipoBaja->id) selected @endif >{{$tipo->descripcion}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div id="provisoria">
                                                <label class="form-label" for="basic-default-fullname">Monto adeudado</label>
                                                <input readonly value="{{$expediente->estadoBaja->deuda}}" type="text" name="deuda" class="form-control" />

                                                <label class="form-label" for="basic-default-fullname">Fecha de baja:</label>
                                                <input readonly value="{{$expediente->estadoBaja->fecha_baja}}" type="date" name="fecha_baja_provisoria" class="form-control" id="fechaVencimientoProvisoria" />

                                                <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja:</label>
                                                @if ($expediente->estadoBaja->pdf_solicitud_baja)
                                                    <input readonly name="acta_baja"  value="{{$expediente->estadoBaja->pdf_solicitud_baja}}"/>
                                                @endif
                                                {{-- <input type="file" name="acta_baja_nuevo" class="form-control" class="form-control-file" id="ActaSolicitudBajaProvisoria" /> --}}

                                                <label class="form-label" for="basic-default-fullname">Informe de deuda</label>
                                                @if ($expediente->estadoBaja->pdf_informe_deuda)
                                                    <input readonly name="informe_deuda" value="{{$expediente->estadoBaja->pdf_informe_deuda}}"/>
                                                @endif
                                                {{-- <input type="file" name="informe_deuda_nuevo" class="form-control" class="form-control-file" id="informeDeuda" /> --}}
                                            </div>

                                            <div id="permanente">
                                                <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                                <input readonly type="date" name="fecha_baja1" class="form-control" id="fechaVencimientoPermanente"/>

                                                <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                                <p name="acta_baja">PDF cargado: <a href="{{ url($expediente->estadoBaja->pdf_acta_solicitud_baja) }}" target="blank_" >{{ $expediente->estadoBaja->pdf_acta_solicitud_baja}}</a>

                                                {{-- <input readonly type="file" name="acta_baja_nuevo1" class="form-control" class="form-control-file" id="ActaSolicitudBajaPermanente" /> --}}
                                            </div>
                                        @else
                                            @if ($expediente->estadoBaja->tipoBaja->descripcion == "Permanente")
                                                <input readonly value="{{$expediente->estadoBaja->tipoBaja->descripcion}}" type="text" name="estado_baja" class="form-control" />
                                                <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                                <input readonly value="{{$expediente->estadoBaja->fecha_baja}}" type="text" name="fecha_baja1" class="form-control" />
                                                <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                                @if($expediente->estadoBaja->pdf_acta_solicitud_baja)
                                                    <p readonly name="acta_baja">PDF cargado: <a href="{{ url($expediente->estadoBaja->pdf_acta_solicitud_baja) }}" target="blank_" >{{ $expediente->estadoBaja->pdf_acta_solicitud_baja}}</a>

                                                    {{-- <input readonly value="{{$expediente->estadoBaja->pdf_acta_solicitud_baja}}" type="text" name="acta_baja" class="form-control" /> --}}
                                                @endif
                                                {{-- <input type="file" name="acta_baja_nuevo1" class="form-control" class="form-control-file" id="ActaSolicitudBajaPermanente" /> --}}
                                            @endif
                                        @endif

                                    @else
                                        <label class="form-label" for="basic-default-fullname">Estado de baja</label>
                                        <input type="text" name="estado_baja" class="form-control" id="basic-default-nombreCompleto" />
                                        <select readonly name="tipo_baja_id" class="form-control" id="tipo_baja">
                                            <option>-- Seleccione --</option>
                                            {{-- @foreach($tiposBajas as $tipo)
                                                <option value="{{$tipo->id}}" >{{$tipo->descripcion}}</option>
                                            @endforeach --}}
                                        </select>

                                        {{-- <div id="provisoria">
                                            <label class="form-label" for="basic-default-fullname">Monto adeudado</label>
                                            <input readonly type="text" name="deuda" class="form-control" />

                                            <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                            <input readonly type="date" name="fecha_baja" class="form-control" id="fechaVencimientoProvisoria" />

                                            <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                            <input readonly type="file" name="acta_baja" class="form-control" class="form-control-file"  />

                                            <label class="form-label" for="basic-default-fullname">Informe de deuda</label>
                                            <input readonly type="file" name="pdf_informe_deuda" class="form-control" class="form-control-file"  />
                                        </div>
                                        <div id="permanente">
                                            <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                            <input readonly type="date" name="fecha_baja1" class="form-control" id="fechaVencimientoPermanente"/>

                                            <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                            <input readonly type="file" name="acta_baja1" class="form-control" class="form-control-file"  />
                                        </div> --}}
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Finalizar</button>
                            </form>
                            <a href="{{route('expedientes-mostrar1', $expediente->id)}}" class="btn btn-primary">Volver</a>
                        </div>

                    @endif
            </div>
        </div>
    </div>
@include('footer.footer')
    
