<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
        <link rel="stylesheet" href="{{asset('css/glass.css')}}">
        <link rel="stylesheet" href="{{asset('css/css/all.css')}}">
        
        <link href="{{asset('sel/select2.min.css')}}" rel="stylesheet">
        
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    </head>
    <body onload="move()" >
        
    
      {{ $slot }}
        
     
      

    </body>
</html>