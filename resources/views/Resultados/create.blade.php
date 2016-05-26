@extends('templates.main')
@section('title', 'Registrar Resultado de aprendizaje')
@section('content')
	<div class="page-header">
		<h3>Registrar Resultado</h3>
	</div>
	<div class="col-sm-6">
		@include('Resultados.partials.form')
	</div>
@endsection