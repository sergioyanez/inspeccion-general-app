<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Tipos de  Habilitaciones</title>
</head>
<body>
    <h4>Tipos de Habilitaciones de la aplicacion</h4>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <a href="{{route('tiposHabilitaciones-crear')}}" class="btn btn-primary">Crear nuevo tipo de habilitación</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>TIPOS  DE HABILITACION</th>
                        <th>PLAZO  DE VENCIMIENTO</th>
                        <th>CREATED_AT</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($tiposHabilitaciones as $tipoHabilitacion)
                        <tr>
                            <td>{{$tipoHabilitacion->descripcion}}</td>
                            <td>{{$tipoHabilitacion->plazo_vencimiento}}</td>
                            <td>{{$tipoHabilitacion->created_at}}</td>
                            <td><a href="{{route('tiposHabilitaciones-mostrar', $tipoHabilitacion->id)}}"class="btn btn-warning">Editar</a></td>
                            <td><a href="{{route('tiposHabilitaciones-eliminar', $tipoHabilitacion->id)}}"class="btn btn-danger">Eliminar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</body>
</html>



