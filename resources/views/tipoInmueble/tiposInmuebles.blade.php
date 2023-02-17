<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Tipos de Inmuebles</title>
</head>
<body>
    <h4>Tipos de inmuebles de la aplicacion</h4>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <a href="{{route('tiposInmuebles-crear')}}" class="btn btn-primary">Crear nuevo tipo de inmueble</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>TIPOS DE INMUEBLES</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($tiposInmuebles as $tipoInmueble)
                        <tr>
                            <td>{{$tipoInmueble->descripcion}}</td>
                            <td><a href="{{route('tiposInmuebles-mostrar', $tipoInmueble->id)}}"class="btn btn-warning">Editar</a></td>
                            <td><a href="{{route('tiposInmuebles-eliminar', $tipoInmueble->id)}}"class="btn btn-danger">Eliminar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</body>
</html>



