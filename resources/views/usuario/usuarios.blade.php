@include('header.header')

<div class="container">

    <h4 class="my-5">Administrar usuarios</h4>

        <a class="btn btn-violet mb-4" href="{{route('usuarios-crear')}}">+Agregar usuario</a>

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
                                <td><a class="btn btn-danger " href="{{route('usuarios-eliminar', $usuario->id)}}">Eliminar</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <a href="{{route('pagina-principal')}}" class="mt-4 me-5 btn btn-secondary btn-salir">Volver</a>
        </div>

</div>
@include('footer.footer')
