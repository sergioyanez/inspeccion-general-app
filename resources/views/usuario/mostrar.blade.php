<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Actualizando un nuevo usuario</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('usuarios-actualizar')}}">
                    @csrf
                    <input type="hidden" name="usuario_id" value="{{$usuario->id}}">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Usuario</label>
                        <input type="text" name="usuario" class="form-control" id="basic-default-nombreCompleto" value="{{$usuario->usuario}}" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tipo de permiso</label>
                        <select name="tipo_permiso_id" class="form-control" id="basic-default-nombreCompleto" >
                            @foreach($tiposPermisos as $tipo)
                                <option value="{{$tipo->id}}" @if($tipo->id == $usuario->tipo_permiso_id) selected @endif>{{$tipo->tipo}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Correo electrònico</label>
                        <input type="text" name="email" class="form-control" id="basic-default-correo" value="{{$usuario->email}}" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Contraseña vieja</label>
                        <input type="password" name="password" class="form-control" id="basic-default-contraseña" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Contraseña nueva</label>
                        <input type="password" name="repetirPassword" class="form-control" id="basic-default-contraseña" />
                    </div>
            
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
  
</div>