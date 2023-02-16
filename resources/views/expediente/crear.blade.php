<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Crear Estados civiles</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Registrar expediente</h2>
                    </div>
                    <div class="card-body">
                        <!--ACA PODRIA IR UN INPUT OCULTO CON EL ID DEL PROX EXPEDIENTE A GUARDAR-->
                        <form method="GET" action="{{route('contribuyentes-buscar')}}">
                            @csrf
                            <div class="mb-3">
                                <label>Buscar contribuyente</label>
                                <input  type="text" name="buscarpor" class="form-control" placeholder="Nùmero de documento" autofocus/>
                                <input type="submit" value="Buscar">
                            </div>
                        </form>

                        <form method="GET" action="{{route('personasJuridicas-buscar')}}">
                            @csrf
                            <div class="mb-3">
                                <label>Buscar persona jurìdica</label>
                                <input  type="text" name="buscarpor1" class="form-control" placeholder="Nùmero de documento"/>
                                <input type="submit" value="Buscar">
                            </div>
                        </form>


                            <!--UNA FORMA DE QUE TE TRAIGA SOLO UNO ES BUSCAR POR DNI-->
                            <form method="POST" action="{{ route('expedientes-guardar') }}">
                            @csrf
                            @isset($contribuyentes)
                                @if ($contribuyentes != null and count($contribuyentes) == 1 and request('buscarpor'))
                                <label class="form-label" for="basic-default-fullname">Titulares personas fisicas:</label>
                                    @foreach ($contribuyentes as $contribuyente)
                                        <td>{{$contribuyente->nombre}}</td>
                                        <td>{{$contribuyente->apellido}}</td>
                                        <td>{{$contribuyente->dni}}</td>
                                        <div class="mb-3">
                                            <label name="contribuyente_id">{{$contribuyente->id}}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label name="idExpSiguiente">{{$expedienteID->id+1}}</label>
                                        </div>
                                        {{-- <a class="btn btn-secondary btn-sm float-right"  href="{{route('expedientesContribuyentes-createEnExpediente',['expediente_id' => $expedienteID->id+1,'contribuyente_id' => $contribuyente->id])}}">Guardar</a> --}}
                                    @endforeach
                                @else
                                    @if (request('buscarpor'))
                                        <h4>No se encontrò el contribuyente</h4>
                                        <a href="{{route('contribuyentes-crearEnExpediente')}}" class="btn btn-primary">Crear nuevo contribuyente para el expediente</a>
                                    @endif

                                @endif
                            @endisset

                            @isset($personasJuridicas)
                                @if ($personasJuridicas != null and count($personasJuridicas) == 1 and request('buscarpor1'))
                                <label class="form-label" for="basic-default-fullname">Titulares personas jurìdicas:</label>
                                    @foreach ($personasJuridicas as $pj)
                                        <td>{{$pj->nombre_representante}}</td>
                                        <td>{{$pj->apellido_representante}}</td>
                                        <td>{{$pj->dni_representante}}</td>
                                        <input type="text" name="pj_id" value="{{ $pj->id }}">
                                    @endforeach
                                @else
                                    @if (request('buscarpor1'))
                                        <h4>No se encontrò la persona jurìdica</h4>
                                        <a href="{{route('personasJuridicas-crearEnExpediente')}}" class="btn btn-primary">Crear persona jurìdica para el expediente</a>
                                    @endif

                                @endif
                            @endisset
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nùmero de expediente</label>
                                <input value="4093-" type="text" name="nro_expediente" class="form-control" id="basic-default-nombreCompleto" />
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

                            {{-- <div>
                                <label class="form-label" for="basic-default-fullname">Estado habilitacion</label>
                                <input  type="text" name="detalle_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" />
                            </div> --}}
                            <div>
                                <label class="form-label" for="basic-default-fullname">Observaciones</label>
                                <input  type="text" name="observaciones_grales" class="form-control" id="basic-default-nombreCompleto" />
                            </div>

<<<<<<< HEAD
                    @isset($personasJuridicas)
                        @if ($personasJuridicas != null and count($personasJuridicas) == 1 and request('buscarpor1'))
                        <label class="form-label" for="basic-default-fullname">Titulares personas jurìdicas:</label>
                            @foreach ($personasJuridicas as $pj)
                                <td>{{$pj->nombre_representante}}</td>
                                <td>{{$pj->apellido_representante}}</td>
                                <td>{{$pj->dni_representante}}</td>
                                <input type="text" name="pj_id" value="{{ $pj->id }}">
                                <input type="text" name="idExpSiguiente" value="{{ $expedienteID->id+1 }}">
                            @endforeach
                        @else
                            @if (request('buscarpor1'))
                                <h4>No se encontrò la persona jurìdica</h4>
                                <a href="{{route('personasJuridicas-crearEnExpediente')}}" class="btn btn-primary">Crear persona jurìdica para el expediente</a>
                            @endif
=======
                            <button type="submit" class="btn btn-primary">Enviar</button>
>>>>>>> sergio

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
