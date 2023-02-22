<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Expedientes</title>
    </head>
    <body>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <a href="{{route('expedientes-crear')}}" class="btn btn-primary">Crear nuevo expediente</a>
                @include('header.header')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nº DE COMERCIO</th>
                                <th>CONTRIBUYENTE</th>
                                <th>OBSERVACIONES/DETALLES</th>
                                <th>ESTADO DE LA HABILITACION</th>
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
                                    {{-- <td><a class="btn-btn-danger" href="archivos/{{ $expediente->pdf_solicitud }}" target="blank_">Ver documento</td> --}}
                                    <td>{{$expediente->detalleHabilitacion->tipoHabilitacion->descripcion}}</td>
                                    <td><a href="{{route('expedientes-mostrar', $expediente->id)}}" class="btn btn-warning">Ver màs</></td>
                                </tr>
                            @empty
                                <h2>No se encontraron Expedientes</h2>
                            @endforelse
                        </tbody>
                    </table>

                @include('footer.footer')
            </div>
        </div>
    </body>
</html>
