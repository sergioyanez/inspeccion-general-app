<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Inmuebles</title></head>
    <body>
        <h4>Inmuebles de la aplicacion</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <a href="{{ route('inmuebles-crear') }}" class="btn btn-primary">Crear nuevo inmueble</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>CALLE</th>
                            <th>NUMERO</th>
                            <th>CREATED_AT</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($inmuebles as $inmueble)
                            <tr>
                                <td>{{ $inmueble->calle }}</td>
                                <td>{{ $inmueble->numero }}</td>
                                <td>{{ $inmueble->created_at }}</td>
                                <td><a href="{{ route('inmuebles-mostrar', $inmueble->id) }}"class="btn btn-warning">Editar</a></td>
                                <td><a href="{{ route('inmuebles-eliminar', $inmueble->id) }}"class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
