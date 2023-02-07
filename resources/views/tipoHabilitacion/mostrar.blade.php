<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Actualizar Tipos de Habilitaciones</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Actualizando un tipo de habilitación</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('tiposHabilitaciones-actualizar')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$tipoHabilitacion->id}}">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tipo de habilitación</label>
                                <input required type="text" name="descripcion" class="form-control" id="basic-default-Tipo de estado de habilitacion" value="{{$tipoHabilitacion->descripcion}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Plazo de vencimiento</label>
                                <input required type="text" name="plazo_vencimiento" class="form-control" id="basic-default-plazo_vencimiento" value="{{$tipoHabilitacion->plazo_vencimiento}}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
