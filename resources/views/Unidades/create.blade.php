@extends('templates.main')
@section('title', 'Registrar Unidad Tematica')
@section('content')
	<div class="page-header">
		<h3>Registrar Unidad tematica</h3>
	</div>
	<div class="col-sm-6">
		@include('Unidades.partials.form')
	</div>
@endsection