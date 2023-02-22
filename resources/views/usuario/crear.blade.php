
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Crear Usuario</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Creando un nuevo usuario</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('usuarios-guardar')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Usuario</label>
                                <input type="text" name="usuario" class="form-control" id="basic-default-nombreCompleto" autofocus/>
                            </div>
                            <div>
                            @error('usuario')
                                    <strong>{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tipo de permiso</label>
                                <select required name="tipo_permiso_id" class="form-control" id="basic-default-nombreCompleto" >
                                    <option>-- Seleccione --</option>
                                    @foreach($tiposPermisos as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Correo electrònico</label>
                                <input type="text" name="email" class="form-control" id="basic-default-correo" />
                                @error('email')
                                    <strong>{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Contraseña</label>
                                <input type="password" name="password" class="form-control" id="basic-default-contraseña" />
                                @error('password')
                                    <strong>{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Repetir Contraseña</label>
                                <input type="password" name="repetirPassword" class="form-control" id="basic-default-contraseña" />
                                @error('repetirPassword')
                                    <strong>{{$message}}</strong>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
