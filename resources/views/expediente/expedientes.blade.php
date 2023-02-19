<div class="card">
    <div class="table-responsive text-nowrap">

        @include('header.header')  
                    
            <table class="table">
                <thead>
                    <tr>
                        <th>Nº DE COMERCIO</th>
                        <th>CONTRIBUYENTE</th>
                        <th>OBSERVACIONES/DETALLES</th>
                        <th>ESTADO DE LA HABILITACION</th>
                                         
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                
                    @forelse($expedientes as $expediente)
                        <tr>
                            <td>{{$expediente->nro_comercio}}</td>
                            <td>
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
                            <td>{{$expediente->observaciones_grales}}</td>
                            <td>{{$expediente->detalleHabilitacion->tipoHabilitacion->descripcion}}</td>
                            <td><a href="{{route('expedientes-mostrar', $expediente->id)}}">Ver màs</a></td> 
                        </tr>
                    @empty
                        <h2>No se encontraron Expedientes</h2>
                    @endforelse   
                </tbody>
            </table>
        
        @include('footer.footer')    
    </div>
    
</div>