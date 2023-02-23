<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6 dropend">
        <a class="btn btnPrincipal btnExpediente d-flex align-items-center justify-content-center" href="{{route('expedientes-crear')}}">Registrar expediente</a>
        <a class="btn btnPrincipal btnBuscar d-flex align-items-center justify-content-center" href="{{route('busqueda-expediente')}}">Buscar / Editar expediente</a>
        <button type="button" class="btn btnPrincipal btnReportes dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Reportes
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Habilitaciones próximas a vencer</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Habilitaciones vencidas</a></li>
        </ul>
        </div>
        <div class="col-12 col-lg-6">
            <a class="btn btnPrincipal btnAdministracion d-flex align-items-center justify-content-center" href="{{route('usuarios')}}">Administrar usuarios</a>
        </div>
    </div>
</div>