<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Crear Expediente Contribuyente en expediente</title>
</head>

<body>
    <div class="row">

        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Creando un nuevo Expediente Contribuyente en expediente</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('expedientesContribuyentes-guardarEnExp') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Expediente</label>
                            <select name="expediente_id" class="form-control" id="basic-default-tipoHabilitacioId">

                                    <option >{{ $expediente_id }}</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Contribuyente</label>
                            <select name="contribuyente_id" class="form-control" id="basic-default-tipoEstadoId">

                                    <option >{{ $contribuyente_id }}</option>

                            </select>
                        </div>
                        <div >
                            {{-- <input  type="hidden" name="exped" value="{{$exped}}" /> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
