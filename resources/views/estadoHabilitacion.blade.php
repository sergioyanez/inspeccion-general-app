<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($estados as $estado)
        <li>{{ $estado->descripcion }}</li>
        <a href="{{ route('deleteEstado', $estado->id) }}">Eliminar Estado</a>
        <a href="{{ route('editEstado', $estado->id) }}">Editar Estado</a>
    @endforeach

    <form method="post"action="newEstadoHabilitacion">

        @csrf <!-- token de seguridad, para evitar el envío de varios registros-->

        <label>descripcion Estado</label>
        <input type="text" name="descripcion">
        <input type="submit" value="crear">
    </form>
</body>
</html>
