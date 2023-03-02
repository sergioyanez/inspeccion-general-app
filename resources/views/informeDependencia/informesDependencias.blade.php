<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Informe de dependencias</title>
    </head>
    <body>
        <h4>Informes de dependencias de la aplicacion</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <a href="{{ route('informesDependencias-crear') }}" class="btn btn-primary">Crear nuevo informe de
                    dependencia</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Expediente</th>
                            <th>Tipo de dependencia </th>
                            <th>pdf del informe</th>
                            <th>Fecha  del informe</th>
                            <th>Observaciones</th>
                            <th>CREATED_AT</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($informesDependencias as $informeDependencia)
                            <tr>
                                <td>{{ $informeDependencia->expediente->nro_expediente }}</td>
                                <td>{{ $informeDependencia->tipoDependencia->nombre }}</td>
                                <td>{{ $informeDependencia->pdf_informe }}</td>
                                <td>{{ $informeDependencia->fecha_informe }}</td>
                                <td>{{ $informeDependencia->observaciones }}</td>
                                <td>{{ $informeDependencia->created_at }}</td>
                                <td><a href="{{ route('informesDependencias-mostrar', $informeDependencia->id) }}"class="btn btn-warning">Editar</a></td>
                                <td><a href="{{ route('informesDependencias-eliminar', $informeDependencia->id) }}"class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
