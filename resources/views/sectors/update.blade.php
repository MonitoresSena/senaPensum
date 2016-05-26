@extends('templates.main')
@section('title', 'Actualizar Sector')
@section('content')
	<div class="page-header">
		<h3>Actualizar Sector</h3>
	</div>
	<div class="col-sm-6">		
		@include('sectors.partials.form')
	</div>
@endsection