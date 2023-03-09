<div class="col-12 col-lg-6 dropend px-2 pb-5 pt-3 p-lg-5">
    <a class="mb-5 btn btnPrincipal btn-success d-flex align-items-center justify-content-center" href="{{route('expedientes-crear')}}">Registrar expediente</a>
    <a class="mb-5 btn btnPrincipal btn-orange d-flex align-items-center justify-content-center" href="{{route('busqueda-expediente')}}">Buscar / Editar expediente</a>
    <button type="button" class="btn btnPrincipal btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Reportes
    </button>
    <ul class="dropdown-menu">
        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" @if($errors->has('desde') || $errors->has('hasta')) data-bs-target="#example" @else data-bs-target="#modalReportes" @endif >Habilitaciones próximas a vencer</button></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{route('habilitaciones-vencidas')}}">Habilitaciones vencidas</a></li>
    </ul>
    </div>
    @if(Auth::user()->tipo_permiso_id == 1)
        <div class="col-12 col-lg-6 pb-3 px-2 p-lg-5">
            <a class="btn btnPrincipal btn-violet d-flex align-items-center justify-content-center" href="{{route('usuarios')}}">Administrar usuarios</a>
        </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" @if($errors->has('desde') || $errors->has('hasta')) id="example" @else id="modalReportes" @endif  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Indicar fecha</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('habilitaciones-proximas-a-vencer')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" >Desde</label>
                        <input type="date" name="desde" value="{{$fecha_actual}}" class="form-control @error('desde') is-invalid @enderror" autofocus/>
                        @error('desde')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Hasta</label>
                        <input type="date" name="hasta" value="" class="form-control @error('hasta') is-invalid @enderror" autofocus/>
                        @error('hasta')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>