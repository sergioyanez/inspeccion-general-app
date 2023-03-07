@include('header.header') 

<div class="container">

    <h4 class="my-5">Reporte de habilitaciones proximas a vencer</h4>

        <table class="table table-striped">
            <thead>
                <tr class="resultadoBusqueda">
                    <th class="cabecera">Nº de comercio</th>
                    <th class="cabecera">Contribuyente/persona jurìdica</th>
                    <th class="cabecera">Telèfono</th>
                    <th class="cabecera">Observaciones/detalles</th>
                    <th class="cabecera">Fecha de vencimiento</th>
                    <th class="cabecera">Estado de habilitación</th>
                    <th class="cabecera">Fecha ùltimo aviso</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse($expedientes as $expediente)
                    <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
                    <tr>
                        <td class="filas">{{$expediente->nro_comercio}}</td>
                        <td class="filas">
                            @foreach($expediente->contribuyentes as $registro)
                                {{$registro->nombre}}
                                {{$registro->apellido}}
                                -
                            @endforeach

                            @foreach($expediente->personasJuridicas as $registro1)
                                {{$registro1->nombre_representante}}
                                {{$registro1->apellido_representante}}
                                -
                            @endforeach
                        </td>
                        <td class="filas">{{$expediente->contribuyentes->telefono}}</td>
                        <td class="filas">{{$expediente->observaciones_grales}}</td>
                        <td class="filas">{{$expediente->detalleHabilitacion->fecha_vencimiento}}</td>
                        <td class="filas">{{$expediente->detalleHabilitacion->tipoEstado->descripcion}}</td>
                        {{-- VER ESTA, ACA VA LA ULTIMA FECHA DE AVISO DE LA TABLA AVISOS 
                        <td class="filas">{{$expediente->observaciones_grales}}</td> --}}

                        {{-- VER ESTA <td class="d-flex justify-content-center columnaBtn"><a href="{{route('expedientes-mostrar', $expediente->id)}}" class="btn btnVerMas">Registrar/ver avisos</></td> --}}
                        <td class="d-flex justify-content-center columnaBtn"><a href="{{route('expedientes-mostrar', $expediente->id)}}" class="btn btnVerMas">Ver expediente</></td>
                    </tr>

                @empty
                    <h2>No se encontraron Expedientes pròximos a vencer</h2>
                @endforelse
            </tbody>
        </table>
                        
        <div class="col-12 d-flex justify-content-end">
            {{-- VER ESTA<a href="{{route('busqueda-expediente')}}" class="mt-4 me-5 btn btn-secondary btn-salir">Imprimir</a> --}}
            <a href="{{route('pagina-principal')}}" class="mt-4 me-5 btn btn-secondary btn-salir">Volver</a>
        </div>
</div>
@include('footer.footer')