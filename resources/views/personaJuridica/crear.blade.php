@include('header.header')
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Creando una Persona Jurídica</h2>
                    </div>
                    <div class="row card-body">
                        <form method="POST" action="{{route('personasJuridicas-guardar')}}">
                            @csrf
                            <div class="col-12 row">
                                <div class="col-4 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Cuit <span class="text-muted">(obligatorio)</span></label>
                                    <input type="text" name="cuit" class="form-control @error('cuit') is-invalid @enderror" id="basic-default-cuit" value="{{ old('cuit') }}"/>
                                    @error('cuit')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nombre persona jurídica <span class="text-muted">(obligatorio)</span></label>
                                    <input type="text" name="nombre_persona_juridica" class="form-control @error('nombre_persona_juridica') is-invalid @enderror" id="basic-default-cuit" value="{{ old('nombre_persona_juridica') }}"/>
                                    @error('nombre_persona_juridica')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 row">
                                <div class="col-4 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nombre del Representante <span class="text-muted"></span></label>
                                    <input type="text" name="nombre_representante" class="form-control @error('nombre_representante') is-invalid @enderror" id="basic-default-nombreRepre" value="{{ old('nombre_representante') }}"/>
                                    @error('nombre_representante')
                                        {{-- <div class="invalid-feedback"> --}}
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Apellido del Representante <span class="text-muted"></span></label>
                                    <input type="text" name="apellido_representante" class="form-control @error('apellido_representante') is-invalid @enderror" id="basic-default-apellidoReprea" value="{{ old('apellido_representante') }}"/>
                                    @error('apellido_representante')
                                        {{-- <div class="invalid-feedback"> --}}
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="col-12 row">
                                <div class="col-4 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Dni del Representante</label>
                                    <input type="text" name="dni_representante" class="form-control @error('dni_representante') is-invalid @enderror" id="basic-default-dniRepre" value="{{ old('dni_representante') }}"/>
                                    @error('dni_representante')
                                        {{-- <div class="invalid-feedback"> --}}
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                          
                            <div class="col-4 mb-3">
                                <label class="form-label" for="basic-default-fullname">Telefono <span class="text-muted"></span></label>
                                <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" id="basic-default-telefonoRepre" />
                                @error('telefono')
                                    {{-- <div class="invalid-feedback"> --}}
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div >
                                <input  type="hidden" name="expediente" value="{{$expediente}}" />
                            </div>
                            <button type="submit" class="mt-4 btn btn btn-success btn-salir">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@include('footer.footer')
