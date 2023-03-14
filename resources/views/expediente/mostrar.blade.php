@include('header.header')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-6">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            {{-- BUSCAR UN CONTRIBUYENTE POR DNI --}}
                            <form method="GET" action="{{route('contribuyentes-buscar')}}">
                                @csrf
                                <div class="mb-3">
                                    <label>Buscar contribuyente</label>
                                    <input  type="text" name="buscarpor" class="form-control" placeholder="Nùmero de documento" />
                                    <input  class="btn btn-primary" type="submit" value="Buscar">
                                </div>
                            </form>
                            {{-- BUSCAR UNA PERSONA JURIDICA POR DNI --}}
                            <form method="GET" action="{{route('personasJuridicas-buscar')}}">
                                @csrf
                                <div class="mb-3">
                                    <label>Buscar persona jurìdica</label>
                                    <input  type="text" name="buscarpor1" class="form-control" placeholder="Nùmero de documento"/>
                                    <input  class="btn btn-primary" type="submit" value="Buscar">
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
                                    <h5 class=" text-left font-weight">Agregar al expediente el contribuyente:</h5>
                                        @foreach ($contribuyentes as $contribuyente)
                                            <td>{{$contribuyente->nombre}}</td>
                                            <td>{{$contribuyente->apellido}}</td>
                                            <td>{{$contribuyente->dni}}</td>
                                            <input type="hidden" name="contribuyente_id" value="{{$contribuyente->id}}">
                                            <input type="hidden" name="idExpSiguiente" value="{{$expediente->id}}">
                                            <button  class="btn btn-primary"type="submit">Agregar</button>
                                        @endforeach
                                    @else
                                    
                                        @if (request('buscarpor'))
                                            <h4>No se encontrò el contribuyente</h4>
                                            <a href="{{route('contribuyentes-crearEnExpediente')}}" class="btn btn-primary">Crear nuevo contribuyente para el expediente</a>
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
                                    <h5 class=" text-left font-weight">Agregar al expediente la persona jurìdica:</h5>
                                        @foreach ($personasJuridicas as $pj)
                                            <td>{{$pj->nombre_representante}}</td>
                                            <td>{{$pj->apellido_representante}}</td>
                                            <td>{{$pj->dni_representante}}</td>
                                            <input type="hidden" name="persona_juridica_id" value="{{$pj->id}}">
                                            <input type="hidden" name="idExpSiguiente" value="{{$expediente->id}}">
                                            <button class="btn btn-primary" type="submit">Agregar</button>
                                        @endforeach
                                    @else
                                        @if (request('buscarpor1'))
                                            <h4>No se encontrò la persona jurìdica</h4>
                                            <a href="{{route('personasJuridicas-crearEnExpediente')}}" class="btn btn-primary">Crear persona jurìdica para el expediente</a>
                                        @endif

                                    @endif
                                @endisset
                            </form>
                        </div>

                        <div>
                            {{-- MUESTRA EL/LOS CONTRIBUYENTES AGREGADOS AL EXPEDIENTE --}}
                            <h3>Contribuyentes del expediente</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>NOMBRE  </th>
                                        <th>APELLIDO  </th>
                                        <th>DNI  </th>
                                        <th>ACCIÒN  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($expedientesContribuyentes as $expedContrib)
                                        @if ($expedContrib->expediente_id ==$expediente->id)
                                            <tr>
                                                <td>{{$expedContrib->contribuyente->nombre}}</td>
                                                <td>{{$expedContrib->contribuyente->apellido}}</td>
                                                <td>{{$expedContrib->contribuyente->dni}}</td>
                                                <td><a  href="{{route('expedientesContribuyentes-eliminar', $expedContrib->id)}}"class="btn btn-danger">Eliminar</a></td>
                                            </tr>
                                        @endif
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- MUESTRA LA/LAS PERSONAS JURIDICAS AGREGADAS AL EXPEDIENTE --}}
                            <h3 >Personas jurìdicas del expediente</h3>
                            <table >
                                <thead>
                                    <tr>
                                        <th>NOMBRE  </th>
                                        <th>APELLIDO  </th>
                                        <th>DNI  </th>
                                        <th>ACCIÒN  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expedientesPersonasJuridicas as $expedPersJurid)
                                        @if ($expedPersJurid->expediente_id ==$expediente->id)
                                            <tr>
                                                <td>{{$expedPersJurid->personaJuridica->nombre_representante}}</td>
                                                <td>{{$expedPersJurid->personaJuridica->apellido_representante}}</td>
                                                <td>{{$expedPersJurid->personaJuridica->dni_representante}}</td>
                                                <td><a  href="{{route('expedientesPersonasJuridicas-eliminar', $expedPersJurid->id)}}"class="btn btn-danger">Eliminar</a></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    {{-- PRIMER PARTE DE CARGA DE EXPEDIENTE. PRIMER PAGINA DEL FIGMA --}}
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
                                            <option value="{{$tipo->id}}" @if($tipo->id == $expediente->detalleInmueble->tipoInmueble->id) selected @endif>{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="fecha_alquiler" >
                                    <label class="form-label" for="basic-default-fullname">Fecha vencimiento alquiler</label>
                                    <input value="{{$expediente->detalleInmueble->fecha_venc_alquiler}}" type="date" name="fecha_vencimiento_alquiler" class="form-control" id="fechaVencimiento" />
                                </div>
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
                            <button type="submit" class="btn btn-primary">Siguiente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('footer.footer')
