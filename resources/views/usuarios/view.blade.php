@extends('templates.main')
@section('title', 'Detalles Usuario')
@section('content')
	<div class="page-header">
		<h3>Ver Detalles Usuario</h3>
	</div>

	<div class="col-sm-6">		
		<div class="panel panel-default">	
			<div class="panel-heading">
				{{ $usuario->name }}
			</div>
			<table class="table table-hover table-bordered">
				<tr><th>E-mail</th><td>{{ $usuario->email }}</td></tr>
				<tr><th>Rol</th><td>{{ $usuario->Rol->nombre }}</td></tr>
			</table>
			<div class="panel-footer">
				<div class="form-group">
					<a href="{{ route('admin.usuarios.index') }}" class="btn btn-default">
						<i class="fa fa-reply"></i> Volver
					</a>
				</div>
			</div>
		</div>
		
	</div>
@endsection