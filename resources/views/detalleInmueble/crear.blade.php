<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Crear Detalles de inmuebles</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Creando un nuevo detalle de inmueble</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detallesInmuebles-guardar') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Inmueble ID</label>
                                <select name="inmueble_id" class="form-control" id="basic-default-inmueble_id">
                                    @foreach ($inmuebles as $inmueble)
                                        <option value="{{ $inmueble->id }}">{{ $inmueble->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tipo de inmuebles</label>
                                <select name="tipo_inmueble_id" class="form-control" id="basic-default-tipoEstadoId">
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Fecha de Vencimiento Alquiler</label>
                                <input  type="date" name="fecha_venc_alquiler" class="form-control"
                                    id="basic-default-fechaVencimientoId" />
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
