@extends('templates.main')
@section('title', 'Actualizar Criterio de aprendizaje')
@section('content')
	<div class="page-header">
		<h3>Actualizar Criterio</h3>
	</div>
	<div class="col-sm-6">		
		@include('Criterios.partials.form')
	</div>
@endsection