@extends('templates.main')
@section('title', 'Registrar enlace programa-competencia')
@section('content')
	<div class="page-header">
		<h3>Registrar enlace</h3>
	</div>
	<div class="col-sm-6">
		@include('dllComProgs.partials.form')
	</div>
@endsection