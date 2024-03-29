<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Contribuyentes</title>
    </head>
    <body>
        <h4>Contribuyentes en el sistema</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <button href="{{route('contribuyentes-crear')}}" class="btn btn-primary">Crear nuevo contribuyente</button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>TIPO DE DOCUMENTO</th>
                            <th>ESTADO CIVIL</th>
                            <th>CUIT</th>
                            <th>INGRESOS BRUTOS</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>NUMERO DE DOCUMENTO</th>
                            <th>FECHA DE NACIMIENTO</th>
                            <th>TELEFONO</th>
                            <th>NOMBRE CONYUGE</th>
                            <th>APELLIDO CONYUGE</th>
                            <th>DOCUMENTO CONYUGE</th>
                            <th>CREADO</th>
                            <th>ACCIONES</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($contribuyentes as $contribuyente)
                            <tr>
                                <td>{{$contribuyente->TipoDni->descripcion}}</td>
                                <td>{{$contribuyente->EstadoCivil->descripcion}}</td>
                                <td>{{$contribuyente->cuit}}</td>
                                <td>{{$contribuyente->ingresos_brutos}}</td>
                                <td>{{$contribuyente->nombre}}</td>
                                <td>{{$contribuyente->apellido}}</td>
                                <td>{{$contribuyente->dni}}</td>
                                <td>{{$contribuyente->fecha_nacimiento}}</td>
                                <td>{{$contribuyente->telefono}}</td>
                                <td>{{$contribuyente->nombre_conyuge}}</td>
                                <td>{{$contribuyente->apellido_conyuge}}</td>
                                <td>{{$contribuyente->dni_conyuge}}</td>
                                <td>{{$contribuyente->created_at}}</td>
                                <td><a href="{{route('contribuyentes-mostrar', $contribuyente->id)}}"class="btn btn-success">Editar</a></td>
                                <td><a href="{{route('contribuyentes-eliminar', $contribuyente->id)}}"class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        @empty
                            <h2>No hay contribuyentes cargados en el sistema</h2>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
