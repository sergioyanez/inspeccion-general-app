<div class="table-responsive text-nowrap">
    <a href="{{route('contribuyentes-crear')}}" class="btn btn-primary">Crear nuevo contribuyente</a>
      
    <table class="table">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>NUMERO DE DOCUMENTO</th>
                <th>CREADO</th>
                <th>ACCIONES</th>                  
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @forelse($contribuyentes as $contribuyente)
                <tr>
                    <td>{{$contribuyente->nombre}}</td>
                    <td>{{$contribuyente->apellido}}</td>
                    <td>{{$contribuyente->dni}}</td>
                    <td>{{$contribuyente->created_at}}</td>
                    <td><a href="{{route('expedientes-crear')}}">Agregar</a></td>  
                </tr>
            @empty
                <h2>No se encontraron contribuyentes</h2>
            @endforelse 
        </tbody>
    </table>
</div>