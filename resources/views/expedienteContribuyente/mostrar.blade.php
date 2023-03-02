<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Mostrar Detalles de habilitaciones</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Actualizando un nuevo detalle de habilitacion</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('expedientesContribuyentes-actualizar')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$expedienteContribuyente->id}}">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Expediente</label>
                                <select name="expediente_id" class="form-control" id="basic-default-nombreCompleto" >
                                    @foreach($expedientes as $expediente)
                                        <option value="{{$expediente->id}}"
                                            @if($expediente->id == $expedienteContribuyente->expediente_id) selected @endif>{{$expediente->nro_expediente}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Contribuyente</label>
                                <select name="contribuyente_id" class="form-control" id="basic-default-nombreCompleto" >
                                    @foreach($contribuyentes as $contribuyente)
                                        <option value="{{$contribuyente->id}}"
                                            @if($contribuyente->id == $expedienteContribuyente->contribuyente_id) selected @endif>{{$contribuyente->apellido}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
