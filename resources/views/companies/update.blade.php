@extends('templates.main')
@section('title', 'Actualizar Empresa')
@section('content')
	<div class="page-header">
		<h3>Actualizar Empresa</h3>
	</div>
	<div class="col-sm-6">		
		@include('companies.partials.form')
	</div>
@endsection