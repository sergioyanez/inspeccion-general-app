@include('header.header') 

<div class="container">

    <h4 class="my-5 ">Realizar búsqueda</h2>
        
    <form action="{{route('expedientes')}}" method="get" class="my-5 formBusqueda">
        @csrf
        <div>
            <input required type="text" name="buscarporcomercio" placeholder="  Nº comercio" class="inputBusqueda"/>
            <button type="submit" class="m-2 btnBuscar btn btn-outline-dark"></button>
        </div>
    </form>

    <form action="{{route('expedientes1')}}" method="get" class="my-5 formBusqueda">
        @csrf
        <div>
            <input required type="text" name="buscarporcontribuyente" class="inputBusqueda" placeholder="  Contribuyente/Persona jurìdica"/>
            <button type="submit" class="m-2 btnBuscar btn btn-outline-dark"></button>
        </div>
    </form>

    <div class="col-12 d-flex justify-content-end">
        <a href="{{route('pagina-principal')}}" class="mt-4 me-5 btn btn-secondary btn-salir">Volver</a>
    </div>

</div>
@include('footer.footer')  