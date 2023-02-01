<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estados Habilitaciones</title>
</head>
<body>
    <h4>Estados de Habilitacion de la aplicacion</h4>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <a href="{{route('estadosHabilitacion-crear')}}" class="btn btn-primary">Crear nuevo estado de habilitación</a>

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
                            <td><a href="{{route('estadosHabilitacion-mostrar', $estadohabilitacion->id)}}">Editar</a></td>
                            <td><a href="{{route('estadosHabilitacion-eliminar', $estadohabilitacion->id)}}">Eliminar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</body>
</html>



