<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">	
	<title>@yield('title')</title>
	
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap3/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/awesome_fonts/css/font_awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('css/customs.css') }}">

	<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap3/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<script src="{{ asset('js/customs.js') }}"></script>

</head>
<body>
	@include('templates.menu-login')
	<div class="container">		
		@yield('content')
	</div>

</body>
</html>