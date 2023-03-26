<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="logo_municipalidad_rauch.ico">

        <title>Gestión de Habilitaciones Municipales</title>

    </head>
    <body>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col"></th>

            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            <tr>
                @if($contribuyentes->count()) )
                <tr scope="row">
                    <th>Contribuyentes</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Cuit</th>
                    <th>Ingresos Brutos</th>
                    <th>Fecha Nacimiento</th>
                    <th>Teléfono</th>
                    <th>Nombre conyuge</th>
                    <th>Apellido conyuge</th>
                    <th>Dni conyuge</th>
                </tr>
                <th scope="row">{{$contribuyentes[0]->id}}</th>
                <td>{{$contribuyentes[0]->apellido}}</td>
                <td>{{$contribuyentes[0]->nombre}}</td>
                <td>{{$contribuyentes[0]->dni}}</td>
                <td>{{$contribuyentes[0]->cuit}}</td>
                <td>{{$contribuyentes[0]->ingresos_brutos}}</td>
                <td>{{$contribuyentes[0]->fecha_nacimiento}}</td>
                <td>{{$contribuyentes[0]->telefono}}</td>
                <td>{{$contribuyentes[0]->nombre_conyuge}}</td>
                <td>{{$contribuyentes[0]->apellido_conyuge}}</td>
                <td>{{$contribuyentes[0]->dni_conyuge}}</td>
              </tr>
              @endif
          <tr>

            <tr>
                @if( $personasJuridicas->count() )
                <tr scope="row">
                    <th>Personas Juridicas</th>
                    <th>Apellido Representante</th>
                    <th>Nombre Representante</th>
                    <th>DNI Representante</th>
                    <th>Cuit Representante</th>
                    <th>Teléfono Representante</th>
                </tr>
                <th scope="row">{{$personasJuridicas[0]->id}}</th>

                    <td>{{$personasJuridicas[0]->apellido_representante}}</td>
                    <td>{{$personasJuridicas[0]->nombre_representante}}</td>
                    <td>{{$personasJuridicas[0]->dni_representante}}</td>
                    <td>{{$personasJuridicas[0]->cuit}}</td>
                    <td>{{$personasJuridicas[0]->telefono}}</td>
                    @endif
                </tr>

            <tr>
                <th scope="row">Número de Expediente</th>
                <td>{{$numExpediente}}</td>
            </tr>
          <tr>
            <th scope="row">Número de comercio</th>
            <td>{{$numComercio}}</td>
          </tr>
          <tr>
            <th scope="row">Actividad Principal</th>
            <td>{{$actividadPrincipal}}</td>
          </tr>

          <tr>
            <th scope="row">Domicilio</th>
            <td>Calle: {{$domicilio[0]->calle}}</td>
            <td>Nº {{$domicilio[0]->numero}}</td>
          </tr>

          <tr>
            <th scope="row">Tipo de Inmueble</th>
            <td>{{$tipoInmueble[0]->descripcion}}</td>
          </tr>

          <tr>
            <th scope="row">Bienes de uso</th>
            <td>{{$bienes_uso}}</td>
          <tr>
            <th scope="row">Observaciones Generales del expediente</th>
            <td>{{$observaciones}}</td>
          </tr>
        {{-- Fin primera página expediente/mostrar --}}

            <tr>
                <tr scope="row">
                    <th>ID Dependencia</th>
                    <th>Dependencia</th>
                    <th>Fecha del Informe</th>
                    <th>Observaciones de la dependencia</th>
                </tr>
                @foreach ($informesDependencias as $informeDependencia)
                <tr>
                    <td>{{$informeDependencia->id}}</td>
                    <td>{{$informeDependencia->nombre}}</td>
                    <td>{{$informeDependencia->fecha_informe}}</td>
                    <td>{{$informeDependencia->observaciones}}</td>
                </tr>
                @endforeach
            </tr>

            <tr scope="row">
                <th>Catastro</th>
            </tr>
            <tr>
                <tr scope="row">
                    <th>Circunscripción</th>
                    <td>{{$catastro[0]->circunscripcion}}</td>
                </tr>
                <tr scope="row">
                    <th>Sección</th>
                    <td>{{$catastro[0]->seccion}}</td>
                </tr>
                <tr scope="row">
                    <th>Chacra</th>
                    <td>{{$catastro[0]->chacra}}</td>
                </tr>
                <tr scope="row">
                    <th>Quinta</th>
                    <td>{{$catastro[0]->quinta}}</td>
                </tr>
                <tr scope="row">
                    <th>Fracción</th>
                    <td>{{$catastro[0]->fraccion}}</td>
                </tr>
                <tr scope="row">
                    <th>Manzana</th>
                    <td>{{$catastro[0]->manzana}}</td>
                </tr>
                <tr scope="row">
                    <th>Parcela</th>
                    <td>{{$catastro[0]->parcela}}</td>
                </tr>
                <tr scope="row">
                    <th>Sub-parcela</th>
                    <td>{{$catastro[0]->sub_parcela}}</td>
                </tr>
                <tr scope="row">
                    <th>Observacion Catastro</th>
                    <td>{{$catastro[0]->observacion}}</td>
                </tr>
                <tr scope="row">
                    <th>Fecha del Informe</th>
                    <td>{{$catastro[0]->fecha_informe}}</td>
                </tr>
             </tr>

            {{-- Fin segunda página expediente/mostrar1 --}}

          <tr>
            <th scope="row">Estado de habilitación</th>
            <td>{{$estado_detalle_habilitacion[0]->descripcion}}</td>
          </tr>
          <tr>
            <th scope="row">Fecha de vencimiento de habilitación</th>
            <td>{{$fecha_vencimiento_detalle_habilitacion[0]->fecha_vencimiento}}</td>
          </tr>

          <tr>
            <th scope="row">Fecha de primera habilitación</th>
            <td>{{$fecha_primer_habilitacion[0]->fecha_primer_habilitacion}}</td>
          </tr>

          <tr>
            <th scope="row">Tipo de habilitación</th>
            <td>{{$tipo_detalle_habilitacion[0]->descripcion}}</td>
          </tr>
        @if(isset($tipo_estado_baja))
          <tr>
            <th scope="row">Tipo de Baja</th>
            <td>{{$tipo_estado_baja}}</td>
          </tr>
        @endif
        @if(isset($deuda))
          <tr>
            <th scope="row">Deuda</th>
            <td>{{$deuda}}</td>
          </tr>
          @endif
          @if(isset($fecha_baja))
          <tr>
            <th scope="row">Fecha de Baja</th>
            <td>{{$fecha_baja}}</td>
          </tr>
          @endif
        </tbody>
      </table>
    </body>
</html>
