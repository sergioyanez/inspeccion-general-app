<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Actualizar Persona Juridíca</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Actualizando una Persona Jurídica</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('personasJuridicas-actualizar')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$personaJuridica->id}}">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Cuit</label>
                                <input required type="text" name="cuit" class="form-control" id="basic-default-cuit" value="{{$personaJuridica->cuit}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nombre del Representante</label>
                                <input required type="text" name="nombreRepre" class="form-control" id="basic-default-nombreRepre" value="{{$personaJuridica->nombre_representante}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Apellido del Representante</label>
                                <input required type="text" name="apellidoReprea" class="form-control" id="basic-default-apellidoReprea" value="{{$personaJuridica->apellido_representante}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Dni del Representante</label>
                                <input required type="text" name="dniRepre" class="form-control" id="basic-default-dniRepre" value="{{$personaJuridica->dni_representante}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Telefono</label>
                                <input required type="text" name="telefonoRepre" class="form-control" id="basic-default-telefonoRepre" value="{{$personaJuridica->telefono}}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
