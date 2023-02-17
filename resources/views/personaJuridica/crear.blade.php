<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Crear Persona Juridica</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Creando una Persona Jurídica</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('personasJuridicas-guardar')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Cuit</label>
                                <input required type="text" name="cuit" class="form-control" id="basic-default-cuit" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nombre del Representante</label>
                                <input required type="text" name="nombre_representante" class="form-control" id="basic-default-nombreRepre" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Apellido del Representante</label>
                                <input required type="text" name="apellido_representante" class="form-control" id="basic-default-apellidoReprea" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Dni del Representante</label>
                                <input required type="text" name="dni_representante" class="form-control" id="basic-default-dniRepre" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Telefono</label>
                                <input required type="text" name="telefono" class="form-control" id="basic-default-telefonoRepre" />
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
