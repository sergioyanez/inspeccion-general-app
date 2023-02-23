@include('header.header') 

<div class="container">
    <h4 class="my-5">Administrar usuarios</h4>

        <div class="table-responsive text-nowrap">
            <a href="{{route('usuarios-crear')}}" class="btn btn-primary mb-4">+Agregar usuario</a>
        
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
                        <tr>
                            <td>{{$usuario->usuario}}</td>
                            <td>{{$usuario->tipoPermiso->tipo}}</td>
                            <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#example{{$usuario->id}}">Editar </button></td>
                            <td><a href="{{route('usuarios-eliminar', $usuario->id)}}" class="btn btn-danger">Eliminar</a></td>
                            
                        </tr>
                            <div class="modal" id="example{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <p>Modal body text goes here.</p>
                                    </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{route('pagina-principal')}}" class="btn btn-primary">Volver</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>
        <div class="modal" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div>
          <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
        </div>
</div>


@include('footer.footer')