<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de habilitaciones</title>
</head>
<body>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Creando un nuevo contribuyente</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('contribuyentes-guardar') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Tipo de documento</label>
                            <select name="tipo_dni_id" class="form-control" id="basic-default-nombreCompleto">
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Estado civìl</label>
                            <select name="estado_civil_id" class="form-control" id="basic-default-nombreCompleto">
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Cuit</label>
                            <input required type="text" name="cuit" class="form-control"
                                id="basic-default-nombreCompleto" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Ingresos brutos</label>
                            <input required type="text" name="ingresos_brutos" class="form-control"
                                id="basic-default-nombreCompleto" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nombre</label>
                            <input required type="text" name="nombre" class="form-control"
                                id="basic-default-nombreCompleto" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Apellido</label>
                            <input required type="text" name="apellido" class="form-control"
                                id="basic-default-nombreCompleto" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nùmero de documento</label>
                            <input required type="text" name="dni" class="form-control"
                                id="basic-default-nombreCompleto" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Fecha de nacimiento</label>
                            <input required type="text" name="fecha_nacimiento" class="form-control"
                                id="basic-default-nombreCompleto" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Telèfono</label>
                            <input type="text" name="telefono" class="form-control"
                                id="basic-default-nombreCompleto" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nombre del cònyuge</label>
                            <input type="text" name="nombre_conyuge" class="form-control"
                                id="basic-default-nombreCompleto" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Apellido del cònyuge</label>
                            <input type="text" name="apellido_conyuge" class="form-control"
                                id="basic-default-nombreCompleto" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Dni del conyuge</label>
                            <input type="text" name="dni_conyuge" class="form-control"
                                id="basic-default-nombreCompleto" />
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
