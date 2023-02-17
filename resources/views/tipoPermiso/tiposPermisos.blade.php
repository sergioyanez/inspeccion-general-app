<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Tipos de Permisos de usuarios</title>
</head>
<body>
    <h4>Tipos de permisos de usuarios de la aplicacion</h4>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <a href="{{route('tiposPermisos-crear')}}" class="btn btn-primary">Crear nuevo tipo de permiso de usuario</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>TIPOS DE PERMISO DE USUARIO</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($tiposPermisos as $tipoPermiso)
                        <tr>
                            <td>{{$tipoPermiso->tipo}}</td>
                            <td><a href="{{route('tiposPermisos-mostrar', $tipoPermiso->id)}}"class="btn btn-warning">Editar</a></td>
                            <td><a href="{{route('tiposPermisos-eliminar', $tipoPermiso->id)}}"class="btn btn-dnager">Eliminar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</body>
</html>



