<div class="row">
    
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Creando un nuevo expediente</h2>
            </div>
            <div class="card-body">
                <!--ACA PODRIA IR UN INPUT OCULTO CON EL ID DEL PROX EXPEDIENTE A GUARDAR-->
                <form method="GET" action="{{route('contribuyentesBuscar')}}">
                @csrf
                    <div class="mb-3">
                        <label>Buscar contribuyente</label>
                        <input  type="text" name="buscarpor" class="form-control" placeholder="Nombre/Apellido"/>
                        <input type="submit" value="Buscar">
                    </div>
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