@include('header.header')
    <div class="container mb-3">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-6">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            {{-- BUSCAR UN CONTRIBUYENTE POR DNI --}}
                            <form method="GET" action="{{route('contribuyentes-buscar')}}">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2 ms-1">Buscar contribuyente</label>
                                    <input  type="text" name="buscarpor" class="form-control" placeholder="Número de documento" />
                                    <input  class="mt-2 btn btn-orange" type="submit" value="Buscar">
                                </div>
                            </form>
                            {{-- BUSCAR UNA PERSONA JURIDICA POR DNI --}}
                            <form method="GET" action="{{route('personasJuridicas-buscar')}}">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2 ms-1">Buscar persona jurídica</label>
                                    <input  type="text" name="buscarpor1" class="form-control" placeholder="Número de documento"/>
                                    <input  class="mt-2 btn btn-orange" type="submit" value="Buscar">
                                </div>
                            </form>
                        </div>
                        
                        <div class="position-relative py-5 px-5">
                            {{-- MUESTRA EL CONTRIBUYENTE SI LO ENCONTRO Y DA LA OPCION DE AGREGARLO AL EXPEDIENTE
                            O SI NO LO ENCONTRO DA LA OPCION DE CREARLO --}}
                            <form class="justify-content-center" method="POST" action="{{ route('expedientesContribuyentes-guardar') }}">
                                @csrf
                                @isset($contribuyentes)
                                    @if ($contribuyentes != null and count($contribuyentes) == 1 and request('buscarpor'))
                                    <h5 class="mb-3 text-left font-weight">Agregar el contribuyente:</h5>
                                        <ul class="list-group">
                                        @foreach ($contribuyentes as $contribuyente)
                                            <li class="list-group-item list-group-item-action" data-toggle="list">{{$contribuyente->nombre}}
                                            {{$contribuyente->apellido}}
                                            {{$contribuyente->dni}}
                                            <input type="hidden" name="contribuyente_id" value="{{$contribuyente->id}}">
                                            <input type="hidden" name="idExpSiguiente" value="{{$expediente->id}}">
                                            <button class="ms-5 btn btn-primary"type="submit">Agregar</button></li>
                                      
                                            @foreach ($expedientesContribuyentes as $ec)
                                                @if($ec->expediente_id == $expediente->id && $ec->contribuyente_id == $contribuyente->id)
                                                     <p class="text-danger">El contribuyente ya esta cargado en el expediente</p>
                                                    {{-- <input required type="text" name="cargoContribuyente" value="{{ "seba" }}"> --}}
                                                @endif
                                            @endforeach
                                        @endforeach
                                        </ul>
                                    @else
                                        @if (request('buscarpor'))
                                            <h4 class="card p-5">No se encontró el contribuyente</h4>
                                            <a href="{{route('contribuyentes-crearEnExpediente')}}" class="btn btn-violet">Crear nuevo contribuyente</a>
                                        @endif

                                    @endif
                                @endisset
                            </form>
                            {{-- MUESTRA LA PERSONA JURIDICA SI LA ENCONTRO Y DA LA OPCION DE AGREGARLA AL EXPEDIENTE
                            O SI NO LA ENCONTRO DA LA OPCION DE CREARLA --}}
                            <form method="POST" action="{{ route('expedientesPersonasJuridicas-guardar') }}">
                                @csrf
                                @isset($personasJuridicas)
                                    @if ($personasJuridicas != null and count($personasJuridicas) == 1 and request('buscarpor1'))
                                    <h5 class=" text-left font-weight">Agregar al expediente la persona jurídica:</h5>
                                        @foreach ($personasJuridicas as $pj)
                                            <td>{{$pj->nombre_representante}}</td>
                                            <td>{{$pj->apellido_representante}}</td>
                                            <td>{{$pj->dni_representante}}</td>
                                            <input type="hidden" name="persona_juridica_id" value="{{$pj->id}}">
                                            <input type="hidden" name="idExpSiguiente" value="{{$expediente->id}}">
                                            <button class="btn btn-primary" type="submit">Agregar</button>
                                            @foreach ($expedientesPersonasJuridicas as $ec)
                                                @if($ec->expediente_id == $expediente->id && $ec->persona_juridica_id == $pj->id)
                                                    {{ "La persona juridica ya esta cargada en el expediente" }}
                                                    {{-- <input required type="text" name="cargoContribuyente" value="{{ "seba" }}"> --}}
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @else
                                        @if (request('buscarpor1'))
                                            <h4 class="card p-5">No se encontró la persona jurídica</h4>
                                            <a href="{{route('personasJuridicas-crearEnExpediente')}}" class="btn btn-primary">Crear persona jurídica para el expediente</a>
                                        @endif

                                    @endif
                                @endisset
                            </form>
                        </div>

                        <div>
                            {{-- MUESTRA EL/LOS CONTRIBUYENTES AGREGADOS AL EXPEDIENTE --}}
                            <h3 class="mb-3">Contribuyentes del expediente</h3>
                
                               <div class="accordion accordion-flush" id="accordionFlushExample">
                                    @forelse ($expedientesContribuyentes as $expedContrib)
                                            @if ($expedContrib->expediente_id ==$expediente->id)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            {{$expedContrib->contribuyente->nombre}}  {{$expedContrib->contribuyente->apellido}}
                                        </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body"> {{$expedContrib->contribuyente->dni}} <a href="{{route('expedientesContribuyentes-eliminar', $expedContrib->id)}}"class="btn btn-danger">Eliminar</a></td></div>
                                            
                                          </div>
                                        </div>       
                                           
                                        @endif
                                    @empty
                                    @endforelse
                                </div>
                            {{-- MUESTRA LA/LAS PERSONAS JURIDICAS AGREGADAS AL EXPEDIENTE --}}
                            <h3 class="">Personas jurídicas del expediente</h3>

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                        @forelse ($expedientesPersonasJuridicas as $expedPersJurid)
                                        @if ($expedPersJurid->expediente_id ==$expediente->id)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    {{$expedPersJurid->personaJuridica->nombre_representante}}  {{$expedPersJurid->personaJuridica->apellido_representante}}
                                                </button>
                                                </h2>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body"> {{$expedPersJurid->personaJuridica->dni_representante}} <a  href="{{route('expedientesPersonasJuridicas-eliminar', $expedPersJurid->id)}}"class="btn btn-danger">Eliminar</a></div>
                                                    
                                                </div>
                                                </div>       
                                       
                                         @endif
                                @empty
                                @endforelse
                            </div>

                        </div>
                    </div>
                    
                    {{-- PRIMER PARTE DE CARGA DE EXPEDIENTE. PRIMER PAGINA DEL FIGMA --}}
                    <div class="card-body">
                        
                        <form method="POST" action="{{route('expedientes-actualizar')}}" enctype="multipart/form-data">
                            @csrf
                            @foreach ($expedientesContribuyentes as $ec)
                                @if($ec->expediente_id == $expediente->id)
                                    <input required type="hidden" name="cargo" value="{{$ec->expediente_id}}">
                                @endif
                            @endforeach
                            @error('cargo')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                            
                            @isset($expediente->id)
                                <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
                            @endisset
                            
                            <div class="col-12 row">
                                <div class="col-3 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Número de expediente</label>
                                    <input readonly value="{{$expediente->nro_expediente}}" type="text" name="nro_expediente" class="form-control" id="basic-default-nombreCompleto"/>
                                    {{-- <input type="submit" value="Ver PDF"> --}}
                                    @error('nro_expediente')
                                        
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 row">
                                <div class="col-3 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Número de comercio</label>
                                    <input readonly value="{{$expediente->nro_comercio}}" type="text" name="nro_comercio" class="form-control" id="basic-default-nombreCompleto" />
                                    @error('nro_comercio')
                                        
                                        <div>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                         
                            <div class="col-12 row mb-4">
                                <div class="col-3 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Actividad principal</label>
                                    <input value="{{$expediente->actividad_ppal}}" type="text" name="actividad_ppal" class="form-control @error('actividad_ppal') is-invalid @enderror" id="basic-default-nombreCompleto" />
                                    @error('actividad_ppal')
                                        {{-- <div class="invalid-feedback"> --}}
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    {{-- <label class="form-label" for="basic-default-fullname">Anexo</label>
                                    <input value="{{$expediente->anexo}}" type="text" name="anexo" class="form-control" id="basic-default-nombreCompleto" />
                                    @error('anexo')
                                        
                                        <div>
                                            {{$message}}
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                           
                            
                            {{-- DATOS DEL INMUEBLE --}}
                            
                                <div class="row col-12 mb-5">
                                    <input type="hidden" name="inmueble_id" value="{{$expediente->detalleInmueble->inmueble->id}}">
                                    <label class="form-label" for="basic-default-fullname">Domicilio/Inmueble</label>
                                 
                                        <div class="col-3">
                                            <label class="form-label" for="basic-default-fullname">Calle</label>
                                            <input value="{{$expediente->detalleInmueble->inmueble->calle}}" type="text" name="calle" class="form-control @error('calle') is-invalid @enderror" id="basic-default-nombreCompleto" />
                                            @error('calle')
                                                {{-- <div class="invalid-feedback"> --}}
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                            
                                
                                    <div class="col-2">
                                        <label class="form-label" for="basic-default-fullname">Número</label>
                                        <input value="{{$expediente->detalleInmueble->inmueble->numero}}" type="text" name="numero" class="form-control @error('numero') is-invalid @enderror" id="basic-default-nombreCompleto" />
                                        @error('numero')
                                            {{-- <div class="invalid-feedback"> --}}
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                
                                    <input type="hidden" name="detalle_inmueble_id" value="{{$expediente->detalleInmueble->id}}">
                                    <div class="col-3">
                                        <label class="form-label" for="basic-default-fullname">Tipo de inmueble</label>
                                        <select required name="tipo_inmueble_id" class="form-select @error('tipo_inmueble_id') is-invalid @enderror" id="tipo_inmueble">
                                            <option value="">-- Seleccione --</option>
                                            @foreach($tiposInmuebles as $tipo)
                                                <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleInmueble->tipoInmueble->id) selected @endif>{{$tipo->descripcion}}</option>
                                            @endforeach
                                        </select>
                                        @error('tipo_inmueble_id')
                                            {{-- <div class="invalid-feedback"> --}}
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                
                                    <div class="col-3" id="fecha_alquiler" >
                                        <label class="form-label" for="basic-default-fullname">Fecha vencimiento alquiler</label>
                                        <input value="{{$expediente->detalleInmueble->fecha_venc_alquiler}}" type="date" name="fecha_vencimiento_alquiler" class="form-control" id="fechaVencimiento" />
                                    </div>
                                </div>
                            
                            {{-- BOTON PARA CARGAR EL PDF DE LA SOLICITUD --}}
                            <div class="col-12 mb-5">
                                <label class="form-label" for="basic-default-fullname">Solicitud</label>
                                @if ($expediente->pdf_solicitud)
                                    <p class="p-0 m-0" name="pdf_solicitud">PDF solicitud cargado: <a class="my-3 btn btn-danger btn-sm" href="{{ url($expediente->pdf_solicitud) }}" target="blank_" >Ver PDF</a></p>
                                @endif
                                <label class="form-label" for="basic-default-fullname">Cargar uno nuevo</label>
                                <input type="file" name="pdf_solicitud_nueva" class="form-control @error('pdf_solicitud_nueva') is-invalid @enderror" class="form-control-file" id="basic-default-nombreCompleto" />
                                @error('pdf_solicitud')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            {{-- BIENES DE USO Y OBSERVACIONES GENERALES --}}
                            <div class="col-12 mb-3">
                                <label class="form-label" for="basic-default-fullname">Bienes de uso</label>
                                <textarea value="{{$expediente->bienes_de_uso}}" placeholder="Detalle de bienes de uso.." name="bienes_de_uso" class="form-control" id="basic-default-nombreCompleto"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="basic-default-fullname">Observaciones Generales</label>
                                <textarea value="{{$expediente->observaciones_grales}}" placeholder="Observaciones.." name="observaciones_grales" class="form-control" id="basic-default-nombreCompleto"></textarea>
                            </div>
                            <button type="submit" class="mt-4 btn btn btn-success btn-salir">Siguiente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('footer.footer')
