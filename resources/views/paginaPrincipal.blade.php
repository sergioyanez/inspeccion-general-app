@include('header.header')
<h2>PAGINA PRINCIPAL</h2>

<a href="{{route('expedientes-crear')}}" class="btn-bd-primary">Registrar expediente</a>
<br>
<a href="{{route('busqueda_expediente')}}" class="btn btn-primary">Buscar / editar expediente</a>
<br>
<a href="{{route('expedientes-crear')}}" class="btn btn-primary">Reportes</a>
<br>
<a href="{{route('usuarios')}}" class="btn btn-primary">Administrar usuarios</a>

@include('footer.footer')
