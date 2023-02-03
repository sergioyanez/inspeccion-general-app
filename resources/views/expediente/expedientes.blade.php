<h4>Expedientes</h4>

<div class="card">
    <div class="table-responsive text-nowrap">
        <a href="{{route('expedientes-crear')}}" class="btn btn-primary">Crear nuevo expediente</a>

        <h2>REALIZAR BUSQUEDA</h2>
        <form action="{{route('expedientes')}}" method="get">
            <div>
                <input type="text" name="buscarporcomercio" placeholder="Nº comercio o contribuyente"/>
                <!--<input type="text" name="buscarporcontribuyente" class="form-control" placeholder="Contribuyente"/>-->
                <input type="submit" value="Buscar">
            </div>

        </form>
      
        <table class="table">
            <thead>
                <tr>
                    <th>Nº DE COMERCIO</th>
                    <th>CONTRIBUYENTE</th>
                    <th>OBSERVACIONES/DETALLES</th>
                    <th>DETALLE DE LA HABILITACION</th>
                    <th>ACCIONES</th>                  
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            
                @foreach($expedientes as $expediente)
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
                @endforeach   
            </tbody>
        </table>
        
     </div>
</div>