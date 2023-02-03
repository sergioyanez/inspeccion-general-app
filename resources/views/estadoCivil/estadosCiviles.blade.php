<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estados Civiles</title>
</head>
<body>
    <h4>Estados civiles  de la aplicacion</h4>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <a href="{{route('estadosCiviles-crear')}}" class="btn btn-primary">Crear nuevo estado civil</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>ESTADO CIVIL</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($estadosCiviles as $estadoCivil)
                        <tr>
                            <td>{{$estadoCivil->descripcion}}</td>
                            <td><a href="{{route('estadosCiviles-mostrar', $estadoCivil->id)}}">Editar</a></td>
                            <td><a href="{{route('estadosCiviles-eliminar', $estadoCivil->id)}}">Eliminar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</body>
</html>



