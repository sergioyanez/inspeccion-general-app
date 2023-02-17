<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Detalles de inmuebles</title>
    </head>
    <body>
        <h4>Detalles de inmuebles de la aplicacion</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <a href="{{ route('detallesInmuebles-crear') }}" class="btn btn-primary">Crear nuevo detalle de
                    inmueble</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>INMUEBLE ID</th>
                            <th>TIPO INMUEBLE </th>
                            <th>FECHA VENCIMIENTO ALQUILER</th>
                            <th>CREATE_AT</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($detallesInmuebles as $detalleInmueble)
                            <tr>
                                <td>{{ $detalleInmueble->Inmueble->id }}</td>
                                <td>{{ $detalleInmueble->tipoInmueble->descripcion }}</td>
                                <td>{{ $detalleInmueble->fecha_venc_alquiler }}</td>
                                <td>{{ $detalleInmueble->created_at }}</td>
                                <td><a href="{{ route('detallesInmuebles-mostrar', $detalleInmueble->id) }}"class="btn btn-warning">Editar</a></td>
                                <td><a href="{{ route('detallesInmuebles-eliminar', $detalleInmueble->id) }}"class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
