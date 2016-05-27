@extends('templates.main')
@section('title', 'Actualizar Conocimiento')
@section('content')
	<div class="page-header">
		<h3>Actualizar Conocimiento</h3>
	</div>
	<div class="col-sm-6">		
		@include('Conocimientos.partials.form')
	</div>
@endsection