@extends('templates.main')
@section('title', 'Actualizar instructores')
@section('content')
	<div class="page-header">
		<h3>Actualizar instructor</h3>
	</div>
	<div class="col-sm-6">		
		@include('Instructores.partials.form')
	</div>
@endsection