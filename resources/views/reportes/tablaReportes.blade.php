@include('header.header') 

<h1 class="h3 my-5 ps-0">Reporte de habilitaciones {{$plazo}}</h1>
@if($reportes->count())

<table class="table table-striped">
    <thead class="resultadoBusqueda">
        <tr>
        <th>N° comercio</th>
        <th>Contribuyente</th>
        <th>Teléfono</th>
        <th>Observaciones</th>
        <th>Fecha de vencimiento</th>
        <th>Estado</th>
        <th>Fecha último aviso</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reportes as $reporte)
            <tr>
                <td> {{$reporte->nro_expediente}}</td>
                <td> 
                   @if (isset($reporte->contribuyentes) and $reporte->contribuyentes->count())  
                    @foreach ($reporte->contribuyentes as $c)
                        <p>{{$c->nombre}} {{$c->apellido}}<p> 
                    @endforeach
                   @endif
                </td> 
                <td> 
                    @if (isset($reporte->contribuyentes) and $reporte->contribuyentes->count())  
                     @foreach ($reporte->contribuyentes as $c)
                        <p>{{$c->telefono}}</p>
                     @endforeach
                    @endif
                 </td> 
                <td> {{$reporte->observaciones_grales}}</td>
                <td> {{$reporte->detalleHabilitacion->fecha_vencimiento}}</td>
                <td> {{$vencido}}</td>
                <td> 
                    @if (isset($reporte->avisos) and $reporte->avisos->count())  
                        {{$reporte->avisos[$reporte->avisos->count()-1]->fecha_aviso}}
                    @endif
                </td>
                <td> 
                    <a class="btn btn-orange" href="{{route('avisos', $reporte->id)}}">Ver/Registrar avisos</a>
                </td>
                <td> 
                    <a class="btn btn-success" href="{{route('expedientes-mostrar', $reporte->id)}}">Ver expediente</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@else
    <p class="border p-5 h4 d-flex mt-5 justify-content-center">No contiene reportes</p>
@endif


<div class="col-12 d-flex justify-content-end p-0 ms-5">
    <a href="{{route('pagina-principal')}}" class="mt-4 me-5 btn btn-secondary btn-salir">Volver</a>
</div>
@include('footer.footer')