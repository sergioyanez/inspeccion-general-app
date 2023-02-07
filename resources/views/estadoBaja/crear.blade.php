<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Crear Estado de baja</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Creando un nuevo de baja</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('estadosBajas-guardar')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tipo de baja</label>
                                <select name="tipo_baja_id" class="form-control" id="basic-default-tipo_baja_id">
                                    @foreach ($tiposBajas as $tipoBaja)
                                        <option value="{{ $tipoBaja->id }}">{{ $tipoBaja->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Deuda</label>
                                <input required type="double" name="deuda" class="form-control" id="basic-default-deuda" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Fecha de baja</label>
                                <input required type="date" name="fecha_baja" class="form-control" id="basic-default-fecha_baja" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">PDF acta solicitud de baja</label>
                                <input required type="url" name="pdf_acta_solicitud_baja" class="form-control" id="basic-default-pdf_acta_solicitud_baja" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">PDF informe de deuda</label>
                                <input required type="url" name="pdf_informe_deuda" class="form-control" id="basic-default-pdf_informe_deuda" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">PDF solicitud de baja</label>
                                <input required type="url" name="pdf_solicitud_baja" class="form-control" id="basic-default-pdf_solicitud_baja" />
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
