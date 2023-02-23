<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Mostrar Estado civil</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Actualizando un expediente</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('expedientes-actualizar')}}">
                            @csrf
                            <input type="hidden" name="expediente_id" value="{{$expediente->id}}">


                            
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tipo de documento</label>
                                <select name="tipo_dni_id" class="form-control" id="basic-default-nombreCompleto" >
                                    @foreach($tipos as $tipo)
                                        <option value="{{$tipo->id}}" @if($tipo->id == $contribuyente->tipo_dni_id) selected @endif>{{$tipo->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Estado civìl</label>
                                <select name="estado_civil_id" class="form-control" id="basic-default-nombreCompleto" >
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}" @if($estado->id == $contribuyente->estado_civil_id) selected @endif>{{$estado->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Cuit</label>
                                <input required type="text" name="cuit" class="form-control" id="basic-default-nombreCompleto" value="{{$contribuyente->cuit}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Ingresos brutos</label>
                                <input required type="text" name="ingresos_brutos" class="form-control" id="basic-default-nombreCompleto" value="{{$contribuyente->ingresos_brutos}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nombre</label>
                                <input required type="text" name="nombre" class="form-control" id="basic-default-nombreCompleto" value="{{$contribuyente->nombre}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Apellido</label>
                                <input required type="text" name="apellido" class="form-control" id="basic-default-nombreCompleto" value="{{$contribuyente->apellido}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nùmero de documento</label>
                                <input required type="text" name="dni" class="form-control" id="basic-default-nombreCompleto" value="{{$contribuyente->dni}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Fecha de nacimiento</label>
                                <input required type="text" name="fecha_nacimiento" class="form-control" id="basic-default-nombreCompleto" value="{{$contribuyente->fecha_nacimiento}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Telèfono</label>
                                <input type="text" name="telefono" class="form-control" id="basic-default-nombreCompleto" value="{{$contribuyente->telefono}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nombre del cònyuge</label>
                                <input type="text" name="nombre_conyuge" class="form-control" id="basic-default-nombreCompleto" value="{{$contribuyente->nombre_conyuge}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Apellido del cònyuge</label>
                                <input type="text" name="apellido_conyuge" class="form-control" id="basic-default-nombreCompleto" value="{{$contribuyente->apellido_conyuge}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Dni del conyuge</label>
                                <input type="text" name="dni_conyuge" class="form-control" id="basic-default-nombreCompleto" value="{{$contribuyente->dni_conyuge}}"/>
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                </div>
            </div>
        </div>
    </body>
</html>
