    
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
                        <form method="POST" action="{{ route('expedientes-guardar') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nùmero de expediente</label>
                                <input value="4093-" type="text" name="nro_expediente" class="form-control" value="{{ old('nro_expediente') }}"/>
                                @error('nro_expediente')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                {{-- <input type="submit" value="Ver PDF"> --}}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nùmero de comercio</label>
                                <input value="2-"  type="text" name="nro_comercio" class="form-control" id="basic-default-nombreCompleto" value="{{ old('nro_comercio') }}"/>
                                @error('nro_comercio')
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
                                <label class="form-label" for="basic-default-fullname">Anexo</label>
                                <input  type="text" name="anexo" class="form-control" id="basic-default-nombreCompleto" value="{{ old('anexo') }}"/>
                                @error('anexo')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            {{-- DATOS DEL INMUEBLE --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">Domicilio inmueble/s</label>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Calle:</label>
                                    <input type="text" name="calle" class="form-control" id="basic-default-nombreCompleto" />
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
                                        <option>-- Seleccione --</option>
                                        @foreach($tiposInmuebles as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="fecha_alquiler" >
                                    <label class="form-label" for="basic-default-fullname">Fecha vencimiento alquiler</label>
                                    <input type="date" name="fecha_vencimiento_alquiler" class="form-control" id="fechaVencimiento" />
                                </div>
                            </div>

                            {{-- BOTON PARA CARGAR LA SOLICITUD --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">Solicitud:</label>
                                <input required type="file" name="pdf_solicitud" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
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
                            {{-- <button type="submit" class="btn btn-primary">Comenzar carga de expediente</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('footer.footer')
    
