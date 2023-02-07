<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Inmuebles</title>
</head>

<body>
    <div class="row">

        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Creando un nuevo inmueble</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('inmuebles-guardar') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Calle</label>
                            <input required type="text" name="calle" class="form-control"
                                id="basic-default-inmuebleCalle" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Número</label>
                            <input required type="text" name="numero" class="form-control"
                                id="basic-default-inmuebleNumero" />
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
