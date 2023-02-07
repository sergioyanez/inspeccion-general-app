<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link rel="stylesheet" href="resources/css/app.css">

</head>
<body>
    <h4>Administrar usuarios</h4>
    <div>
        <div>
            <a href="{{route('usuarios-crear')}}">Crear nuevo usuario</a>

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

</body>
</html>
