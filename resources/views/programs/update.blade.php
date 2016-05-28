@extends('templates.main')
@section('title', 'Actualizar Programas')
@section('content')
	<div class="page-header">
		<h3>Actualizar Programa</h3>
	</div>
	<div class="col-sm-6">		
		@include('programs.partials.form')
	</div>
@endsection