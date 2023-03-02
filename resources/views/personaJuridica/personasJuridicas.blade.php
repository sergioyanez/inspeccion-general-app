<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Personas Juridicas</title>
    </head>
    <body>
        <h4>Personas Juridicas de la aplicacion</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <a href="{{route('personasJuridicas-crear')}}" class="btn btn-primary">Crear nueva Persona Jurídica</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>CUIT</th>
                            <th>NOMBRE REPRESENTANTE</th>
                            <th>APELLIDO REPRESENTANTE</th>
                            <th>DNI REPRESENTANTE</th>
                            <th>TELEFONO</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($personasJuridicas as $personaJuridica)
                            <tr>
                                <td>{{$personaJuridica->cuit}}</td>
                                <td>{{$personaJuridica->nombre_representante}}</td>
                                <td>{{$personaJuridica->apellido_representante}}</td>
                                <td>{{$personaJuridica->dni_representante}}</td>
                                <td>{{$personaJuridica->telefono}}</td>
                                <td><a href="{{route('personasJuridicas-mostrar', $personaJuridica->id)}}"class="btn btn-warning">Editar</a></td>
                                <td><a href="{{route('personasJuridicas-eliminar', $personaJuridica->id)}}"class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
