@extends('templates.main')
@section('title', 'Registrar Conocimientos')
@section('content')
	<div class="page-header">
		<h3>Registrar Conocimiento</h3>
	</div>
	<div class="col-sm-6">
		@include('Conocimientos.partials.form')
	</div>
@endsection