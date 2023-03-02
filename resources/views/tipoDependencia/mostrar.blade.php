<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Mostrar Tipos de Dependencias</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Actualizando un nuevo tipo de dependencia</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('tiposDependencias-actualizar')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$tipoDependencia->id}}">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tipo de dependencia</label>
                                <input required type="text" name="nombre" class="form-control" id="basic-default-Tipo-de-dependencia" value="{{$tipoDependencia->nombre}}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
