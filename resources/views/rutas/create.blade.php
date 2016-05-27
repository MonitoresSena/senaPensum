@extends('templates.main')
@section('title', 'Registrar Ruta')
@section('content')
	<div class="page-header">
		<h3>Registrar Ruta</h3>
	</div>
	<div class="col-sm-6">
		@include('rutas.partials.form')
	</div>
@endsection