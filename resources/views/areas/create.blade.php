@extends('templates.main')
@section('title', 'Registrar Usuario')
@section('content')
	<div class="page-header">
		<h3>Registrar Usuario</h3>
	</div>
	<div class="col-sm-6">
		@include('usuarios.partials.form')
	</div>
@endsection