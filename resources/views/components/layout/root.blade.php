<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('build/assets/app-C2nvNp_v.css') }}">
        <!-- Styles -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Use Vite directive here --> --}}
    </head>
    <body class="bg-light font-sans antialiased ">
        {{ $slot }}

        <script src="{{ asset('build/assets/app-z-Rg4TxU.js') }}"></script>

    </body>
</html>
