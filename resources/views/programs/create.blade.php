@extends('templates.main')
@section('title', 'Registrar Programa')
@section('content')
	<div class="page-header">
		<h3>Registrar Programa</h3>
	</div>
	<div class="col-sm-6">
		@include('programs.partials.form')
	</div>
@endsection