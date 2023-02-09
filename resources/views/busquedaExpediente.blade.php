@include('header.header') 

<h2>REALIZAR BUSQUEDA</h2>
<form action="{{route('expedientes')}}" method="get">
    @csrf
    <div>
        <input required type="text" name="buscarporcomercio" placeholder="Nº comercio o contribuyente"/>
        <input type="submit" value="Buscar">
    </div>
</form>

<form action="{{route('expedientes1')}}" method="get">
    <div>
        <input required type="text" name="buscarporcontribuyente" class="form-control" placeholder="Contribuyente"/>
        <input type="submit" value="Buscar">
    </div>
</form>
@include('footer.footer')  