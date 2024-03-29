<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Tipos de Dni</title>
    </head>
    <body>
        <h4>Tipos de Dni de la aplicacion</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <a href="{{route('dnis-crear')}}" class="btn btn-primary">Crear nuevo tipo de dni</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>TIPOS DE DNI </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($tiposDni as $tipoDni)
                            <tr>
                                <td>{{$tipoDni->descripcion}}</td>
                                <td>{{$tipoDni->created_at}}</td>
                                <td><a href="{{route('dnis-mostrar', $tipoDni->id)}}"class="btn btn-warning">Editar</a></td>
                                <td><a href="{{route('dnis-eliminar', $tipoDni->id)}}"class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>



