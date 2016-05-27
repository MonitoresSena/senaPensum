@extends('templates.main')
@section('title', 'Registrar Proceso')
@section('content')
	<div class="page-header">
		<h3>Registrar Proceso</h3>
	</div>
	<div class="col-sm-6">
		@include('Procesos.partials.form')
	</div>
@endsection