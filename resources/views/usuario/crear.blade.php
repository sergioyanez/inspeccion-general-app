@include('usuario.usuarios')  
<div class="modal" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @if(isset($usuario)) Editar usuario @else Creando un nuevo usuario @endif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('usuarios-guardar')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Usuario</label>
                        <input type="text" name="usuario" value="{{ old('usuario') }}" class="form-control" id="basic-default-nombreCompleto" autofocus/>
                    </div>
                    <div>
                        @error('usuario')
                            <strong>{{$message}}</strong>
                        @enderror
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
                        <label class="form-label" for="basic-default-company">Correo electrónico</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="basic-default-correo" />
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>         