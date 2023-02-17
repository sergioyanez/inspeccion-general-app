
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Crear Usuario</title>
    </head>
    <body>
        <h4>Administrar usuarios</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <a href="{{route('usuarios-crear')}}" class="btn btn-primary">Crear nuevo usuario</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>USUARIO</th>
                            <th>TIPO PERMISO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->usuario}}</td>
                                <td>{{$usuario->tipoPermiso->tipo}}</td>
                                <td><a href="{{route('usuarios-mostrar', $usuario->id)}}">Editar</a>
                                <a href="{{route('usuarios-eliminar', $usuario->id)}}">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            <a href="{{route('pagina_principal')}}" class="btn btn-secondary">Volver</a>
    </body>
</html>
