<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Estados Habilitaciones</title>
</head>
<body>
    <h4>Estados de Habilitacion de la aplicacion</h4>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <a href="{{route('tiposEstadosHabilitacion-crear')}}" class="btn btn-primary">Crear nuevo estado de habilitación</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>TIPOS DE ESTADOS DE HABILITACION</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($estadosHabilitacion as $estadohabilitacion)
                        <tr>
                            <td>{{$estadohabilitacion->descripcion}}</td>
                            <td>{{$estadohabilitacion->created_at}}</td>
                            <td><a href="{{route('tiposEstadosHabilitacion-mostrar', $estadohabilitacion->id)}}"class="btn btn-warning">Editar</a></td>
                            <td><a href="{{route('tiposEstadosHabilitacion-eliminar', $estadohabilitacion->id)}}"class="btn btn-danger">Eliminar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</body>
</html>



