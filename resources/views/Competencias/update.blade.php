@extends('templates.main')
@section('title', 'Actualizar Competencias')
@section('content')
	<div class="page-header">
		<h3>Actualizar Competencia</h3>
	</div>
	<div class="col-sm-6">		
		@include('Competencias.partials.form')
	</div>
@endsection