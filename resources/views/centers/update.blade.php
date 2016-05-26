@extends('templates.main')
@section('title', 'Actualizar Centro')
@section('content')
	<div class="page-header">
		<h3>Actualizar Centro</h3>
	</div>
	<div class="col-sm-6">		
		@include('centers.partials.form')
	</div>
@endsection