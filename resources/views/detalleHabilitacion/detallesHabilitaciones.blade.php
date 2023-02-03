<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de habilitaciones</title>
</head>

<body>
    <h4>Detalles de habilitacion de la aplicacion</h4>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <a href="{{ route('detallesHabilitaciones-crear') }}" class="btn btn-primary">Crear nuevo detalle de
                habilitacion</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>TIPO DE HABILITACION</th>
                        <th>ESTADO EN QUE SE ENCUENTRA </th>
                        <th>FECHA VENCIMIENTO</th>
                        <th>FECHA PRIMERA HABILITACION</th>
                        <th>PDF CERTIFICADO HABILITACION</th>
                        <th>CREATE_AT</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($detallesHabilitaciones as $detalleHabilitacion)
                        <tr>
                            <td>{{ $detalleHabilitacion->tipoHabilitacion->descripcion }}</td>
                            <td>{{ $detalleHabilitacion->tipoEstado->descripcion }}</td>
                            <td>{{ $detalleHabilitacion->fecha_vencimiento }}</td>
                            <td>{{ $detalleHabilitacion->fecha_primer_habilitacion }}</td>
                            <td>{{ $detalleHabilitacion->pdf_certificado_habilitacion }}</td>
                            <td>{{ $detalleHabilitacion->created_at }}</td>
                            <td><a href="{{ route('detallesHabilitaciones-mostrar', $detalleHabilitacion->id) }}">Editar</a></td>
                            <td><a href="{{ route('detallesHabilitaciones-eliminar', $detalleHabilitacion->id) }}">Eliminar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
