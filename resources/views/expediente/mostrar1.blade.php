@include('header.header')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="mb-0 h2">Registrar expediente</h1>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{route('expedientes-actualizar1')}}" enctype="multipart/form-data">
                            @csrf
                            @isset($expediente->id)
                                <input type="hidden" name="expediente_id" value="{{$expediente->id}}">
                            @endisset

                            {{-- SEGUNDA PAGINA DEL FIGMA. DEPENDENCIAS --}}
                            <div>
                                
                                @forelse ($informesDependencias as $item)
                                    {{-- SECRETARIA DE GOBIERNO --}}
                                    <div class="row card py-3 p-0 p-lg-3 m-1 mb-3">
                                        <h2 class="mb-3 h4" for="basic-default-fullname">{{$item->tipoDependencia->nombre}}</h2>
                                        @if ($item->tipo_dependencia_id == 1)
                                            <div class="col-12">
                                                <input type="hidden" name="secretaria_id" value="{{ $item->id }}">
                                            </div>
                                            <div class="col-12 mt-2">
                                                <textarea value="{{ $item->observaciones }}" name="secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-3  mt-2">
                                                <label class="form-label" for="basic-default-fullname">Fecha</label>
                                                <input value="{{ $item->fecha_informe }}" type="date" name="fecha_secretaria_gobierno" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                @if ($item->pdf_informe)
                                                <p name="pdf_secretaria_gobierno">PDF cargado: <a href="{{ url( $item->pdf_informe) }}" target="blank_" >{{ $item->pdf_informe}}</a>
                                                @endif
                                                <input type="file" name="pdf_secretaria_gobierno_nuevo" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>      
                                        @endif
                                    

                                        {{-- OBRAS PARTICULARES --}}
                                        @if ($item->tipo_dependencia_id == 3)
                                            <input type="hidden" name="obras_id" value="{{ $item->id }}">
                                            <div class="col-12 mt-2">
                                                <textarea value="{{ $item->observaciones }}" name="obras_particulares" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-3  mt-2">
                                                <label class="form-label" for="basic-default-fullname">Fecha</label>
                                                <input value="{{ $item->fecha_informe }}" type="date" name="fecha_obras_particulares" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                @if ($item->pdf_informe)
                                                    <p name="pdf_obras_particulares">PDF cargado: <a href="{{ url($item->pdf_informe) }}" target="blank_" >{{ $item->pdf_informe}}</a>
                                                @endif
                                                <input type="file" name="pdf_obras_particulares_nuevo" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                        @endif

                                        {{-- TASA POR ALUMBRADO, BARRIDO Y LIMPIEZA --}}
                                        @if ($item->tipo_dependencia_id == 4)
                                            <input type="hidden" name="alumbrado_id" value="{{ $item->id }}"> 
                                            <div class="col-12 mt-2">
                                                <textarea value="{{ $item->observaciones }}" name="alumbrado" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-3  mt-2">
                                                <label class="form-label" for="basic-default-fullname">Fecha</label>
                                                <input value="{{ $item->fecha_informe }}" type="date" name="fecha_alumbrado" class="form-control" id="basic-default-nombreCompleto" />
                                            </div> 
                                            <div class="col-12 mt-2">  
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label> 
                                                @if ($item->pdf_informe)
                                                    <p name="pdf_alumbrado">PDF cargado: <a href="{{ url( $item->pdf_informe) }}" target="blank_" >{{ $item->pdf_informe}}</a>
                                                @endif
                                                <input type="file" name="pdf_alumbrado_nuevo" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                        @endif
                                    
                                        {{-- BROMATOLOGÌA --}}
                                        @if ($item->tipo_dependencia_id == 5)
                                            <input type="hidden" name="bromatologia_id" value="{{ $item->id }}"> 
                                            <div class="col-12 mt-2">  
                                                <textarea value="{{ $item->observaciones }}" name="bromatologia" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-3  mt-2">      
                                                <label class="form-label" for="basic-default-fullname">Fecha</label>
                                                <input value="{{ $item->fecha_informe }}" type="date" name="fecha_bromatologia" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                            <div class="col-12 mt-2">  
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                @if ($item->pdf_informe)
                                                    <p name="pdf_bromatologia">PDF cargado: <a href="{{ url( $item->pdf_informe) }}" target="blank_" >{{ $item->pdf_informe}}</a>
                                                @endif
                                                <input type="file" name="pdf_bromatologia_nuevo" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                        @endif
                                        
                                        {{-- TASA POR INSPECCIÒN DE SEGURIDAD E HIGIENE/HABILITACIÒN COMERCIAL --}}
                                        @if ($item->tipo_dependencia_id == 6)
                                            <input type="hidden" name="inspeccion_id" value="{{ $item->id }}"> 
                                            <div class="col-12 mt-2">  
                                                <textarea value="{{ $item->observaciones }}" name="inspeccion" class="form-control" 
                                                    id="basic-default-nombreCompleto" placeholder="Observaciones"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-3  mt-2">  
                                                <label class="form-label" for="basic-default-fullname">Fecha</label>
                                                <input value="{{ $item->fecha_informe }}" type="date" name="fecha_inspeccion" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                            <div class="col-12 mt-2">  
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                @if ($item->pdf_informe)
                                                    <p name="pdf_inspeccion">PDF cargado: <a href="{{ url( $item->pdf_informe) }}" target="blank_" >{{ $item->pdf_informe}}</a>
                                                @endif
                                                <input type="file" name="pdf_inspeccion_nuevo" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                        @endif
                                        
                                        {{-- JUZGADO DE FALTAS --}}
                                        @if ($item->tipo_dependencia_id == 7)
                                            <input type="hidden" name="juzgado_id" value="{{ $item->id }}"> 
                                            <div class="col-12 mt-2">  
                                                <textarea value="{{ $item->observaciones }}" name="juzgado" class="form-control" 
                                                    id="basic-default-nombreCompleto" placeholder="Observaciones"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-3  mt-2">
                                                <label class="form-label" for="basic-default-fullname">Fecha</label>
                                                <input value="{{ $item->fecha_informe }}" type="date" name="fecha_juzgado" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                @if ($item->pdf_informe)
                                                    <p name="pdf_juzgado">PDF cargado: <a href="{{ url( $item->pdf_informe) }}" target="blank_" >{{ $item->pdf_informe}}</a>
                                                @endif
                                                <input type="file" name="pdf_juzgado_nuevo" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                        @endif

                                        {{-- BOMBEROS DE POLICÌA DE BUENOS AIRES --}}
                                        @if ($item->tipo_dependencia_id == 8)
                                            <input type="hidden" name="bomberos_id" value="{{ $item->id }}"> 
                                            <div class="col-12 mt-2">  
                                                <textarea value="{{ $item->observaciones }}" name="bomberos" 
                                                    class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-3  mt-2">  
                                                <label class="form-label" for="basic-default-fullname">Fecha</label>
                                                <input value="{{ $item->fecha_informe }}" type="date" name="fecha_bomberos" class="form-control" id="basic-default-nombreCompleto"/>
                                            </div>
                                            <div class="col-12 mt-2">  
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                @if ($item->pdf_informe)
                                                    <p name="pdf_bomberos">PDF cargado: <a href="{{ url( $item->pdf_informe) }}" target="blank_" >{{ $item->pdf_informe}}</a>
                                                @endif
                                                <input type="file" name="pdf_bomberos_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            </div>
                                        @endif

                                        {{-- INSPECCIÒN GENERAL --}}
                                        @if ($item->tipo_dependencia_id == 9)
                                            <input type="hidden" name="inspeccion_general_id" value="{{ $item->id }}"> 
                                            <div class="col-12 mt-2">  
                                                <textarea value="{{ $item->observaciones }}" name="inspeccion_general" class="form-control" 
                                                    id="basic-default-nombreCompleto" placeholder="Observaciones"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-3  mt-2">  
                                                <label class="form-label" for="basic-default-fullname">Fecha</label>
                                                <input value="{{ $item->fecha_informe }}" type="date" name="fecha_inspeccion_general" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                            <div class="col-12 mt-2">  
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                @if ($item->pdf_informe)
                                                    <p name="pdf_inspeccion_general">PDF cargado: <a href="{{ url( $item->pdf_informe) }}" target="blank_" >{{ $item->pdf_informe}}</a>
                                                @endif
                                                <input type="file" name="pdf_inspeccion_general_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            </div>
                                        @endif

                                        {{-- REGISTRO DE DEUDORES ALIMENTARIOS MOROSOS --}}
                                        @if ($item->tipo_dependencia_id == 10)
                                            <input type="hidden" name="deudores_alimentarios_id" value="{{ $item->id }}"> 
                                            <div class="col-12 mt-2">  
                                                <textarea value="{{ $item->observaciones }}" name="deudores_alimentarios" 
                                                    class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-3 mt-2">  
                                                <label class="form-label" for="basic-default-fullname">Fecha</label>
                                                <input value="{{ $item->fecha_informe }}" type="date" name="fecha_deudores_alimentarios" class="form-control" id="basic-default-nombreCompleto" />
                                            </div>
                                            <div class="col-12 mt-2">  
                                                <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                                @if ($item->pdf_informe)
                                                    <p name="pdf_deudores_alimentarios">PDF cargado: <a href="{{ url( $item->pdf_informe) }}" target="blank_" >{{ $item->pdf_informe}}</a>
                                                @endif
                                                <input type="file" name="pdf_deudores_alimentarios_nuevo" class="form-control" class="form-control-file" id="basic-default-nombreCompleto" />
                                            </div>
                                        @endif
                                    </div>
                                    @empty
                                @endforelse
                            </div>

                            {{-- CATASTRO --}}
                            <div class="row card py-3 p-0 p-lg-3 m-1 mb-3">
                                <h2 class="h4" for="basic-default-fullname">CATASTRO</h2>
                                @if ($expediente->catastro_id != null)
                                    <input type="hidden" name="catastro_id" value="{{$expediente->catastro_id}}">
                                    <div class="row my-3">
                                        <div class="col-6 col-lg-3">
                                            <label class="form-label" for="basic-default-fullname">Circ <span class="text-muted">(obligatorio)</span></label>
                                            <input value="{{$expediente->catastro->circunscripcion}}" required type="text" name="circunscripcion" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <label class="form-label" for="basic-default-fullname">Secc <span class="text-muted">(obligatorio)</span></label>
                                            <input value="{{$expediente->catastro->seccion}}" required type="text" name="seccion" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg-2 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Chacra</label>
                                            <input value="{{$expediente->catastro->chacra}}" type="text" name="chacra" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                        <div class="col-6 col-lg-2 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Quinta</label>
                                            <input value="{{$expediente->catastro->quinta}}" type="text" name="quinta" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                        <div class="col-6 col-lg-2 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Fracciòn</label>
                                            <input value="{{$expediente->catastro->fraccion}}" type="text" name="fraccion" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                        <div class="col-6 col-lg-2 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Manzana</label>
                                            <input value="{{$expediente->catastro->manzana}}" type="text" name="manzana" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                        <div class="col-6 col-lg-2 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Parcela</label>
                                            <input value="{{$expediente->catastro->parcela}}" type="text" name="parcela" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                        <div class="col-6 col-lg-2 mb-3">
                                            <label class="form-label" for="basic-default-fullname">SubPar</label>
                                            <input value="{{$expediente->catastro->sub_parcela}}" type="text" name="sub_parcela" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Observaciones</label>
                                            <textarea value="{{$expediente->catastro->observacion}}" name="observaciones" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"></textarea>
                                        </div>
                                        <div class="col-12 col-lg-3 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Fecha informe</label>
                                            <input value="{{$expediente->catastro->fecha_informe}}" type="date" name="fecha_informe" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                            @if ($expediente->catastro->pdf_informe)
                                                <p name="pdf_informe">PDF cargado: <a href="{{ url($expediente->catastro->pdf_informe) }}" target="blank_" >{{ $expediente->catastro->pdf_informe}}</a>
                                            @endif
                                            <input type="file" name="pdf_informe_nuevo" class="form-control" id="basic-default-nombreCompleto" />
                                        </div>
                                    </div>
                                @else
                                <div class="row my-3">
                                    <div class="col-6 col-lg-3">
                                        <label class="form-label" for="basic-default-fullname">Circunscripción  <span class="text-muted">(obligatorio)</span></label>
                                        <input type="text" name="circunscripcion" class="form-control @error('circunscripcion') is-invalid @enderror" id="basic-default-nombreCompleto" />
                                        @error('circunscripcion')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <label class="form-label" for="basic-default-fullname">Seccion  <span class="text-muted">(obligatorio)</span></label>
                                        <input type="text" name="seccion" class="form-control @error('seccion') is-invalid @enderror" id="basic-default-nombreCompleto" />
                                        @error('seccion')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-2 mb-3">
                                        <label class="form-label" for="basic-default-fullname">Chacra</label>
                                        <input type="text" name="chacra" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div class="col-6 col-lg-2 mb-3">
                                        <label class="form-label" for="basic-default-fullname">Quinta</label>
                                        <input type="text" name="quinta" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div class="col-6 col-lg-2 mb-3">
                                        <label class="form-label" for="basic-default-fullname">Fracción</label>
                                        <input type="text" name="fraccion" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div class="col-6 col-lg-2 mb-3">
                                        <label class="form-label" for="basic-default-fullname">Manzana</label>
                                        <input type="text" name="manzana" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div class="col-6 col-lg-2 mb-3">
                                        <label class="form-label" for="basic-default-fullname">Parcela</label>
                                        <input type="text" name="parcela" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div class="col-6 col-lg-2 mb-3">
                                        <label class="form-label" for="basic-default-fullname">SubPar</label>
                                        <input type="text" name="sub_parcela" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label" for="basic-default-fullname">Observaciones</label>
                                        <textarea name="observaciones" class="form-control" id="basic-default-nombreCompleto" placeholder="Observaciones"></textarea>
                                    </div>
                                    <div class="col-12 col-lg-2 mb-3">
                                        <label class="form-label" for="basic-default-fullname">Fecha informe</label>
                                        <input type="date" name="fecha_informe" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="basic-default-fullname">Adjuntar PDF</label>
                                        <input type="file" name="pdf_informe" class="form-control" id="basic-default-nombreCompleto" />
                                    </div>
                                </div>
                                @endif
                            </div>
                            <a href="{{route('expedientes-mostrar', $expediente->id)}}" class="ms-1 mt-4 me-3 btn btn-secondary btn-salir">Volver</a>
                            <button type="submit" class="mt-4 btn btn btn-success btn-salir">Siguiente</button>
                        </form>
                        
                </div>
            </div>
        </div>
    </div>
@include('footer.footer')
