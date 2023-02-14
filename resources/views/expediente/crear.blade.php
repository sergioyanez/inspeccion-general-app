<div class="row">
    
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Registrar expediente</h2>
            </div>
            <div class="card-body">
                <!--ACA PODRIA IR UN INPUT OCULTO CON EL ID DEL PROX EXPEDIENTE A GUARDAR-->
                <form method="GET" action="{{route('contribuyentes-buscar')}}">
                    @csrf
                    <div class="mb-3">
                        <label>Buscar contribuyente</label>
                        <input required type="text" name="buscarpor" class="form-control" placeholder="Nombre/Apellido" autofocus/>
                        <input type="submit" value="Buscar">
                    </div>
                </form>
                    <!--UNA FORMA DE QUE TE TRAIGA SOLO UNO ES BUSCAR POR DNI-->
                
                <form method="POST" action="{{ route('expedientes-guardar') }}">
                    @csrf
                    @if (count($contribuyentes) > 1 and request('buscarpor'))
                            @foreach ($contribuyentes as $contribuyente)
                                <td>{{$contribuyente->nombre}}</td>
                                <td>{{$contribuyente->apellido}}</td>
                                <td>{{$contribuyente->dni}}</td>
                                <input type="text" name="contribuyente_id" value="{{ $contribuyente->id }}">
                                <a href="{{route('contribuyentes-buscar')}}" class="btn btn-primary">Seleccionar</a>
                                <br>
                            @endforeach
                    @else
                        @if (count($contribuyentes) == 1 and request('buscarpor'))
                            @foreach ($contribuyentes as $contribuyente)
                                <td>{{$contribuyente->nombre}}</td>
                                <td>{{$contribuyente->apellido}}</td>
                                <td>{{$contribuyente->dni}}</td>
                                <input type="text" name="contribuyente_id" value="{{ $contribuyente->id }}">
                            @endforeach
                        @else
                            @if (request('buscarpor'))
                                <h4>No se encontrò el contribuyente</h4>
                                <a href="{{route('contribuyentes-crearEnExpediente')}}" class="btn btn-primary">Crear nuevo contribuyente para el expediente</a>
                            @endif
                        @endif
                    @endif
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nùmero de expediente</label>
                        <input value="4093-" type="text" name="nro_expediente" class="form-control" id="basic-default-nombreCompleto" />
                        <input type="submit" value="Ver PDF">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nùmero de comercio</label>
                        <input value="2-"  type="text" name="nro_comercio" class="form-control" id="basic-default-nombreCompleto" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Actividad principal</label>
                        <input  type="text" name="actividad_ppal" class="form-control" id="basic-default-nombreCompleto" />
                        <label class="form-label" for="basic-default-fullname">Anexo</label>
                        <input  type="text" name="anexo" class="form-control" id="basic-default-nombreCompleto" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Titulares personas fisicas:</label>
                        <input  type="text" name="titulares" class="form-control" id="basic-default-nombreCompleto" />
                    </div>
                    <div>
                        <label class="form-label" for="basic-default-fullname">Estado habilitacion</label>
                        <input  type="text" name="detalle_habilitacion_id" class="form-control" id="basic-default-nombreCompleto" />
                    </div>
                    <div>
                        <label class="form-label" for="basic-default-fullname">Observaciones</label>
                        <input  type="text" name="observaciones_grales" class="form-control" id="basic-default-nombreCompleto" />
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    
                </form>
            
            </div>
        </div>
    </div>
  
</div>
    
    