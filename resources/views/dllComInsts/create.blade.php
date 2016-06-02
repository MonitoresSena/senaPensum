@extends('templates.main')
@section('title', 'Registrar enlace instructor-competencia')
@section('content')
	<div class="page-header">
		<h3>Registrar enlace</h3>
	</div>
	<div class="col-sm-6">
		@include('dllComInsts.partials.form')
	</div>
@endsection