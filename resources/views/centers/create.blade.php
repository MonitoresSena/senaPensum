@extends('templates.main')
@section('title', 'Registrar Centro')
@section('content')
	<div class="page-header">
		<h3>Registrar Centro</h3>
	</div>
	<div class="col-sm-6">
		@include('centers.partials.form')
	</div>
@endsection