@extends('templates.main')
@section('title', 'Registrar Criterios de aprendizajes')
@section('content')
	<div class="page-header">
		<h3>Registrar Criterio</h3>
	</div>
	<div class="col-sm-6">
		@include('Criterios.partials.form')
	</div>
@endsection