    
@include('header.header')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Registrar expediente</h2>
                    </div>
                    <div class="card-body">
                        {{-- PRIMER PARTE DE CARGA DE EXPEDIENTE. PRIMER PAGINA DEL FIGMA --}}
                        <form method="POST" action="{{ route('expedientes-guardar') }}" enctype="multipart/form-data" onKeyPress="if(event.keyCode == 13) event.returnValue = false;">
                            @csrf
                            <div class="mb-3">
                                
                                <label class="form-label" for="basic-default-fullname">Nùmero de expediente</label>
                                <input readonly value="4093-" type="text" name="nro_expediente" class="form-control" />
                                <input type="text" name="nro_expediente1" class="form-control" value="{{ old('nro_expediente1') }}"/>
                                <input readonly type="text" name="nro_expediente2" class="form-control" value="/{{ now()->year }}"/>
                                @error('nro_expediente1')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                {{-- <input type="submit" value="Ver PDF"> --}}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nùmero de comercio</label>
                                <input readonly value="2-"  type="text" name="nro_comercio" class="form-control" id="basic-default-nombreCompleto" />
                                <input type="text" name="nro_comercio1" class="form-control" id="basic-default-nombreCompleto" value="{{ old('nro_comercio1') }}"/>
                                <input readonly value="-"type="text" name="nro_comercio3" class="form-control" id="basic-default-nombreCompleto" />

                                <input type="text" name="nro_comercio2" class="form-control" id="basic-default-nombreCompleto" value="{{ old('nro_comercio2') }}"/>

                                @error('nro_comercio1')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div>
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('nro_comercio2')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Actividad principal</label>
                                <input type="text" name="actividad_ppal" class="form-control" id="basic-default-nombreCompleto" value="{{ old('actividad_ppal') }}"/>
                                @error('actividad_ppal')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div>
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
                            <div>
                                <label class="form-label" for="basic-default-fullname">Domicilio inmueble/s</label>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Calle:</label>
                                    <input type="text" name="calle" class="form-control" id="basic-default-nombreCompleto" />
                                    @error('calle')
                                        {{-- <div class="invalid-feedback"> --}}
                                        <div>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Nº:</label>
                                    <input type="integer" name="numero" class="form-control" id="basic-default-nombreCompleto" />
                                    @error('numero')
                                        {{-- <div class="invalid-feedback"> --}}
                                        <div>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Tipo de inmueble</label>
                                    <select required name="tipo_inmueble_id" class="form-control" id="tipo_inmueble">
                                        <option value=" ">-- Seleccione --</option>
                                        @foreach($tiposInmuebles as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_inmueble_id')
                                        {{-- <div class="invalid-feedback"> --}}
                                        <div>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div id="fecha_alquiler" >
                                    <label class="form-label" for="basic-default-fullname">Fecha vencimiento alquiler</label>
                                    <input type="date" name="fecha_vencimiento_alquiler" class="form-control" id="fechaVencimiento" />
                                </div>
                            </div>

                            {{-- BOTON PARA CARGAR LA SOLICITUD --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">Solicitud:</label>
                                <input type="file" name="pdf_solicitud" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                @error('pdf_solicitud')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            {{-- BIENES DE USO Y OBSERVACIONES GENERALES --}}
                            <div>
                                <input placeholder="detalle de bienes de uso" type="text" name="bienes_de_uso" class="form-control" id="basic-default-nombreCompleto" />
                            </div>
                            <div>
                                <input placeholder="OBSERVACIONES GENERALES" type="text" name="observaciones_grales" class="form-control" id="basic-default-nombreCompleto" />
                            </div>
                            
                            {{-- DETALLE HABILITACION --}}
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Estado de habilitacion</label>
                                    <select name="estado_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                                        @foreach($tiposEstados as $tipo)
                                            @if ($tipo->descripcion == "En tramite")
                                                <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="submit" value="Comenzar carga de expediente">
                        </form>
                        <a href="{{route('pagina-principal')}}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
   </div>
 @include('footer.footer')
    
