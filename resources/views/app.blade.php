<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">
        
    </head>
    <body class="bg-weather-dark font-sans antialiased">
        <div id="app"></div>

        <script src="/js/app.js" defer></script>
        <script src="https://unpkg.com/lodash@latest/lodash.min.js" defer></script>
        
    </body>
</html>
