@include('header.header')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Crear un nuevo contribuyente</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('contribuyentes-guardar')}}">
                            @csrf
                            <div class="row mt-3">

                                <div class="row col-12 mb-3">
                                    <div class="col-3">
                                        <label class="form-label" for="basic-default-fullname">Nombre <span class="text-muted">(obligatorio)</span></label>
                                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" id="basic-default-nombreCompleto" value="{{ old('nombre') }}"/>
                                        @error('nombre')
                                            {{-- <div class="invalid-feedback"> --}}
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label" for="basic-default-fullname">Apellido <span class="text-muted">(obligatorio)</span></label>
                                        <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" id="basic-default-nombreCompleto" value="{{ old('apellido') }}"/>
                                        @error('apellido')
                                            {{-- <div class="invalid-feedback"> --}}
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>

                                  
                                </div>
                               
                                <div class="col-3 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Fecha de nacimiento <span class="text-muted">(obligatorio)</span></label>
                                    <input type="date" name="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror" id="basic-default-nombreCompleto" value="{{ old('fecha_nacimiento') }}"/>
                                    @error('fecha_nacimiento')
                                        {{-- <div class="invalid-feedback"> --}}
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 mt-4">
                                    <p><b>Documentacion</b></p>
                                    <hr>
                                </div>

                                <div class="row col-12 mb-3">
                                    <div class="col-3">
                                        <label class="form-label" for="basic-default-fullname">Tipo de documento <span class="text-muted">(obligatorio)</span></label>
                                        <select name="tipo_dni_id" class="form-select @error('tipo_dni_id') is-invalid @enderror" id="basic-default-nombreCompleto" >
                                            <option value=" ">-- Seleccione --</option>
                                            @foreach($tipos as $tipo)
                                                <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                            @endforeach
                                        </select>
                                        @error('tipo_dni_id')
                                            {{-- <div class="invalid-feedback"> --}}
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label" for="basic-default-fullname">Número de documento <span class="text-muted">(obligatorio)</span></label>
                                        <input type="text" name="dni" class="form-control @error('dni') is-invalid @enderror" id="basic-default-nombreCompleto" value="{{ old('dni') }}"/>
                                        @error('dni')
                                            {{-- <div class="invalid-feedback"> --}}
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-4">
                                    <label class="form-label" for="basic-default-fullname">Cuit <span class="text-muted">(obligatorio)</span></label>
                                    <input type="text" name="cuit" class="form-control @error('cuit') is-invalid @enderror" id="basic-default-nombreCompleto" value="{{ old('cuit') }}"/>
                                    @error('cuit')
                                        {{-- <div class="invalid-feedback"> --}}
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row col-12 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Ingresos brutos <span class="text-muted">(obligatorio)</span></label>
                                    <div class="col-2">
                                        <input type="text" name="ingresos_brutos" class="form-control @error('ingresos_brutos') is-invalid @enderror" id="basic-default-nombreCompleto" value="{{ old('ingresos_brutos') }}"/>
                                        @error('ingresos_brutos')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="row col-12 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Teléfono</label>
                                    <div class="col-2">
                                        <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" id="basic-default-nombreCompleto" value="{{ old('telefono') }}"/>
                                    </div>
                                </div>

                            {{--    <div class="col-12 mt-4">
                                    <p><b>Estado civil</b></p>
                                    <hr>
                                </div>
                               
                                 <div class="row col-12 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Estado civíl <span class="text-muted">(obligatorio)</span></label>
                                    <div class="col-2">
                                        <select name="estado_civil_id" class="form-select @error('estado_civil_id') is-invalid @enderror" id="selectCasado" >
                                            <option value=" ">-- Seleccione --</option>
                                            @foreach($estados as $estado)
                                                <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                                            @endforeach
                                        </select>
                                        @error('estado_civil_id')
                                           
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div> 
                               
                                <div class="col-12 row mb-3" id="divConyuge">
                                    <div class="col-3">
                                        <label class="form-label" for="basic-default-fullname">Nombre del cónyuge</label>
                                        <input type="text" name="nombre_conyuge" class="form-control" id="basic-default-nombreCompleto" value="{{ old('nombre_conyuge') }}"/>
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label" for="basic-default-fullname">Apellido del cónyuge</label>
                                        <input type="text" name="apellido_conyuge" class="form-control" id="basic-default-nombreCompleto" value="{{ old('apellido_conyuge') }}"/>
                                    </div>
                                </div>
                                
                                <div class="col-3" id="divConyuge2">
                                    <label class="form-label" for="basic-default-fullname">Dni del cónyuge</label>
                                    <input type="text" name="dni_conyuge" class="form-control" id="basic-default-nombreCompleto" value="{{ old('dni_conyuge') }}"/>
                                </div>
                            </div> --}}
                            <button type="submit" class="mt-4 btn btn btn-success btn-salir">Enviar</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('footer.footer')
