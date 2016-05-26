@extends('templates.main')
@section('title', 'Registrar Instructor')
@section('content')
	<div class="page-header">
		<h3>Registrar instructor</h3>
	</div>
	<div class="col-sm-6">
		@include('Instructores.partials.form')
	</div>
@endsection