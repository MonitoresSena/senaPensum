@extends('templates.main')
@section('title', 'Actualizar Usuario')
@section('content')
	<div class="page-header">
		<h3>Actualizar Usuario</h3>
	</div>
	<div class="col-sm-6">		
		@include('usuarios.partials.form')
	</div>
@endsection