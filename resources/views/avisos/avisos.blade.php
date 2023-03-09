@include('header.header') 
    <h1 class="h2 d-flex justify-content-start mt-3">Avisos para el expediente: {{$expediente->nro_expediente}}</h1>
    <p class="mb-4">Comercio: {{$expediente->nro_comercio}}</p>
    <div class="col-12 d-flex justify-content-start p-0 ms-5">
        <a href="{{route('avisos-crear', $expediente->id)}}" class="btn-lg btn btn-orange">+Agregar nuevo aviso</a>
    </div>

    @if($avisos->count())
        <table class="table table-striped my-5">
            <thead class="table-info">
                <tr>
                    <th>Fecha de vencimiento</th>
                    <th>Avisado por</th>
                    <th>Fecha de aviso</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($avisos as $a)
                    <tr>
                        <td> {{$a->fecha_vencimiento}}</td>
                        <td> {{$a->usuario}}</td>
                        <td> {{$a->fecha_aviso}}</td>
                        <td> {{$a->detalle}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="border p-5 h4 d-flex mt-5 justify-content-center">No contiene avisos</p>
    @endif

    <div class="col-12 d-flex justify-content-end p-0 ms-5">
        <a href="{{route('pagina-principal')}}" class="mt-4 me-5 btn btn-secondary btn-salir">Volver</a>
    </div>

@include('footer.footer')
