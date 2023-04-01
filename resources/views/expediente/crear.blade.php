    
@include('header.header')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Registrar expediente</h2>
                    </div>
                    <div class="card-body">
                        {{-- PRIMER PARTE DE CARGA DE EXPEDIENTE. PRIMER PAGINA DEL FIGMA --}}
                        <form method="POST" action="{{ route('expedientes-guardar') }}" enctype="multipart/form-data" onKeyPress="if(event.keyCode == 13) event.returnValue = false;">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Número de expediente <span class="text-muted">(obligatorio)</span></label>
                                    <div class="row">
                                        <div class="col-1">
                                            <input readonly value="4093-" type="text" name="nro_expediente" class="form-control" />
                                        </div>
                                        <div class="col-3">
                                            <input type="text" name="nro_expediente1" class="form-control @error('nro_expediente1') is-invalid @enderror" value="{{ old('nro_expediente1') }}"/>
                                            @error('nro_expediente1')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-1">
                                            <input readonly type="text" name="nro_expediente2" class="form-control" value="/{{ now()->year }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Número de comercio <span class="text-muted">(obligatorio)</span></label>
                                    <div class="row">
                                        <div class="col-1">
                                            <input readonly value="2-"  type="text" name="nro_comercio" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                        <div class="col-3">
                                            <input type="text" name="nro_comercio1" class="form-control @error('nro_comercio1') is-invalid @enderror" id="basic-default-nombreCompleto" value="{{ old('nro_comercio1') }}"/>
                                            @error('nro_comercio1')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-1">
                                            <input readonly value="     -   "type="text" name="nro_comercio3" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                        <div class="col-3">
                                            <input type="text" name="nro_comercio2" class="form-control @error('nro_comercio2') is-invalid @enderror" id="basic-default-nombreCompleto" value="{{ old('nro_comercio2') }}"/>
                                            @error('nro_comercio2')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-3 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Actividad principal <span class="text-muted">(obligatorio)</span></label>
                                    <input type="text" name="actividad_ppal" class="form-control @error('actividad_ppal') is-invalid @enderror" id="basic-default-nombreCompleto" value="{{ old('actividad_ppal') }}"/>
                                    @error('actividad_ppal')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    {{-- <label class="form-label" for="basic-default-fullname">Anexo</label>
                                    <input  type="text" name="anexo" class="form-control" id="basic-default-nombreCompleto" value="{{ old('anexo') }}"/>
                                    @error('anexo')
                                        
                                        <div>
                                            {{$message}}
                                        </div>
                                    @enderror --}}
                                </div>

                                {{-- DATOS DEL INMUEBLE --}}
                                <div class="row">
                                    <label class="form-label mb-3" for="basic-default-fullname">Domicilio/Inmueble</label>
                                    <div class="col-3">
                                        <label class="form-label" for="basic-default-fullname">Calle <span class="text-muted">(obligatorio)</span></label>
                                        <input type="text" name="calle" class="form-control @error('calle') is-invalid @enderror" id="basic-default-nombreCompleto" />
                                        @error('calle')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-2 p-0">
                                        <label class="form-label" for="basic-default-fullname">Numero</label>
                                        <input type="integer" name="numero" class="form-control @error('numero') is-invalid @enderror" id="basic-default-nombreCompleto" />
                                        @error('numero')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label class="form-label" for="basic-default-fullname">Tipo de inmueble <span class="text-muted">(obligatorio)</span></label>
                                        <select required name="tipo_inmueble_id" class="form-select @error('tipo_inmueble_id') is-invalid @enderror" id="tipo_inmueble">
                                            <option value=" ">-- Seleccione --</option>
                                            @foreach($tiposInmuebles as $tipo)
                                                <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                            @endforeach
                                        </select>
                                        @error('tipo_inmueble_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-3" id="fecha_alquiler" >
                                        <label class="form-label" for="basic-default-fullname">Fecha vencimiento alquiler</label>
                                        <input type="date" name="fecha_vencimiento_alquiler" class="form-control" id="fechaVencimiento" />
                                    </div>
                                </div>

                                {{-- BOTON PARA CARGAR LA SOLICITUD --}}
                                <div class="col-4 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Solicitud <span class="text-muted">(obligatorio)</span></label>
                                    <input type="file" name="pdf_solicitud" class="form-control @error('pdf_solicitud') is-invalid @enderror" class="form-control-file" id="basic-default-nombreCompleto" />
                                    @error('pdf_solicitud')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                {{-- BIENES DE USO Y OBSERVACIONES GENERALES --}}
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Bienes de uso</label>
                                    <textarea placeholder="Detalle de bienes de uso.." name="bienes_de_uso" class="form-control" id="basic-default-nombreCompleto"></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Observaciones Generales</label>
                                    <textarea placeholder="Observaciones.." name="observaciones_grales" class="form-control" id="basic-default-nombreCompleto"></textarea>
                                </div>
                                
                                {{-- DETALLE HABILITACION --}}
                                <div class="col-2 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Estado de habilitación</label>
                                    <select name="estado_habilitacion_id" class="form-select" id="basic-default-nombreCompleto" >
                                        @foreach($tiposEstados as $tipo)
                                            @if ($tipo->descripcion == "En tramite")
                                                <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <a href="{{route('pagina-principal')}}" class="ms-1 mt-4 me-3 btn btn-secondary btn-salir">Volver</a>
                            <button type="submit" class="mt-4 btn btn-success btn-salir">Comenzar a cargar</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
   </div>
 @include('footer.footer')
    
