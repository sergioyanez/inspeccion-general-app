<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Crear Detalles de habilitaciones</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Creando un nuevo detalle de habilitacion</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detallesHabilitaciones-guardar') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tipo de habilitacion</label>
                                <select name="tipo_habilitacion_id" class="form-control" id="basic-default-tipoHabilitacioId">
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tipo de estado</label>
                                <select name="tipo_estado_id" class="form-control" id="basic-default-tipoEstadoId">
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Fecha de Vencimiento</label>
                                <input required type="date" name="fecha_vencimiento" class="form-control"
                                    id="basic-default-fechaVencimientoId" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Fecha primera habilitacion</label>
                                <input required type="date" name="fecha_primer_habilitacion" class="form-control"
                                    id="basic-default-primerhabilitacionId" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Pdf certificado de Habilitacion</label>
                                <input required type="text" name="pdf_certificado_habilitacion" class="form-control"
                                    id="basic-default-pdfCertificado" />
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
