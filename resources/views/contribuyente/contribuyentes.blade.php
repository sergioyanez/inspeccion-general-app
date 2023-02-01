
<h4>Contribuyentes de la aplicacion</h4>

<div class="card">
    <div class="table-responsive text-nowrap">
        <a href="{{route('contribuyentes-crear')}}" class="btn btn-primary">Crear nuevo contribuyente</a>
      
        <table class="table">
            <thead>
                <tr>
                    <th>TIPO DE DOCUMENTO</th>
                    <th>ESTADO CIVIL</th>
                    <th>CUIT</th>
                    <th>INGRESOS BRUTOS</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>NUMERO DE DOCUMENTO</th>
                    <th>FECHA DE NACIMIENTO</th>
                    <th>TELEFONO</th>
                    <th>NOMBRE CONYUGE</th>
                    <th>APELLIDO CONYUGE</th>
                    <th>DOCUMENTO CONYUGE</th>
                    <th>CREADO</th>
                    <th>ACCIONES</th>                  

                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($contribuyentes as $contribuyente)
                    <tr>
                        <td>{{$contribuyente->TipoDni->descripcion}}</td>
                        <td>{{$contribuyente->EstadoCivil->descripcion}}</td>
                        <td>{{$contribuyente->cuit}}</td>
                        <td>{{$contribuyente->ingresos_brutos}}</td>
                        <td>{{$contribuyente->nombre}}</td>
                        <td>{{$contribuyente->apellido}}</td>
                        <td>{{$contribuyente->dni}}</td>
                        <td>{{$contribuyente->fecha_nacimiento}}</td>
                        <td>{{$contribuyente->telefono}}</td>
                        <td>{{$contribuyente->nombre_conyuge}}</td>
                        <td>{{$contribuyente->apellido_conyuge}}</td>
                        <td>{{$contribuyente->dni_conyuge}}</td>
                        <td>{{$contribuyente->created_at}}</td>
                        <td><a href="{{route('contribuyentes-mostrar', $contribuyente->id)}}">Editar</a></td>  
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
     </div>
</div>
    