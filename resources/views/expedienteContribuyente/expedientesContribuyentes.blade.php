<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Expedientes-Contribuyentes</title>
    </head>
    <body>
        <h4>Expedientes-Contribuyentes de la aplicacion</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <a href="{{ route('expedientesContribuyentes-crear') }}" class="btn btn-primary">Crear nuevo expediente-contribuyente</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>EXPEDIENTE</th>
                            <th>CONTRIBUYENTE </th>
                            <th>CREATE_AT</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($expedientesContribuyentes as $expedienteContribuyente)
                            <tr>
                                {{-- <td>{{ $expedienteContribuyente->expediente->nro_expediente }}</td>
                                <td>{{ $expedienteContribuyente->contribuyente->apellido }}</td> --}}
                                <td>{{ $expedienteContribuyente->expediente_id }}</td>
                                <td>{{ $expedienteContribuyente->contribuyente_id }}</td>
                                <td>{{ $expedienteContribuyente->created_at }}</td>
                                <td><a href="{{ route('expedientesContribuyentes-mostrar', $expedienteContribuyente->id) }}"class="btn btn-warning">Editar</a></td>
                                <td><a href="{{ route('expedientesContribuyentes-eliminar', $expedienteContribuyente->id) }}"class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
