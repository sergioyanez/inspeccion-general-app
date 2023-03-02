

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Buscar Contribuyentes</title>
    </head>
    <body>
        <div class="table-responsive text-nowrap">
            <a href="{{route('contribuyentes-crear')}}" class="btn btn-primary">Crear nuevo contribuyente</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>NUMERO DE DOCUMENTO</th>
                        <th>CREADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($contribuyentes as $contribuyente)
                        <tr>
                            <td>{{$contribuyente->nombre}}</td>
                            <td>{{$contribuyente->apellido}}</td>
                            <td>{{$contribuyente->dni}}</td>
                            <td>{{$contribuyente->created_at}}</td>
                            <td><a href="{{route('expedientes-crear')}}">Agregar</a></td>
                        </tr>
                    @empty
                        <h2>No se encontraron contribuyentes</h2>
                    @endforelse
                </tbody>
            </table>
        </div>
    </body>
</html>
