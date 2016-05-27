@extends('templates.main')
@section('title', 'Registrar Competencia')
@section('content')
	<div class="page-header">
		<h3>Registrar Competencia</h3>
	</div>
	<div class="col-sm-6">
		@include('Competencias.partials.form')
	</div>
@endsection