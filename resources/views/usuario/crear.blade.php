@include('usuario.usuarios')  
<div class="modal" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @if(isset($usuario)) Editar usuario @else Creando un nuevo usuario @endif</h5>
            </div>
            <div class="modal-body">
                <form method="POST"  @if(isset($usuario)) action="{{route('usuarios-actualizar')}}" @else action="{{route('usuarios-guardar')}}" @endif>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Usuario</label>
                        <input type="text" name="usuario" @if(isset($usuario)) value="{{$usuario->usuario}}" @else value="{{ old('usuario') }}" @endif class="form-control @error('usuario') is-invalid @enderror" autofocus/>
                        @error('usuario')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Correo electrónico</label>
                        <input type="text" name="email" @if(isset($usuario)) value="{{$usuario->email}}" @else value="{{ old('email') }}" @endif class="form-control @error('email') is-invalid @enderror" id="basic-default-correo" />
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    @if(isset($usuario))
                    <input type="hidden" name="usuario_id" value="{{$usuario->id}}">
                    @endif

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tipo de permiso</label>
                        <select name="tipo_permiso_id" class="form-control" id="basic-default-nombreCompleto" >
                            @foreach($tiposPermisos as $tipo)
                                <option @if(isset($usuario) && $usuario->tipo_permiso_id == $tipo->id) selected @endif value="{{$tipo->id}}" >{{$tipo->tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(!isset($usuario))
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Contraseña</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"/>
                            @error('password')
                                <div  class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Repetir Contraseña</label>
                            <input type="password" name="repetirPassword" class="form-control @error('repetirPassword') is-invalid @enderror" id="basic-default-contraseña" />
                            @error('repetirPassword')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    @endif
                    <div class="modal-footer">
                        <a href="{{route('usuarios')}}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>         