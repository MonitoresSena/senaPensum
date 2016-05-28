@extends('templates.main')
@section('title', 'Detalles Sector')
@section('content')
	<div class="page-header">
		<h3>Ver Detalles Sector</h3>
	</div>

	<div class="col-sm-6">		
		<div class="panel panel-default">	
			<div class="panel-heading">
				{{ $sector->nombre }}
			</div>
			<table class="table table-hover table-bordered">
				<tr><th>Descripción</th><td>{{ $sector->descripcion }}</td></tr>
				<tr><th>Centro Relacionado</th><td>{{ $sector->id_centro }}</td></tr>
			</table>
			<div class="panel-footer">
				<div class="form-group">
					<a href="{{ route('admin.sectors.index') }}" class="btn btn-default">
						<i class="fa fa-reply"></i> Volver
					</a>
				</div>
			</div>
		</div>
		
	</div>
@endsection