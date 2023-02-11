<div class="row">

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Creando un nuevo expediente</h2>
            </div>
            <div class="card-body">
                <!--ACA PODRIA IR UN INPUT OCULTO CON EL ID DEL PROX EXPEDIENTE A GUARDAR-->
                <form method="GET" action="{{route('contribuyentes-buscar')}}">
                @csrf
                    <div class="mb-3">
                        <label>Buscar contribuyente</label>
                        <input  type="text" name="buscarpor" class="form-control" placeholder="Nombre/Apellido"/>
                        <input type="submit" value="Buscar">
                    </div>

                    @if(request('buscarpor'))
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">DNI</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse ($contribuyentes as $contribuyente)

                              <tr>
                                <td>{{$contribuyente->nombre}}</td>
                                <td>{{$contribuyente->apellido}}</td>
                                <td>{{$contribuyente->dni}}</td>
                                <td><div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                  </div></td>
                              </tr>

                        @empty
                            <h2>No se encontrò el contribuyente</h2>
                            <a href="{{route('contribuyentes-crearEnExpediente')}}" class="btn btn-primary">Crear nuevo contribuyente para el expediente</a>
                        @endforelse
                    </tbody>
                </table>
                <button>Agregar </button>
                        <h2>Si el contribuyente no esta en la lista </h2>
                        <a href="{{route('contribuyentes-crearEnExpediente')}}" class="btn btn-primary">Crear contribuyente para el expediente</a>
                    @endif
                </form>
                <form>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nùmero de expediente</label>
                        <input value="4093 -" type="text" name="nro_expediente" class="form-control" id="basic-default-nombreCompleto" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nùmero de comercio</label>
                        <input value="2 -"  type="text" name="nro_comercio" class="form-control" id="basic-default-nombreCompleto" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Actividad principal</label>
                        <input  type="text" name="actividad_principal" class="form-control" id="basic-default-nombreCompleto" />
                        <label class="form-label" for="basic-default-fullname">Anexo</label>
                        <input  type="text" name="anexo" class="form-control" id="basic-default-nombreCompleto" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Titulares personas fisicas</label>
                        <input  type="text" name="titulares" class="form-control" id="basic-default-nombreCompleto" />
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

</div>
