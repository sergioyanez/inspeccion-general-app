<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Registrar expediente</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Registrar expediente</h2>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('expedientes-guardar') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nùmero de expediente</label>
                                <input value="4093-" type="text" name="nro_expediente" class="form-control" id="basic-default-nombreCompleto" autofocus/>
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


                            <button type="submit" class="btn btn-primary">Comenzar carga de expediente</button>

                            <div class="mb-3">
                                <h2 class=" text-center font-weight">Cargando datos a expediente Número:{{$expediente->nro_expediente}}</h2>
                            </div>


                            <div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Domicilio inmueble/s</label>
                                </div>
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
                                    <select name="tipo_inmueble_id" class="form-control" id="basic-default-nombreCompleto" >
                                        @foreach($tiposInmuebles as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label" for="basic-default-fullname">Fecha vencimiento alquiler</label>
                                    <input type="date" name="fecha_vencimiento_alquiler" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                                <div>
                                    <input placeholder="detalle de bienes de uso" type="text" name="bienes_de_uso" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                                <div>
                                    <input placeholder="OBSERVACIONES GENERALES" type="text" name="observaciones_grales" class="form-control" id="basic-default-nombreCompleto" />
                                </div>
                            </div>
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
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
