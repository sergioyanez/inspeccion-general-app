<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link rel="stylesheet" href="resources/css/app.css">

</head>
<body>
<div>

    <div>
        <div>
            <h5 class="mb-0">Creando un nuevo usuario</h5>

            <div class="card-body">
                <form method="POST" action="{{route('usuarios-guardar')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Usuario</label>
                        <input type="text" name="usuario" class="form-control" id="basic-default-nombreCompleto" />
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tipo de permiso</label>
                        <select name="tipo_permiso_id" class="form-control" id="basic-default-nombreCompleto" >
                            @foreach($tiposPermisos as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                            @endforeach
                        </select>
                    </div>

                      <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Correo electrònico</label>
                          <input type="text" name="email" class="form-control" id="basic-default-correo" />
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Contraseña</label>
                          <input type="password" name="password" class="form-control" id="basic-default-contraseña" />
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Repetir Contraseña</label>
                          <input type="password" name="repetirPassword" class="form-control" id="basic-default-contraseña" />
                      </div>

                      <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

</div>
</body>
</html>
