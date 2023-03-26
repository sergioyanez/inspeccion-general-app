<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="logo_municipalidad_rauch.ico">

        <title>Habilitaciones Vencidas</title>

    </head>
    <body>
<table class="table table-striped">
    <thead>
        <tr>
        <th>N° comercio</th>
        <th>Contribuyente</th>
        <th>Teléfono</th>
        <th>Observaciones</th>
        <th>Fecha de vencimiento</th>
        <th>Estado</th>
        <th>Fecha último aviso</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reportes as $reporte)
            <tr>
                <td> {{$reporte->nro_expediente}}</td>
                <td>
                   @if (isset($reporte->contribuyentes) and $reporte->contribuyentes->count())
                        @foreach ($reporte->contribuyentes as $c)
                            <p>{{$c->nombre}} {{$c->apellido}}<p>
                        @endforeach
                   @endif
                </td>
                <td>
                    @if (isset($reporte->contribuyentes) and $reporte->contribuyentes->count())
                     @foreach ($reporte->contribuyentes as $c)
                        <p>{{$c->telefono}}</p>
                     @endforeach
                    @endif
                 </td>
                <td> {{$reporte->observaciones_grales}}</td>
                <td> {{$reporte->detalleHabilitacion->fecha_vencimiento}}</td>
                <td> {{$vencido}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
