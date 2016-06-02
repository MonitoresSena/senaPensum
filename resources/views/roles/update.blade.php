@extends('templates.main')
@section('title', 'Actualizar Rol')
@section('content')
	<div class="page-header">
		<h3>Actualizar Rol</h3>
	</div>
	<div class="col-sm-6">		
		@include('roles.partials.form')
	</div>
@endsection