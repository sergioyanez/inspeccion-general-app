<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Registrar expediente</title>
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Registrar expediente</h2>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('expedientes-guardar') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- PRIMER PARTE DE CARGA DE EXPEDIENTE --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nùmero de expediente</label>
                                <input value="4093-" type="text" name="nro_expediente" class="form-control" id="basic-default-nombreCompleto"/>
                                <input type="submit" value="Ver PDF">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nùmero de comercio</label>
                                <input value="2-"  type="text" name="nro_comercio" class="form-control" id="basic-default-nombreCompleto" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Actividad principal</label>
                                <input  type="text" name="actividad_ppal" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Anexo</label>
                                <input  type="text" name="anexo" class="form-control" id="basic-default-nombreCompleto" />
                            </div>

                            {{-- BOTON PARA COMENZAR CON LA CARGA DEL EXPEDIENTE --}}
                            {{-- <button type="submit" class="btn btn-primary">Comenzar carga de expediente</button> --}}

                            {{-- <div class="mb-3">
                                <h2 class=" text-center font-weight">Cargando datos a expediente Número:{{$expediente->nro_expediente}}</h2>
                            </div> --}}

                            {{-- DATOS DEL INMUEBLE --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">Domicilio inmueble/s</label>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Calle:</label>
                                    <input required type="text" name="calle" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Nº:</label>
                                    <input required type="text" name="numero" class="form-control" id="basic-default-nombreCompleto" />
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
                                    <input type="date" name="fecha_vencimiento_alquiler" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                            </div>
                            {{-- BIENES DE USO Y OBSERVACIONES GENERALES --}}
                            {{-- <div>
                                <input placeholder="detalle de bienes de uso" type="text" name="bienes_de_uso" class="form-control" id="basic-default-nombreCompleto" />
                            </div>
                            <div>
                                <input placeholder="OBSERVACIONES GENERALES" type="text" name="observaciones_grales" class="form-control" id="basic-default-nombreCompleto" />
                            </div> --}}
                            {{-- INFORMES DE DEPENDENCIAS --}}
                            {{-- BOTON PARA CARGAR LA SOLICITUD --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">Solicitud:</label>
                                <input type="file" name="pdf_solicitud" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div>
                            {{-- SECRETARIA DE GOBIERNO --}}
                            {{-- <div>
                                <label class="form-label" for="basic-default-fullname">SECRETARÌA DE GOBIERNO</label>
                                <input required type="text" name="secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_secretaria_gobierno" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div> --}}
                            {{-- CATASTRO --}}
                            {{-- <div>
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
                            </div> --}}
                            {{-- OBRAS PARTICULARES --}}
                            {{-- <div>
                                <label class="form-label" for="basic-default-fullname">OBRAS PARTICULARES</label>
                                <input required type="text" name="obras_particulares" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_obras_particulares" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_obras_particulares" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div> --}}
                            {{-- TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA --}}
                            {{-- <div>
                                <label class="form-label" for="basic-default-fullname">TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA. TASA POR CONSERVACION DE LA RED VIAL</label>
                                <input required type="text" name="alumbrado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_alumbrado" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_alumbrado" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div> --}}
                            {{-- BROMATOLOGÌA --}}
                            {{-- <div>
                                <label class="form-label" for="basic-default-fullname">BROMATOLOGÌA</label>
                                <input required type="text" name="bromatologia" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_bromatologia" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_bromatologia" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div> --}}
                            {{-- TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL --}}
                            {{-- <div>
                                <label class="form-label" for="basic-default-fullname">TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL</label>
                                <input required type="text" name="inspeccion" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_inspeccion" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_inspeccion" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div> --}}
                            {{-- JUZGADO DE FALTAS --}}
                            {{-- <div>
                                <label class="form-label" for="basic-default-fullname">JUZGADO DE FALTAS</label>
                                <input required type="text" name="juzgado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_juzgado" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_juzgado" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div> --}}
                            {{-- BOMBEROS DE POLICÌA DE BUENOS AIRES --}}
                            {{-- <div>
                                <label class="form-label" for="basic-default-fullname">BOMBEROS DE POLICÌA DE BUENOS AIRES</label>
                                <input required type="text" name="bomberos" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_bomberos" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_bomberos" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div> --}}
                            {{-- INSPECCIÒN GENERAL --}}
                            {{-- <div>
                                <label class="form-label" for="basic-default-fullname">INSPECCIÒN GENERAL</label>
                                <input required type="text" name="inspeccion_general" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_inspeccion_general" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_inspeccion_general" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div> --}}
                            {{-- REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS --}}
                            {{-- <div>
                                <label class="form-label" for="basic-default-fullname">REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS</label>
                                <input required type="text" name="deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_deudores_alimentarios" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div> --}}
                            {{-- HISTORIAL DE MODIFICACIONES --}}
                            {{-- <div>
                                <input required type="text" name="deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" placeholder="Historial de modificaciones"/>
                                <label class="form-label" for="basic-default-fullname">Rauch</label>
                                <input type="date" name="fecha_deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" />
                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                <input type="file" name="pdf_deudores_alimentarios" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                            </div> --}}


                            {{-- DETALLE HABILITACION --}}
                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Estado de habilitacion</label>
                                    <select name="estado_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                                        <option>-- Seleccione --</option>
                                        @foreach($tiposEstados as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <label class="form-label" for="basic-default-fullname">Fecha de primer habilitacion</label>
                                    <input type="date" name="fecha_primer_habilitacion" class="form-control" id="basic-default-nombreCompleto" />
                                    <label class="form-label" for="basic-default-fullname">Fecha de vencimiento</label>
                                    <input type="date" name="fecha_vencimiento" class="form-control" id="basic-default-nombreCompleto" />
                                    <label class="form-label" for="basic-default-fullname">Tipo de habilitacion</label>
                                    <select required name="tipo_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                                        <option>-- Seleccione --</option>
                                        @foreach($tiposhabilitaciones as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label" for="basic-default-fullname">Certificado de habilitaciòn</label>
                                    <input type="file" name="certificado_habilitacion" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" /> --}}
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Comenzar carga de expediente</button>
                        </form>

                        <form method="GET" action="{{route('contribuyentes-buscar')}}">
                            @csrf
                            <div class="mb-3">
                                <label>Buscar contribuyente</label>
                                <input  type="text" name="buscarpor" class="form-control" placeholder="Nùmero de documento" />
                                <input  class="btn btn-primary" type="submit" value="Buscar">
                            </div>
                        </form>

                        <div class="position-relative py-5 px-5">
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
                        </div>



                        <form method="GET" action="{{route('personasJuridicas-buscar')}}">
                            @csrf
                            <div class="mb-3">
                                <label>Buscar persona jurìdica</label>
                                <input  type="text" name="buscarpor1" class="form-control" placeholder="Nùmero de documento"/>
                                <input  class="btn btn-primary" type="submit" value="Buscar">
                            </div>
                        </form>
                        <div class="position-relative py-5 px-5">
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

                        <h3 class=" text-center font-weight">Contribuyentes del expediente</h3>
                        <table class="table table-warning table-hover ">
                            <thead>
                                    <tr>
                                        <th>NOMBRE </th>
                                        <th>APELLIDO </th>
                                        <th>DNI </th>
                                        <th>ELIMINAR</th>
                                    </tr>
                            </thead>
                            <tbody>
                                    @foreach ($expedientesContribuyentes as $expedContrib)
                                            @if ($expedContrib->expediente_id ==$expediente->id)
                                                <tr>
                                                    <td>{{$expedContrib->contribuyente->nombre}}</td>
                                                    <td>{{$expedContrib->contribuyente->apellido}}</td>
                                                    <td>{{$expedContrib->contribuyente->dni}}</td>
                                                    <td><a  href="{{route('expedientesContribuyentes-eliminar', $expedContrib->id)}}"class="btn btn-danger">Eliminar</a></td>
                                                </tr>
                                            @endif
                                    @endforeach
                            </tbody>
                        </table>


                        <h3 class=" text-center font-weight">Personas jurìdicas del expediente</h3>
                        <table class="table table-success table-hover">
                            <thead>
                                <tr>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO</th>
                                    <th>DNI</th>
                                    <th>ELIMINAR</th>
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
                        {{-- ARREGLAR ESTA RUTA, TENDRIA QUE IR A ACTUALIZAR EXPEDIENTE --}}
                        <a href="{{route('expedientes-mostrar', $expediente->id)}}" class="btn btn-primary">Seguir con la carga del expediente</a>
                        <a href="{{route('pagina_principal')}}" class="btn btn-primary">Pàgina principal</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
