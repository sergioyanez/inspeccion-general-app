@include('header.header')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="mb-0 h2">Registrar expediente</h1>
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
                                <div class="row">
                                    <input type="hidden" name="detalle_habilitacion" value="{{$expediente->detalleHabilitacion->id}}">
                                    <div class="row col-3 me-5">
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Estado de habilitación</label>
                                            @if($expediente->detalleHabilitacion->fecha_vencimiento && $expediente->detalleHabilitacion->fecha_vencimiento < now())
                                                <select required name="estado_habilitacion_id" class="form-select" id="basic-default-nombreCompleto" >
                                                    <option value="3" selected>Vencida</option>
                                                    @foreach($tiposEstados as $tipo)
                                                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select required name="estado_habilitacion_id" class="form-select" id="basic-default-nombreCompleto" >
                                                    @foreach($tiposEstados as $tipo)
                                                        <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleHabilitacion->tipoEstado->id) selected @endif>{{$tipo->descripcion}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Fecha de primer habilitación</label>
                                            <input value="{{ $expediente->detalleHabilitacion->fecha_primer_habilitacion }}" type="date" name="fecha_primer_habilitacion" class="form-control" id="fechaPrimerHabilitacion" />
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Fecha de vencimiento</label>
                                            <input value="{{ $expediente->detalleHabilitacion->fecha_vencimiento }}" type="date" name="fecha_vencimiento" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Tipo de habilitación</label>
                                            <select name="tipo_habilitacion_id" class="form-select" id="basic-default-nombreCompleto" >
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
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Certificado de habilitación</label>
                                            @if ($expediente->detalleHabilitacion->pdf_certificado_habilitacion)
                                                <p name="certificado_habilitacion">Certificado de habilitación cargado: <a href="{{ url($expediente->detalleHabilitacion->pdf_certificado_habilitacion) }}" target="blank_" >{{ $expediente->detalleHabilitacion->pdf_certificado_habilitacion}}</a>
                                            @endif
                                            <input type="file" name="certificado_nuevo" class="form-control" class="form-control-file" id="certificadoHabilitacion" />
                                        </div>
                                    </div>

                                    {{-- ESTADO DE BAJA --}}
                                    <div class="row ms-5 me-5 col-6">
                                        @if($expediente->estado_baja_id != null)
                                            <input type="hidden" name="estado_baja_id" value="{{$expediente->estado_baja_id}}" id="estado_baja_id">
                                            <input type="hidden" name="tipo_baja_id" value="{{$expediente->estadoBaja->tipoBaja->id}}" id="tipo_baja_id">


                                                <label class="form-label" for="basic-default-fullname">Estado de baja</label>

                                                    @if ($expediente->estadoBaja->tipoBaja->descripcion == "Provisoria")
                                                    <div class="col-6">
                                                        <select required name="tipo_baja_id" class="form-select" id="tipo_baja">
                                                            <option >-- Seleccione --</option>
                                                            @foreach($tiposBajas as $tipo)
                                                                <option value="{{$tipo->id}}" @if(old('tipo_baja_id') !== null) @if (old('tipo_baja_id') ==  $tipo->id) selected @endif @else @if($tipo->id == $expediente->estadoBaja->tipoBaja->id) selected @endif @endif >{{$tipo->descripcion}}</option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <div id="provisoria"> --}}
                                                    </div>
                                                        <div class="col-6">
                                                            <div id="provisoria">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="basic-default-fullname">Monto adeudado</label>
                                                                    <input value="{{$expediente->estadoBaja->deuda}}" type="text" name="deuda" class="form-control" />
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label" for="basic-default-fullname">Fecha de baja:</label>
                                                                    <input value="{{$expediente->estadoBaja->fecha_baja}}" type="date" name="fecha_baja_provisoria" class="form-control" id="fechaVencimientoProvisoria" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja:</label>
                                                                    @if ($expediente->estadoBaja->pdf_solicitud_baja)
                                                                        {{-- <input name="acta_baja"  value="{{$expediente->estadoBaja->pdf_solicitud_baja}}"/> --}}
                                                                        <p name="acta_baja">Acta solicitud de baja: <a href="{{ url($expediente->estadoBaja->pdf_solicitud_baja) }}" target="blank_" class="my-3 btn btn-danger btn-sm">Ver PDF</a>
                                                                        <p class="mb-3">Cargar uno nuevo</p>
                                                                    @endif
                                                                    <input type="file" name="acta_baja_nuevo" class="form-control" class="form-control-file" id="ActaSolicitudBajaProvisoria" />
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label" for="basic-default-fullname">Informe de deuda</label>
                                                                    @if ($expediente->estadoBaja->pdf_informe_deuda)
                                                                        {{-- <input name="informe_deuda" value="{{$expediente->estadoBaja->pdf_informe_deuda}}"/> --}}
                                                                        <p name="informe_deuda">informe de deuda: <a href="{{ url($expediente->estadoBaja->pdf_informe_deuda) }}" target="blank_" class="my-3 btn btn-danger btn-sm">Ver PDF</a>
                                                                        <p class="mb-3">Cargar uno nuevo</p>
                                                                    @endif
                                                                    <input type="file" name="informe_deuda_nuevo" class="form-control @error('informe_deuda_nuevo') is-invalid @enderror" id="informeDeuda" />
                                                                    @error('informe_deuda_nuevo')
                                                                        <div class="invalid-feedback">
                                                                            {{$message}}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="permanente">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                                                    <input type="date" name="fecha_baja1" class="form-control" id="fechaVencimientoPermanente" value="{{old('fecha_baja1')}}"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                                                    <input type="file" name="acta_baja_nuevo1" class="form-control @error('acta_baja_nuevo1') is-invalid @enderror" id="ActaSolicitudBajaPermanente" />
                                                                    @error('acta_baja_nuevo1')
                                                                        <div class="invalid-feedback">
                                                                            {{$message}}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @else

                                                    @if ($expediente->estadoBaja->tipoBaja->descripcion == "Permanente" || $expediente->estadoBaja->tipoBaja->descripcion == "De oficio")
                                                        <div class="col-6">
                                                            <select required name="tipo_baja_id" class="form-select" id="tipo_baja">
                                                                @foreach($tiposBajas as $tipo)
                                                                    @if($tipo->id == $expediente->estadoBaja->tipoBaja->id)
                                                                        <option value="{{$tipo->id}}"@if($tipo->id == $expediente->estadoBaja->tipoBaja->id) selected @endif >{{$tipo->descripcion}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <input readonly value="{{$expediente->estadoBaja->tipoBaja->descripcion}}" type="text" name="estado_baja" class="form-control" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                                                <input readonly value="{{$expediente->estadoBaja->fecha_baja}}" type="text" name="fecha_baja1" class="form-control" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                                                @if($expediente->estadoBaja->pdf_acta_solicitud_baja)
                                                                    {{-- <input readonly value="{{$expediente->estadoBaja->pdf_acta_solicitud_baja}}" type="text" name="acta_baja" class="form-control" /> --}}
                                                                    <p name="acta_baja">Acta cargada: <a href="{{ url($expediente->estadoBaja->pdf_acta_solicitud_baja) }}" target="blank_" class="my-3 btn btn-danger btn-sm">Ver PDF</a>
                                                                    <p class="mb-3">Cargar uno nuevo</p>
                                                                    @endif
                                                                <input type="file" name="acta_baja_nuevo1" class="form-control" class="form-control-file" id="ActaSolicitudBajaPermanente" />
                                                            </div>
                                                        </div>
                                                    @endif

                                                @endif


                                        @else

                                            <div class="col-6">
                                                <label class="form-label" for="basic-default-fullname">Estado de baja</label>
                                                <select required name="tipo_baja_id" class="form-select" id="tipo_baja">
                                                    <option>-- Seleccione --</option>
                                                    @foreach($tiposBajas as $tipo)
                                                        <option value="{{$tipo->id}}" @if (old('tipo_baja_id') ==  $tipo->id) selected @endif>{{$tipo->descripcion}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="col-6" id="provisoria">
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Monto adeudado</label>
                                                    <input type="text" name="deuda" class="form-control" value="{{old('deuda')}}"/>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                                    <input type="date" name="fecha_baja" class="form-control" id="fechaVencimientoProvisoria" value="{{old('fecha_baja')}}"/>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                                    <input type="file" name="acta_baja" class="form-control" class="form-control-file"/>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Informe de deuda</label>
                                                    <input type="file" name="pdf_informe_deuda" class="form-control @error('pdf_informe_deuda') is-invalid @enderror" class="form-control-file" />
                                                    @error('pdf_informe_deuda')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6" id="permanente">
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                                    <input type="date" name="fecha_baja1" class="form-control" id="fechaVencimientoPermanente"  value="{{old('fechaVencimientoPermanente')}}"/>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                                    <input type="file" name="acta_baja1" class="form-control @error('acta_baja1') is-invalid @enderror" class="form-control-file"/>
                                                    @error('acta_baja1')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <a href="{{route('expedientes-mostrar1', $expediente->id)}}" class="ms-1 mt-4 me-3 btn btn-secondary btn-salir">Volver</a>
                                    <button type="submit" class="mt-4 btn btn btn-success btn-salir">Finalizar</button>
                                </div>
                            </form>
                        </div>
                    @else
                        <!--USUARION NO ADMIN-->
                        <div class="card-body">
                            <form method="POST" action="{{route('expedientes-actualizar2')}}" enctype="multipart/form-data">
                                @csrf
                                @isset($expediente->id)
                                    <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
                                @endisset
                                <div class="row">
                                    {{-- TERCER PAGINA DEL FIGMA --}}
                                    {{-- DETALLE HABILITACION --}}
                                    <div class="row col-3 me-5">
                                        <input type="hidden" name="detalle_habilitacion" value="{{$expediente->detalleHabilitacion->id}}">
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Estado de habilitación</label>
                                            <select readonly name="estado_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                                                @foreach($tiposEstados as $tipo)
                                                    @if($expediente->detalleHabilitacion->tipoEstado->id == $tipo->id)
                                                        <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleHabilitacion->tipoEstado->id) selected @endif>{{$tipo->descripcion}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Fecha de primer habilitación</label>
                                            <input readonly value="{{ $expediente->detalleHabilitacion->fecha_primer_habilitacion }}" type="date" name="fecha_primer_habilitacion" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Fecha de vencimiento</label>
                                            <input readonly value="{{ $expediente->detalleHabilitacion->fecha_vencimiento }}" type="date" name="fecha_vencimiento" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Tipo de habilitación</label>
                                            <select readonly name="tipo_habilitacion_id" class="form-select" id="basic-default-nombreCompleto" >
                                                @if($expediente->detalleHabilitacion->tipoHabilitacion)
                                                    @foreach($tiposhabilitaciones as $tipo)
                                                        @if($tipo->id == $expediente->detalleHabilitacion->tipoHabilitacion->id)
                                                            <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleHabilitacion->tipoHabilitacion->id) selected @endif>{{$tipo->descripcion}}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="">-- Sin datos --</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Certificado de habilitación</label>
                                            @if ($expediente->detalleHabilitacion->pdf_certificado_habilitacion)
                                                <p name="certificado_habilitacion">Certificado de habilitación cargado: <a class="my-3 btn btn-danger btn-sm" href="{{ url($expediente->detalleHabilitacion->pdf_certificado_habilitacion) }}" target="blank_" >Ver PDF</a>
                                            @else
                                                <p class="text-muted" >Sin certificados cargados</p>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- ESTADO DE BAJA --}}
                                    <div class="row ms-5 me-5 col-6">
                                        @if($expediente->estado_baja_id != null)
                                            <input type="hidden" name="estado_baja_id" value="{{$expediente->estado_baja_id}}" id="estado_baja_id">
                                            <input type="hidden" name="tipo_baja_id" value="{{$expediente->estadoBaja->tipoBaja->id}}" id="tipo_baja_id">
                                            <div class="col-6">
                                                <label class="form-label" for="basic-default-fullname">Estado de baja</label>
                                                @if ($expediente->estadoBaja->tipoBaja->descripcion == "Provisoria")
                                                    <select readonly name="tipo_baja_id" class="form-control" id="tipo_baja">
                                                        <option value="{{$tipo->id}}" selected >{{$expediente->estadoBaja->tipoBaja->descripcion}}</option>
                                                    </select>
                                            </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Monto adeudado</label>
                                                        <input readonly value="{{$expediente->estadoBaja->deuda}}" type="text" name="deuda" class="form-control" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Fecha de baja:</label>
                                                        <input readonly value="{{$expediente->estadoBaja->fecha_baja}}" type="date" name="fecha_baja_provisoria" class="form-control" id="fechaVencimientoProvisoria" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                                        @if($expediente->estadoBaja->pdf_solicitud_baja)
                                                            <p readonly name="acta_baja">PDF cargado: <a class="my-3 btn btn-danger btn-sm"  href="{{ url($expediente->estadoBaja->pdf_solicitud_baja) }}" target="blank_" >Ver PDF</a>
                                                        @else
                                                            <p class="text-muted" >Sin Acta de solicitud de baja cargada</p>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Informe de deuda</label>
                                                        @if($expediente->estadoBaja->pdf_informe_deuda)
                                                            <p readonly name="acta_baja">PDF cargado: <a class="my-3 btn btn-danger btn-sm"  href="{{ url($expediente->estadoBaja->pdf_informe_deuda) }}" target="blank_" >Ver PDF</a>
                                                        @else
                                                            <p class="text-muted" >Sin informe de deuda</p>
                                                        @endif
                                                    </div>
                                                </div>

                                            @else
                                                @if ($expediente->estadoBaja->tipoBaja->descripcion == "Permanente" || $expediente->estadoBaja->tipoBaja->descripcion == "De oficio")
                                                    <select readonly required name="estado_baja" class="form-select" id="tipo_baja">
                                                        <option value="{{$tipo->id}}" selected >{{$expediente->estadoBaja->tipoBaja->descripcion}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                                        <input readonly value="{{$expediente->estadoBaja->fecha_baja}}" type="text" name="fecha_baja1" class="form-control" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Acta de solicitud de baja</label>
                                                        @if($expediente->estadoBaja->pdf_acta_solicitud_baja)
                                                            <p readonly name="acta_baja">PDF cargado: <a class="my-3 btn btn-danger btn-sm"  href="{{ url($expediente->estadoBaja->pdf_acta_solicitud_baja) }}" target="blank_" >Ver PDF</a>
                                                        @else
                                                            <p class="text-muted" >Sin acta cargada</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif
                                            @endif

                                        @else
                                            <div class="col-6">
                                                <label class="form-label" for="basic-default-fullname">Estado de baja</label>
                                                <select readonly name="tipo_baja_id" class="form-select" id="tipo_baja">
                                                    <option value="">-- Sin datos --</option>
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{route('expedientes-mostrar1', $expediente->id)}}" class="ms-1 mt-4 me-3 btn btn-secondary btn-salir">Volver</a>
                                <button type="submit" class="mt-4 btn btn btn-success btn-salir">Finalizar</button>

                            </form>

                        </div>

                    @endif
            </div>
        </div>
    </div>
@include('footer.footer')

