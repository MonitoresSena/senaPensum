@extends('templates.main')
@section('title', 'Registrar Sectores')
@section('content')
	<div class="page-header">
		<h3>Registrar Sectores</h3>
	</div>
	<div class="col-sm-6">
		@include('sectors.partials.form')
	</div>
@endsection