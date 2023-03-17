<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
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
                                <input type="text" name="cuit" class="form-control" id="basic-default-cuit" value="{{$personaJuridica->cuit}}"/>
                                @error('cuit')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nombre del Representante</label>
                                <input type="text" name="nombre_representante" class="form-control" id="basic-default-nombreRepre" value="{{$personaJuridica->nombre_representante}}"/>
                                @error('nombre_representante')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Apellido del Representante</label>
                                <input type="text" name="apellido_representante" class="form-control" id="basic-default-apellidoReprea" value="{{$personaJuridica->apellido_representante}}"/>
                                @error('apellido_representante')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Dni del Representante</label>
                                <input type="text" name="dni_representante" class="form-control" id="basic-default-dniRepre" value="{{$personaJuridica->dni_representante}}"/>
                                @error('dni_representante')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Telefono</label>
                                <input type="text" name="telefono" class="form-control" id="basic-default-telefonoRepre" value="{{$personaJuridica->telefono}}"/>
                                @error('telefono')
                                {{-- <div class="invalid-feedback"> --}}
                                    <div>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
