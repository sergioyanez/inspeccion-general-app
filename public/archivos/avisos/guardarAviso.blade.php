@include('avisos.avisos')  
<div class="modal" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear un aviso</h5>
            </div>
            <div class="modal-body">
                <form method="POST"  enctype="multipart/form-data" action="{{route('avisos-guardar')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" >Fecha de aviso</label>
                        <input type="date" name="fecha_aviso" value="{{$fecha_actual}}" class="form-control @error('fecha_aviso') is-invalid @enderror" autofocus/>
                        @error('fecha_aviso')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <input type="hidden" value="{{$expediente}}" name="expediente_id">

                    <div class="mb-3">
                        <label class="form-label">Tipo comunicación</label>
                        <select class="form-select" name="tipo_comunicacion">
                            <option selected value="telefonica">Telefónica</option>
                            <option value="nota">Nota</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" >PDF (opcional)</label>
                        <input type="file" accept="application/pdf" name="pdf_file" class="form-control @error('pdf_file') is-invalid @enderror">
                        @error('pdf_file')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" >Detalle</label>
                        <textarea name="detalle" value="{{ old('detalle') }}" class="form-control @error('detalle') is-invalid @enderror" ></textarea>
                        @error('detalle')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                   
                    <div class="modal-footer">
                        <a href="{{route('avisos',$expediente)}}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>         
