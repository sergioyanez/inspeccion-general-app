@include('header.header') 

<div class="container">
    <h4 class="my-5">Administrar usuarios</h4>

        <a class="btn btn-primary mb-4" href="{{route('usuarios-crear')}}">+Agregar usuario</a>
        
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>USUARIO</th>
                        <th>TIPO PERMISO</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($usuarios as $usuario)
                        @if($usuario->id != Auth::user()->id)
                            <tr>
                                <td>{{$usuario->usuario}}</td>
                                <td>{{$usuario->tipoPermiso->tipo}}</td>
                                <td><a class="btn btn-info" href="{{route('usuarios-editar', $usuario->id)}}">Editar </a></td>
                                <td><button  class="btn btn-danger btnsDelete" value="{{$usuario->id}}">Eliminar</button></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{route('pagina-principal')}}" class="me-auto btn btn-primary">Volver</a>
</div>
@include('footer.footer')
