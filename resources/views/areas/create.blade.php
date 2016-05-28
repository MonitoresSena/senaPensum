@extends('templates.main')
@section('title', 'Registrar Area')
@section('content')
	<div class="page-header">
		<h3>Registrar Area</h3>
	</div>
	<div class="col-sm-6">
		@include('areas.partials.form')
	</div>
@endsection