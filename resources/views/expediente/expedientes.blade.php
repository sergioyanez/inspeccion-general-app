<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Crear Expediente</title>
    </head>
    <body>
<h4>Expedientes de la aplicaciçon</h4>

<div class="card">
    <div class="table-responsive text-nowrap">
        <a href="{{route('expedientes-crear')}}" class="btn btn-primary">Crear nuevo expediente</a>


        <table class="table">
            <thead>
                <tr>
                    <th> CATASTRO</th>
                    <th> ESTADO DE BAJA</th>
                    <th> Nº EXPEDIENTE</th>
                    <th> Nº DE COMERCIO</th>
                    <th> ACTIVIDAD PRINCIPAL</th>
                    <th> ANEXO</th>
                    <th> PDF SOLICITUD</th>
                    <th> BIENES DE USO</th>
                    <th> OBSERVACIONES</th>
                    <th> DETALLE HABILITACION</th>
                    <th> DETALLE INMUEBLE</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($expedientes as $expediente)
                    <tr>
                        <td>{{$expediente->catastro_id}}</td>
                        <td>{{$expediente->estado_baja_id}}</td>
                        <td>{{$expediente->nro_expediente}}</td>
                        <td>{{$expediente->nro_comercio}}</td>
                        <td>{{$expediente->actividad_ppal}}</td>
                        <td>{{$expediente->anexo}}</td>
                        <td>{{$expediente->pdf_solicitud}}</td>
                        <td>{{$expediente->bienes_de_uso}}</td>
                        <td>{{$expediente->observaciones_grales}}</td>
                        <td>{{$expediente->detalle_habilitacion_id}}</td>
                        <td>{{$expediente->detalle_inmueble_id}}</td>
                        <td><a href="{{route('expedientes-mostrar', $expediente->id)}}">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>










        <h2>REALIZAR BUSQUEDA</h2>
        <form action="{{route('expedientes')}}" method="get">
            <div>
                <input type="text" name="buscarporcomercio" placeholder="Nº comercio o contribuyente"/>
                <!--<input type="text" name="buscarporcontribuyente" class="form-control" placeholder="Contribuyente"/>-->
                <input type="submit" value="Buscar">
            </div>

        </form>

        @if(request('buscarporcomercio'))
            <table class="table">
                <thead>
                    <tr>
                        <th>Nº DE COMERCIO</th>
                        <th>CONTRIBUYENTE</th>
                        <th>OBSERVACIONES/DETALLES</th>
                        <th>DETALLE DE LA HABILITACION</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @forelse($expedientes as $expediente)
                        <tr>
                            <td>{{$expediente->nro_comercio}}</td>
                            <td>
                                @foreach($expediente->contribuyentes as $registro)
                                    {{$registro->nombre}}
                                    {{$registro->apellido}}
                                    -
                                @endforeach

                                @foreach($expediente->personasJuridicas as $registro1)
                                    {{$registro1->nombre_representante}}
                                    {{$registro1->apellido_representante}}
                                    -
                                @endforeach
                            </td>
                            <td>{{$expediente->observaciones_grales}}</td>
                            <td>{{$expediente->detalleHabilitacion->tipoHabilitacion->descripcion}}</td>
                            <td><a href="{{route('expedientes-mostrar', $expediente->id)}}">Ver màs</a></td>
                        </tr>
                    @empty
                        <h2>No se encontraron Expedientes</h2>
                    @endforelse
                </tbody>
            </table>
        @endif
    </div>
</div>
</body>
</html>
