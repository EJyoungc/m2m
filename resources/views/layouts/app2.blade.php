<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

	<link rel="stylesheet" href="{{asset('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/font-icons/entypo/css/entypo.css')}}">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/neon-core.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/neon-theme.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/neon-forms.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/font-icons/font-awesome/css/font-awesome.css')}}">

	<script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body  login-page login-form-fall " >
<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>
	@if (URL::current() == route('login'))
		@yield('login')
	@endif
	@if (URL::current() == route('register'))
		@yield('register')
	@endif
	


	<!-- Bottom scripts (common) -->
	<script src="{{asset('assets/js/gsap/TweenMax.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.js')}}"></script>
	<script src="{{asset('assets/js/joinable.js')}}"></script>
	<script src="{{asset('assets/js/resizeable.js')}}"></script>
	{{-- <script src="{{asset('assets/js/neon-api.js')}}"></script> --}}
	<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
	<script src="{{asset('assets/js/neon-login.js')}}"></script>


	<!-- JavaScripts initializations and stuff -->
	{{-- <script src="{{asset('assets/js/neon-custom.js')}}"></script> --}}


	<!-- Demo Settings -->
	{{-- <script src="{{asset('assets/js/neon-demo.js')}}"></script> --}}

</body>
</html>
