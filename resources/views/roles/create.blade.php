@extends('templates.main')
@section('title', 'Registrar Rol')
@section('content')
	<div class="page-header">
		<h3>Registrar Rol</h3>
	</div>
	<div class="col-sm-6">
		@include('roles.partials.form')
	</div>
@endsection