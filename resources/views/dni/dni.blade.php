<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($dnis as $dni)
        <li>{{ $dni->descripcion }}</li>
        <a href="{{ route('dni.deleteDni', $dni->id) }}">Eliminar</a>
        <a href="{{ route('dni.editDni', $dni->id) }}">Editar</a>
    @endforeach

    <form method="post"action="newDni">

        @csrf <!-- token de seguridad, para evitar el envío de varios registros-->

        <label>descripcion</label>
        <input type="text" name="descripcion">
        <input type="submit" value="enviar">
    </form>
</body>
</html>
