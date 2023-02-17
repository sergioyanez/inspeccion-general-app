<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Catastro</title>
    </head>
    <body>
        <h4>Catastro de la aplicacion</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <a href="{{route('catastros-crear')}}" class="btn btn-primary">Crear nuevo catastro</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>CIRCUNSCRIPCION</th>
                            <th>SECCION</th>
                            <th>CHACRA</th>
                            <th>QUINTA</th>
                            <th>FRACCION</th>
                            <th>MANZANA</th>
                            <th>PARCELA</th>
                            <th>SUB PARCELA</th>
                            <th>OBSERVACION</th>
                            <th>FECHA INFORME</th>
                            <th>PDF INFORME</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($catastros as $catastro)
                            <tr>
                                <td>{{$catastro->circunscripcion}}</td>
                                <td>{{$catastro->seccion}}</td>
                                <td>{{$catastro->chacra}}</td>
                                <td>{{$catastro->quinta}}</td>
                                <td>{{$catastro->fraccion}}</td>
                                <td>{{$catastro->manzana}}</td>
                                <td>{{$catastro->parcela}}</td>
                                <td>{{$catastro->sub_parcela}}</td>
                                <td>{{$catastro->observacion}}</td>
                                <td>{{$catastro->fecha_informe}}</td>
                                <td>{{$catastro->pdf_informe}}</td>
                                <td>{{$catastro->created_at}}</td>
                                <td><a href="{{route('catastros-mostrar', $catastro->id)}}"class="btn btn-warning">Editar</a></td>
                                <td><a href="{{route('catastros-eliminar', $catastro->id)}}"class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
