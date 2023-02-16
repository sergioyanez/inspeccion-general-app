<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="logo_municipalidad_rauch.ico">

        <title>Gestión de Habilitaciones Municipales</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        
        @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        @include('header')

        @include('botones_inicio')
        
        @include('footer')
    </body>
</html>
