<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="logo_municipalidad_rauch.ico">

    <title>Habilitaciones Vencidas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
            /* Cambia la tipografía de toda la tabla */
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            text-align: left;
            padding: 8px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            /* Cambia la tipografía de las celdas de encabezado y de datos */
        }

        th {
            background-color: #39b525;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }


        /* Estilos para los bordes */
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        /* Estilos para las filas rayadas */
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        /* Estilos para el hover en filas rayadas */
        .table-striped tbody tr:hover {
            background-color: #e2e6ea;
        }
    </style>
</head>

<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>N° expediente</th>
                <th>N° Comercio</th>
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
                    <td> {{ $reporte->nro_expediente }}</td>
                    <td> {{ $reporte->nro_comercio }}</td>
                    <td>
                        @if (isset($reporte->contribuyentes) and $reporte->contribuyentes->count())
                            @foreach ($reporte->contribuyentes as $c)
                                <p>{{ $c->nombre }} {{ $c->apellido }}
                                <p>
                            @endforeach
                        @endif
                        @if (isset($reporte->personasJuridicas) and $reporte->personasJuridicas->count())
                        @foreach ($reporte->personasJuridicas as $p)
                            <p>{{ $p->nombre_persona_juridica }} {{ $p->nombre_representante }}  {{ $p->apellido_representante }}
                            <p>
                        @endforeach
                    @endif
                    </td>
                    <td>
                        @if (isset($reporte->contribuyentes) and $reporte->contribuyentes->count())
                            @foreach ($reporte->contribuyentes as $c)
                                <p>{{ $c->telefono }}</p>
                            @endforeach
                        @endif
                        @if (isset($reporte->personasJuridicas) and $reporte->personasJuridicas->count())
                        @foreach ($reporte->personasJuridicas as $p)
                            <p>{{ $p->telefono }}</p>
                        @endforeach
                    @endif
                    </td>
                    <td> {{ $reporte->observaciones_grales }}</td>
                    <td> {{ $reporte->detalleHabilitacion->fecha_vencimiento }}</td>
                    <td> {{ $vencido }}</td>
                    @if (isset($reporte->avisos[0]))
                        <td> {{ $reporte->avisos[0]->fecha_aviso }}</td>
                    @else
                        <td>Sin Aviso</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
