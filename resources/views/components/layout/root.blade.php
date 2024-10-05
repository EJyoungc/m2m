<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MediMothers') }}</title>
    <!-- Fonts -->
    <meta name="description"
        content="An all-in-one system designed to streamline care for HIV-positive mothers and their infants, focusing on medication adherence, TB screening, and infant health tracking. With powerful features and multi-platform support, this system enhances patient care and improves health outcomes." />
    <meta name="author" content="Techlink360" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('build/assets/app-BJLcueRv.css') }}">
    <!-- Styles -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Use Vite directive here --> --}}
</head>

<body class="bg-light font-sans antialiased ">
    {{ $slot }}

    <script src="{{ asset('build/assets/app-z-Rg4TxU.js') }}"></script>

</body>

</html>
