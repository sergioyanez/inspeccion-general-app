<div class="col-12 col-lg-6 dropend px-2 pb-5 pt-3 p-lg-5">
    <a class="mb-5 btn btnPrincipal btn-success d-flex align-items-center justify-content-center" href="{{route('expedientes-crear')}}">Registrar expediente</a>
    <a class="mb-5 btn btnPrincipal btn-orange d-flex align-items-center justify-content-center" href="{{route('busqueda-expediente')}}">Buscar / Editar expediente</a>
    <button type="button" class="btn btnPrincipal btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Reportes
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('habilitaciones-proximas-a-vencer')}}">Habilitaciones próximas a vencer</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{route('habilitaciones-vencidas')}}">Habilitaciones vencidas</a></li>
    </ul>
    </div>
    @if(Auth::user()->tipo_permiso_id == 1)
        <div class="col-12 col-lg-6 pb-3 px-2 p-lg-5">
            <a class="btn btnPrincipal btn-violet d-flex align-items-center justify-content-center" href="{{route('usuarios')}}">Administrar usuarios</a>
        </div>
    @endif
