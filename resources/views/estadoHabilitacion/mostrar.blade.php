<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Crear Tipos de Estados de Habilitaciones</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Actualizando un nuevo estado de habilitación</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('estadosHabilitacion-actualizar')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$estadoHabilitacion->id}}">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tipo de estado de habilitación</label>
                                <input required type="text" name="descripcion" class="form-control" id="basic-default-Tipo de estado de habilitacion" value="{{$estadoHabilitacion->descripcion}}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
