@include('header.header')


<h1 class="h3 my-5 ps-0">Reporte de habilitaciones {{$plazo}}</h1>

@if($reportes->count())

<table class="table table-striped">
    <thead class="resultadoBusqueda">
        <tr>
        <th>N° Expediente</th>
        <th>N° Comercio</th>
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
                <td> {{$reporte->nro_comercio}}</td>
                <td>
                   @if (isset($reporte->contribuyentes) and $reporte->contribuyentes->count())
                        @foreach ($reporte->contribuyentes as $c)
                            <p>{{$c->nombre}} {{$c->apellido}}<p>
                        @endforeach
                    {{-- @else
                    <span class="text-secondary">Sin datos..</span> --}}
                   @endif
                   @if (isset($reporte->personasJuridicas) and $reporte->personasJuridicas->count())
                   @foreach ($reporte->personasJuridicas as $p)
                       <p>{{$p->nombre_persona_juridica}} {{$p->nombre_representante}}{{$p->apellido_representante}}<p>
                   @endforeach
               {{-- @else
               <span class="text-secondary">Sin datos..</span> --}}
              @endif
                </td>
                <td>
                    @if (isset($reporte->contribuyentes) and $reporte->contribuyentes->count())
                     @foreach ($reporte->contribuyentes as $c)
                        <p>{{$c->telefono}}</p>
                     @endforeach
                     {{-- @else
                        <span class="text-secondary">Sin datos..</span> --}}
                    @endif
                    @if (isset($reporte->personasJuridicas) and $reporte->personasJuridicas->count())
                    @foreach ($reporte->personasJuridicas as $p)
                       <p>{{$p->telefono}}</p>
                    @endforeach
                    {{-- @else
                       <span class="text-secondary">Sin datos..</span> --}}
                   @endif
                 

                 </td>
                <td> {{$reporte->observaciones_grales}}</td>
                <td> {{$reporte->detalleHabilitacion->fecha_vencimiento}}</td>
                <td> {{$vencido}}</td>
                <td>
                    @if (isset($reporte->avisos) and $reporte->avisos->count())
                        {{$reporte->avisos[$reporte->avisos->count()-1]->fecha_aviso}}
                    @else
                        <span class="text-secondary">Sin avisos..</span>
                    @endif
                </td>
                <td>
                    @if (isset($hasta) and isset($desde))
                        <a class="btn btn-orange" href="{{route('avisos', ['id'=>$reporte->id,'desde'=>$desde,'hasta'=>$hasta])}}">Ver/Registrar avisos</a>
                    @else
                        <a class="btn btn-orange" href="{{route('avisos_1', $reporte->id)}}">Ver/Registrar avisos</a>
                    @endif
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
<div class="row">
    <div class="col-12 d-flex justify-content-end p-0 ms-5">

    @if (isset($hasta) and isset($desde))

    <form method="POST" action="{{route('generar-reportes-habilitaciones-a-vencer-pdf')}}" enctype="multipart/form-data">
        @csrf
        @isset($reportes)
            <input type="hidden" name="desde" value="{{$desde}}">
            <input type="hidden" name="hasta" value="{{$hasta}}">
            <input type="hidden" name="reportes" value="{{$reportes}}">
        @endisset
        <button type="submit" class="btn btn-warning">Generar PDF Habilitaciones a vencer</button>
    </form>

    @elseif (isset($tramite))
    <form method="POST" action="{{route('generar-reportes-habilitaciones-en-tramite-pdf')}}" enctype="multipart/form-data">
        @csrf
        @isset($reportes)
            <input type="hidden" name="reportes" value="{{$reportes}}">
        @endisset
        <button type="submit" class="btn btn-success">Generar PDF Habilitaciones en trámite</button>
    </form>

    @else
    <form method="POST" action="{{route('generar-reportes-habilitaciones-vencidas-pdf')}}" enctype="multipart/form-data">
        @csrf
        @isset($reportes)
            <input type="hidden" name="reportes" value="{{$reportes}}">
        @endisset
        <button type="submit" class="btn btn-danger">Generar PDF Habilitaciones vencidas</button>
    </form>

    @endif
    </div>

    <div class="col-12 d-flex justify-content-end p-0 ms-5">
        <a href="{{route('pagina-principal')}}" class="mt-4 me-5 btn btn-secondary btn-salir">Volver</a>
    </div>
</div>

@include('footer.footer')
