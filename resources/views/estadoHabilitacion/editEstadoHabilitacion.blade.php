<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('estadoHabilitacion.editarEstadoHabilitacion', $estado->id) }}" method="post">
        @csrf <!-- token de seguridad, para evitar el envío de varios registros-->
        <input type="text" value="{{ $estado->descripcion }}" name="descripcion">
        <input type="submit" value="Editar">
    </form>
</body>
</html>
