<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <form method="POST" action="{{route('detallesHabilitaciones-actualizar')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$detalleHabilitacion->id}}">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tipo de estado</label>
                        <select name="tipo_estado_id" class="form-control" id="basic-default-nombreCompleto" >
                            @foreach($estados as $estado)
                                <option value="{{$estado->id}}"
                                    @if($estado->id == $detalleHabilitacion->tipo_estado_id) selected @endif>{{$estado->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tipo de Habilitacion</label>
                        <select name="tipo_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" >
                            @foreach($tipos as $tipo)
                                <option value="{{$tipo->id}}"
                                    @if($tipo->id == $detalleHabilitacion->tipo_habilitacion_id) selected @endif>{{$tipo->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Fecha de vencimiento</label>
                        <input required type="date" name="fecha_vencimiento" class="form-control" id="basic-default-fechaVencimiento" value="{{$detalleHabilitacion->fecha_vencimiento}}"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Fecha primer habilitacion</label>
                        <input required type="date" name="fecha_primer_habilitacion" class="form-control" id="basic-default-fechaPrimerHabilitacion" value="{{$detalleHabilitacion->fecha_primer_habilitacion}}"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Pdf certificado habilitacion</label>
                        <input required type="url" name="pdf_certificado_habilitacion" class="form-control" id="basic-default-pdfCertificado" value="{{$detalleHabilitacion->pdf_certificado_habilitacion}}"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

</div>
