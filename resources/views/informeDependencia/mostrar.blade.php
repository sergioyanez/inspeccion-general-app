<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Mostrar Informe de dependencia</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Actualizando un informe de dependencia</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('informesDependencias-actualizar')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$informeDependencia->id}}">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tipo de dependencia</label>
                                <select name="tipo_dependencia_id" class="form-control" id="basic-default-tipoHabilitacioId">
                                    @foreach ($tiposDependencias as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Expediente</label>
                                <select name="expediente_id" class="form-control" id="basic-default-tipoEstadoId">
                                    @foreach ($expedientes as $expediente)
                                        <option value="{{ $expediente->id }}">{{ $expediente->nro_expediente }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">PDF del Informe</label>
                                <input required type="url" name="pdf_informe" class="form-control"
                                    id="basic-default-fechaVencimientoId" value="{{$informeDependencia->pdf_informe}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Fecha del informe</label>
                                <input required type="date" name="fecha_informe" class="form-control"
                                    id="basic-default-primerhabilitacionId" value="{{$informeDependencia->fecha_informe}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Observaciones</label>
                                <input required type="text" name="observaciones" class="form-control"
                                    id="basic-default-pdfCertificado" value="{{$informeDependencia->observaciones}}" />
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
