  
<div class="modal fade" @if($errors->has('fecha_aviso') || $errors->has('detalle') || $errors->has('pdf_file')) id="example" 
    @else id="modalAvisos" @endif aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear un aviso</h5>
            </div>
            <div class="modal-body">
                <form method="POST"  enctype="multipart/form-data" action="{{route('avisos-guardar')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" >Fecha de aviso</label>
                        <input type="date" name="fecha_aviso" @if(old('fecha_aviso') and old('fecha_aviso') != $fecha_actual) value="{{old('fecha_aviso')}}" @else value="{{$fecha_actual}}" @endif  class="form-control @error('fecha_aviso') is-invalid @enderror" autofocus/>
                        @error('fecha_aviso')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <input type="hidden" value="{{$expediente->id}}" name="expediente_id">
                    <input type="hidden" value="{{$expediente->nro_expediente}}" name="nro_expediente">
                    @if(isset($hasta) and isset($desde) and $hasta != 0)
                        <input type="hidden" name="desde" value="{{$desde}}" />
                        <input type="hidden" name="hasta" value="{{$hasta}}" />
                    @endif
                    
                    <div class="mb-3">
                        <label class="form-label">Tipo comunicación</label>
                        <select class="form-select" name="tipo_comunicacion" id="selectAviso">
                            <option @if(old('tipo_comunicacion') == 'telefonica') selected @endif value="telefonica">Telefónica</option>
                            <option @if(old('tipo_comunicacion') == 'nota') selected @endif value="nota">Nota</option>
                        </select>
                    </div>

                    <div class="mb-3" id="cajaPDFAviso">
                        <label class="form-label" >PDF (opcional)</label>
                        <input value="{{ old('pdf_file') }}" type="file" accept="application/pdf" name="pdf_file" class="form-control @error('pdf_file') is-invalid @enderror">
                        @error('pdf_file')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3" id="cajaDetalleAviso">
                        <label class="form-label">Detalle</label>
                        <textarea name="detalle" value="{{ old('detalle') }}" class="form-control @error('detalle') is-invalid @enderror" ></textarea>
                        @error('detalle')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>         
