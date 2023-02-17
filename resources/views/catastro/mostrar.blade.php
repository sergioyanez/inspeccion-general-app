<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <title>Actualizar Catastro</title>
    </head>
    <body>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Actualizando un catastro</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('catastros-actualizar')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$catastro->id}}">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Circunscripcion</label>
                                <input required type="text" name="circunscripcion" class="form-control" id="basic-default-circunscripcion"value="{{$catastro->circunscripcion}}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Sección</label>
                                <input required type="text" name="seccion" class="form-control" id="basic-default-seccion" value="{{$catastro->seccion}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Chacra</label>
                                <input required type="text" name="chacra" class="form-control" id="basic-default-chacra" value="{{$catastro->chacra}}"/>/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Quinta</label>
                                <input required type="text" name="quinta" class="form-control" id="basic-default-quinta" value="{{$catastro->quinta}}"/>/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Fracción</label>
                                <input required type="text" name="fraccion" class="form-control" id="basic-default-fraccion" value="{{$catastro->fraccion}}"/>/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Manzana</label>
                                <input required type="text" name="manzana" class="form-control" id="basic-default-manzana" value="{{$catastro->manzana}}"/>/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Parcela</label>
                                <input type="text" name="parcela" class="form-control" id="basic-default-parcela" value="{{$catastro->parcela}}"/>/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Sub parcela</label>
                                <input type="text" name="sub_parcela" class="form-control" id="basic-default-sub_parcela"value="{{$catastro->sub_parcela}}"/> />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Observacion</label>
                                <input type="text" name="observacion" class="form-control" id="basic-default-observacion" value="{{$catastro->observacion}}"/> />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Fecha Informe</label>
                                <input type="date" name="fecha_informe" class="form-control" id="basic-default-fecha_informe" value="{{$catastro->fecha_informe}}"/>/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">PDF Informe</label>
                                <input type="url" name="pdf_informe" class="form-control" id="basic-default-pdf_informe" value="{{$catastro->pdf_informe}}"/>/>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
