<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipos de Bajas</title>
</head>
<body>
    <h4>Tipos de bajas de la aplicacion</h4>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <a href="{{route('tiposBajas-crear')}}" class="btn btn-primary">Crear nuevo tipo de baja</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>TIPOS DE BAJA</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($tiposBajas as $tipoBaja)
                        <tr>
                            <td>{{$tipoBaja->descripcion}}</td>
                            <td><a href="{{route('tiposBajas-mostrar', $tipoBaja->id)}}">Editar</a></td>
                            <td><a href="{{route('tiposBajas-eliminar', $tipoBaja->id)}}">Eliminar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</body>
</html>



