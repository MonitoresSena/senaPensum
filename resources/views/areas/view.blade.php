@extends('templates.main')
@section('title', 'Detalles Area')
@section('content')
	<div class="page-header">
		<h3>Ver Detalles Area</h3>
	</div>

	<div class="col-sm-6">		
		<div class="panel panel-default">	
			<div class="panel-heading">
				{{ $area->nombre }}
			</div>
			<table class="table table-hover table-bordered">
				<tr><th>Descripción</th><td>{{ $area->descripcion }}</td></tr>
				<tr><th>Sector</th><td>{{ $area->id_sector }}</td></tr>
			</table>
			<div class="panel-footer">
				<div class="form-group">
					<a href="{{ route('admin.areas.index') }}" class="btn btn-default">
						<i class="fa fa-reply"></i> Volver
					</a>
				</div>
			</div>
		</div>
		
	</div>
@endsection