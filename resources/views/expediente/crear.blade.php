<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Crear Expediente</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Creando un nuevo Expediente</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('estadosCiviles-guardar')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tipo de permiso de usuario</label>
                                <input required type="text" name="descripcion" class="form-control" id="basic-default-Tipo-de-estadoCivil" />
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
