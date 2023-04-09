@include('header.header')
    <div class="container mb-3">


        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-6">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="mb-0 h2">Registrar expediente</h1>

                        <form method="POST" action="{{route('generar-expediente-pdf')}}" enctype="multipart/form-data">
                            @csrf
                            @isset($expediente->id)
                                <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
                            @endisset
                            <button type="submit" class="btn btn-primary">Generar Expediente en PDF</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="col-12 row">
                            <div class="col-3 mb-3">
                                <label class="form-label" for="basic-default-fullname">Número de expediente</label>
                                <input readonly value="{{$expediente->nro_expediente}}" type="text" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-12 row">
                            <div class="col-3 mb-3">
                                <label class="form-label" for="basic-default-fullname">Número de comercio</label>
                                <input readonly value="{{$expediente->nro_comercio}}" type="text" name="nro_comercio" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <!--d-flex justify-content-between align-items-center-->
                    <div class="card-body">
                        <div class="">
                            <p class="mb-1"><b>Titulares personas físicas:</b>
                                @if(!isset($expedientesContribuyentes))
                                    <span class="text-muted">Sin personas físicas cargadas..</span>
                                @else
                                    @forelse ($expedientesContribuyentes as $expedContrib)
                                            @if ($expedContrib->expediente_id ==$expediente->id)
                                            <span class="p-2 m-1">
                                                {{$expedContrib->contribuyente->nombre}}  {{$expedContrib->contribuyente->apellido}} /
                                                {{$expedContrib->contribuyente->dni}} <a href="{{route('expedientesContribuyentes-eliminar', $expedContrib->id)}}"class="ms-2 btn btn-danger btn-sm">Eliminar</a>
                                            </span>
                                            @endif
                                        @empty
                                    @endforelse
                                @endif
                                <hr class="p-0 m-0">
                            </p>
                        </div>
                        <div class="row border p-2">
                            {{-- BUSCAR UN CONTRIBUYENTE POR DNI --}}
                            <div class="col-6">
                                <form method="GET" action="{{route('contribuyentes-buscar')}}" class="row">
                                    @csrf
                                    <label class="mb-2 ms-1">Buscar y agregar contribuyente</label>
                                    <div class="col-5 m-0">
                                        <input  type="text" name="buscarpor" class="form-control" placeholder="Número de documento" />
                                    </div>

                                    <div class="col-3 m-0">
                                        <input   class="btn btn-orange" type="submit" value="Buscar">
                                    </div>
                                </form>
                            </div>

                            <div class="col-6">

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
                                                        {{$contribuyente->apellido}} /
                                                        {{$contribuyente->dni}}
                                                        <input type="hidden" name="contribuyente_id" value="{{$contribuyente->id}}">
                                                        <input type="hidden" name="idExpSiguiente" value="{{$expediente->id}}">
                                                        <button class="ms-3 btn-sm btn btn-primary"type="submit">Agregar</button>
                                                    </li>

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
                                                <h4 class="card p-4">No se encontró el contribuyente</h4>
                                                <a href="{{route('contribuyentes-crearEnExpediente')}}" class="btn btn-violet">Crear nuevo contribuyente</a>
                                            @endif

                                        @endif
                                    @endisset
                                </form>
                            </div>

                        </div>

                        <div class="mt-5">
                            <p class="mb-1"><b>Titulares personas jurídicas:</b>
                                @if(!isset($expedientesPersonasJuridicas))
                                    <span class="text-muted">Sin personas jurídicas cargadas..</span>
                                @else
                                    @forelse ($expedientesPersonasJuridicas as $expedPersJurid)
                                            @if ($expedPersJurid->expediente_id ==$expediente->id)
                                            <span class="p-2 m-1">  {{$expedPersJurid->personaJuridica->nombre_persona_juridica}} / {{$expedPersJurid->personaJuridica->cuit}}
                                               <a  href="{{route('expedientesPersonasJuridicas-eliminar', $expedPersJurid->id)}}"class="ms-2 btn btn-danger btn-sm">Eliminar</a>
                                            </span>
                                            @endif
                                        @empty
                                    @endforelse
                                @endif
                                <hr class="p-0 m-0">
                            </p>
                        </div>

                        <div class="row border p-2">
                            {{-- BUSCAR UNA PERSONA JURIDICA POR DNI --}}
                            <div class="col-6">
                                <form method="GET" action="{{route('personasJuridicas-buscar')}}" class="row">
                                    @csrf
                                    <label class="mb-2 ms-1">Buscar y agregar persona jurídica</label>
                                    <div class="col-5 m-0">
                                        <input  type="text" name="buscarpor1" class="form-control" placeholder="Número de documento, CUIT o CUIL"/>
                                    </div>
                                    <div class="col-3 m-0">
                                        <input  class="btn btn-orange" type="submit" value="Buscar">
                                    </div>
                                </form>
                            </div>

                            <div class="col-6">
                                {{-- MUESTRA LA PERSONA JURIDICA SI LA ENCONTRO Y DA LA OPCION DE AGREGARLA AL EXPEDIENTE
                                O SI NO LA ENCONTRO DA LA OPCION DE CREARLA --}}
                                <form method="POST" action="{{ route('expedientesPersonasJuridicas-guardar') }}">
                                    @csrf
                                    @isset($personasJuridicas)
                                        @if ($personasJuridicas != null and count($personasJuridicas) == 1 and request('buscarpor1'))
                                        <h5 class="mb-3 text-left font-weight">Agregar al expediente la persona jurídica:</h5>
                                            <ul class="list-group">
                                                @foreach ($personasJuridicas as $pj)
                                                <li class="list-group-item list-group-item-action" data-toggle="list">
                                                    {{-- {{$pj->apellido_representante}} / {{$pj->dni_representante}} --}}
                                                    {{$pj->nombre_persona_juridica}} / {{$pj->cuit}}
                                                    <input type="hidden" name="persona_juridica_id" value="{{$pj->id}}">
                                                    <input type="hidden" name="idExpSiguiente" value="{{$expediente->id}}">
                                                    <button class="btn btn-primary ms-3 btn-sm" type="submit">Agregar</button>
                                                </li>
                                                    @foreach ($expedientesPersonasJuridicas as $ec)
                                                        @if($ec->expediente_id == $expediente->id && $ec->persona_juridica_id == $pj->id)
                                                        <p class="text-danger">La persona juridica ya esta cargada en el expediente</p>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        @else
                                            @if (request('buscarpor1'))
                                                <h4 class="card p-4">No se encontró la persona jurídica</h4>
                                                <a href="{{route('personasJuridicas-crearEnExpediente')}}" class="btn btn-violet">Crear nueva persona jurídica</a>
                                            @endif

                                        @endif
                                    @endisset
                                </form>
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
                            @foreach ($expedientesPersonasJuridicas as $epj)
                                @if($epj->expediente_id == $expediente->id)
                                    <input required type="hidden" name="cargo" value="{{$epj->expediente_id}}">
                                @endif
                            @endforeach
                            @error('cargo')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror

                            {{-- @foreach ($expedientesPersonasJuridicas as $epj)
                                @if($epj->expediente_id == $expediente->id)
                                    <input required type="hidden" name="cargo1" value="{{$epj->expediente_id}}">
                                @endif
                            @endforeach
                            @error('cargo1')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror --}}

                            @isset($expediente->id)
                                <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
                            @endisset

                            <input type="hidden" name="nro_expediente" value="{{$expediente->nro_expediente}}">

                            <input type="hidden" name="nro_comercio" value="{{$expediente->nro_comercio}}">

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
                                    <label class="form-label" for="basic-default-fullname">Anexo</label>
                                    <input value="{{$expediente->anexo}}" type="text" name="anexo" class="form-control" id="basic-default-nombreCompleto" />
                                    @error('anexo')

                                        <div>
                                            {{$message}}
                                        </div>
                                    @enderror
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
                            <div class="col-4 mb-5">
                                <label class="form-label" for="basic-default-fullname">Solicitud</label>
                                @if ($expediente->pdf_solicitud)
                                    <p class="p-0 m-0" name="pdf_solicitud">PDF solicitud cargado: <a class="my-3 btn btn-danger btn-sm" href="{{ url($expediente->pdf_solicitud) }}" target="blank_" >Ver PDF</a></p>
                                @endif
                                <label class="form-label text-muted" for="basic-default-fullname">Cargar uno nuevo</label>
                                <input type="file" name="pdf_solicitud_nueva" class="text-muted form-control @error('pdf_solicitud_nueva') is-invalid @enderror" class="form-control-file" id="basic-default-nombreCompleto" />
                                @error('pdf_solicitud')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            {{-- ANTECEDENTES ( antes llamado BIENES DE USO Y OBSERVACIONES GENERALES --}}
                            <div class="col-12 mb-3">
                                <label class="form-label" for="basic-default-fullname">Antecedentes</label>
                                <textarea placeholder="Detalle de antecedentes.." name="bienes_de_uso" class="form-control">{{$expediente->bienes_de_uso}}</textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="basic-default-fullname">Observaciones Generales</label>
                                <textarea cols="40" rows="5" placeholder="Observaciones.." name="observaciones_grales" class="form-control">{{$expediente->observaciones_grales}}</textarea>
                            </div>
                            <button type="submit" class="mt-4 btn btn btn-success btn-salir">Siguiente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('footer.footer')
