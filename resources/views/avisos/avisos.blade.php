@include('header.header') 
    <ul class="list-group col-lg-4">
        <li class="list-group-item active">Avisos</li>
        <li class="list-group-item">Expediente: {{$expediente->nro_expediente}}</li>
        <li class="list-group-item">Comercio: {{$expediente->nro_comercio}}</li>
        @if (isset($expediente->contribuyentes) and isset($expediente->contribuyentes[0]))
            @if($expediente->contribuyentes->count() <= 1)
                <li class="list-group-item">
                    Contribuyente: {{$expediente->contribuyentes[0]->nombre}} {{$expediente->contribuyentes[0]->apellido}} | Telefono: {{$expediente->contribuyentes[0]->telefono}}
                </li>
            @else
                <li class="p-0 list-group-item accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Contribuyentes:
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <ul>
                            @foreach ($expediente->contribuyentes as $c)
                                <li>
                                    {{$c->nombre}} {{$c->apellido}} | Telefono: {{$c->telefono}}
                                </li>
                            @endforeach    
                        </ul>      
                    </div>
                    </div>
                </li>
            @endif   
            
        @endif    
    </ul>  
         
    <div class="col-12 d-flex justify-content-start p-0 mt-3">
       <button class="btn btn-orange" type="button" data-bs-toggle="modal" 
          @if($errors->has('fecha_aviso') || $errors->has('detalle') || $errors->has('pdf_file')) data-bs-target="#example" 
          @else data-bs-target="#modalReportes" @endif> Nuevo Aviso </button>
      
           </div>

    @if($avisos and $avisos->count())
        <table class="table table-striped mb-5 mt-3">
            <thead class="table-info">
                <tr>
                    <th>Fecha de vencimiento</th>
                    <th>Avisado por</th>
                    <th>Fecha de aviso</th>
                    <th>Tipo comunicacion</th>
                    <th>Datos adicionales</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($avisos as $a)
                    <tr>
                        <td> {{$a->fecha_vencimiento}}</td>
                        <td> {{$a->usuario}}</td>
                        <td> {{$a->fecha_aviso}}</td>
                        <td> {{$a->tipo_comunicacion}}</td>
                        <td> 
                            @if($a->tipo_comunicacion === 'nota') 
                                <a class="ms-2 btn btn-danger btn-sm" href="{{ url($a->archivo_pdf) }}" target="_blank">PDF</a>
                            @else 
                                {{$a->detalle}} 
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="border p-5 h4 d-flex mt-5 justify-content-center">No contiene avisos</p>
    @endif

    <div class="col-12 d-flex justify-content-end p-0 ms-5">
        <a href="{{ url()->previous() }}" class="mt-4 me-5 btn btn-secondary btn-salir">Volver</a>
    </div>
@include('avisos.guardarAviso')
@include('footer.footer')
