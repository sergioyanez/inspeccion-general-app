<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Estados de baja</title>
    </head>
    <body>
        <h4>Estados de baja  de la aplicacion</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <a href="{{route('estadosBajas-crear')}}" class="btn btn-primary">Crear nuevo estado de baja</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>TIPO DE BAJA</th>
                            <th>DEUDA</th>
                            <th>FECHA DE BAJA</th>
                            <th>PDF ACTA SOLICITUD DE BAJA</th>
                            <th>PDF INFORME DE DEUDA</th>
                            <th>PDF SOLICITUD DE BAJA</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($estadosBajas as $estadoBaja)
                            <tr>
                                <td>{{$estadoBaja->tipo_baja_id}}</td>
                                <td>{{$estadoBaja->deuda}}</td>
                                <td>{{$estadoBaja->fecha_baja}}</td>
                                <td>{{$estadoBaja->pdf_acta_solicitud_baja}}</td>
                                <td>{{$estadoBaja->pdf_informe_deuda}}</td>
                                <td>{{$estadoBaja->pdf_solicitud_baja}}</td>
                                <td><a href="{{route('estadosBajas-mostrar', $estadoBaja->id)}}"class="btn btn-warning">Editar</a></td>
                                <td><a href="{{route('estadosBajas-eliminar', $estadoBaja->id)}}"class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>



