<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar Detalle de inmueble</title>
</head>

<body>
<div class="row">

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Actualizando un  detalle de inmueble</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('detallesInmuebles-actualizar')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$detalleInmueble->id}}">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Inmueble ID</label>
                        <select name="inmueble_id" class="form-control" id="basic-default-nombreCompleto" >
                            @foreach($inmuebles as $inmueble)
                                <option value="{{$inmueble->id}}"
                                    @if($inmueble->id == $detalleInmueble->inmueble_id) selected @endif>{{$inmueble->id}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tipo de Inmueble</label>
                        <select name="tipo_inmueble_id" class="form-control" id="basic-default-nombreCompleto" >
                            @foreach($tipos as $tipo)
                                <option value="{{$tipo->id}}"
                                    @if($tipo->id == $detalleInmueble->tipo_inmueblen_id) selected @endif>{{$tipo->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Fecha de vencimiento alquiler</label>
                        <input required type="date" name="fecha_venc_alquiler" class="form-control" id="basic-default-fechaVencimiento" value="{{$detalleInmueble->fecha_venc_alquiler}}"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

</div>
