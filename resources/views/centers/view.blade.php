@extends('templates.main')
@section('title', 'Detalles Centro')
@section('content')
	<div class="page-header">
		<h3>Ver Detalles Centro</h3>
	</div>

	<div class="col-sm-6">		
		<div class="panel panel-default">	
			<div class="panel-heading">
				{{ $center->nombre }}
			</div>
			<table class="table table-hover table-bordered">
				<tr><th>Descripción</th><td>{{ $center->descripcion }}</td></tr>
				<tr><th>Empresa Asociada</th><td>{{ $center->id_company }}</td></tr>
			</table>
			<div class="panel-footer">
				<div class="form-group">
					<a href="{{ route('admin.centers.index') }}" class="btn btn-default">
						<i class="fa fa-reply"></i> Volver
					</a>
				</div>
			</div>
		</div>
		
	</div>
@endsection