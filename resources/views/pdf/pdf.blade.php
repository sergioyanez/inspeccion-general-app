<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

</head>
<body>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
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
            <th scope="row">Bienes de uso</th>
            <td>{{$bienes_uso}}</td>
          </tr>

          <tr>
            <th scope="row">Observaciones</th>
            <td>{{$observaciones}}</td>
          </tr>
          <tr>
            <th scope="row">Tipo de Detalle de habilitacion</th>
            <td>{{$tipo_detalle_habilitacion}}</td>
          </tr>
          <tr>
            <th scope="row">Estado de Detalle de habilitacion</th>
            <td>{{$estado_detalle_habilitacion}}</td>
          </tr>
          <tr>
            <th scope="row">Fecha de vencimiento de Detalle de habilitacion</th>
            <td>{{$fecha_vencimiento_detalle_habilitacion}}</td>
          </tr>
        @ifisset()
          <tr>
            <th scope="row">Tipo de Baja</th>
            <td>{{$tipo_estado_baja}}</td>
          </tr>
          <tr>
            <th scope="row">Deuda</th>
            <td>{{$deuda}}</td>
          </tr>
          <tr>
            <th scope="row">Fecha de Baja</th>
            <td>{{$fecha_baja}}</td>
          </tr>
        </tbody>
      </table>


</body>
</html>
