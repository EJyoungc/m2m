<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet"> --}}

        {{-- <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
        <link rel="stylesheet" href="{{asset('css/glass.css')}}">
        <link rel="stylesheet" href="{{asset('css/css/all.css')}}">
        
        <link href="{{asset('sel/select2.min.css')}}" rel="stylesheet">
         --}}

        @livewireStyles
        <link rel="stylesheet" href="{{asset('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}">
	      <link rel="stylesheet" href="{{asset('assets/css/font-icons/entypo/css/entypo.css')}}">
	      <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	      <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
	      <link rel="stylesheet" href="{{asset('assets/css/neon-core.css')}}">
	      <link rel="stylesheet" href="{{asset('assets/css/neon-theme.css')}}">
	      <link rel="stylesheet" href="{{asset('assets/css/neon-forms.css')}}">
	      <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
	      <script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
    </head>
    <body class="antialiased page-body  page-fade ">
        

                
        <!-- Page Heading -->
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 text-center px-3" href="#">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <ul class="w-100 mb-0  ">
               
              </ul>
            <div class="navbar-nav ">
                <div class="nav-item text-nowrap">
                  <li class="nav-item text-nowrap">
                    <a class="nav-link"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Sign out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>
                </div>
            </div>
        </header>
  <div class="container-fluid">
    <div class="row">
    
    @include('aside.sidenav')
      {{ $slot }}

      

        

 

        @livewireScripts
        
        @stack('scripts')
        
        <link rel="stylesheet" href="{{asset('assets/js/jvectormap/jquery-jvectormap-1.2.2.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/rickshaw/rickshaw.min.css')}}">

        <!-- Bottom scripts (common) -->
        <script src="{{asset('assets/js/gsap/TweenMax.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/js/joinable.js')}}"></script>
        <script src="{{asset('assets/js/resizeable.js')}}"></script>
        <script src="{{asset('assets/js/neon-api.js')}}"></script>
        <script src="{{asset('assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>


        <!-- Imported scripts on this page -->
        <script src="{{asset('assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js')}}"></script>
        <script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('assets/js/rickshaw/vendor/d3.v3.js')}}"></script>
        <script src="{{asset('assets/js/rickshaw/rickshaw.min.js')}}"></script>
        <script src="{{asset('assets/js/raphael-min.js')}}"></script>
        <script src="{{asset('assets/js/morris.min.js')}}"></script>
        <script src="{{asset('assets/js/toastr.js')}}"></script>
        <script src="{{asset('assets/js/neon-chat.js')}}"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="{{asset('assets/js/neon-custom.js')}}"></script>


        <!-- Demo Settings -->
        <script src="{{asset('assets/js/neon-demo.js')}}"></script> 
    </body>
</html>