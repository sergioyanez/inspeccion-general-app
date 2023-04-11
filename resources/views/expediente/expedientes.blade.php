@include('header.header')

<div class="container">

    <h4 class="my-5">Resultado de búsqueda</h4>

        <table class="table table-striped">
            <thead>
                <tr class="resultadoBusqueda">
                    <th class="cabecera">Nº de expediente</th>
                    <th class="cabecera">Nº de comercio</th>
                    <th class="cabecera">Contribuyente</th>
                    <th class="cabecera">Observaciones</th>
                    <th class="cabecera">Estado de habilitación</th>
                    <th class="cabecera">Accion</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse($expedientes as $expediente)
                    <tr>
                        <td class="filas">{{$expediente->nro_expediente}}</td>
                        <td class="filas">{{$expediente->nro_comercio}}</td>
                        <td class="filas">
                            @foreach($expediente->contribuyentes as $registro)
                                {{$registro->nombre}}
                                {{$registro->apellido}}

                            @endforeach

                            @foreach($expediente->personasJuridicas as $registro1)
                                {{$registro1->nombre_persona_juridica}}
                                {{$registro1->nombre_representante}}
                                {{$registro1->apellido_representante}}

                            @endforeach
                        </td>
                        <td class="filas">{{$expediente->observaciones_grales}}</td>
                        {{-- <td><a class="btn-btn-danger" href="archivos/{{ $expediente->pdf_solicitud }}" target="blank_">Ver documento</td> --}}
                        <td class="filas">@if($expediente->estado_baja_id != null)Baja {{$expediente->estadoBaja->tipoBaja->descripcion}} @elseif(isset($expediente->detalleHabilitacion->fecha_vencimiento) && $expediente->detalleHabilitacion->fecha_vencimiento < now()) Vencida @else {{$expediente->detalleHabilitacion->tipoEstado->descripcion}} @endif</td>
                        <td class="columnaBtn"><a href="{{route('expedientes-mostrar', $expediente->id)}}" class="d-flex justify-content-center btn btnVerMas">Ver más</></td>
                    </tr>
                @empty
                    <h2>No se encontraron Expedientes</h2>
                @endforelse
            </tbody>
        </table>

        <div class="col-12 d-flex justify-content-end">
            <a href="{{route('busqueda-expediente')}}" class="mt-4 me-5 btn btn-secondary btn-salir">Volver</a>
        </div>
</div>
@include('footer.footer')
