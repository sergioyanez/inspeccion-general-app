@include('header.header')
<h2>PAGINA PRINCIPAL</h2>
<div class="row">
<div class=" mb-3">
    <a href="{{route('expedientes-crear')}}" class="btn btn-primary" >Registrar expediente</a>
    <br>
</div>
<div class="mb-3">
    <a href="{{route('busqueda_expediente')}}" class="btn btn-primary">Buscar / editar expediente</a>
    <br>
</div>
<div class="mb-3">
    <a href="{{route('expedientes-crear')}}" class="btn btn-primary">Reportes</a>
    <br>
</div>
<div class="mb-3">
    <a href="{{route('usuarios')}}" class="btn btn-primary">Administrar usuarios</a>
</div>

@include('footer.footer')
