@extends('templates.main')
@section('title', 'Listado de Roles')
@section('content')
	<div class="col-sm-6">
		<div class="form-group">
			<a class="btn btn-primary" href="{{ route('admin.roles.create') }}">
				Registrar <i class="fa fa-plus"></i>
			</a>
		</div>

		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th class="col-sm-2">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles AS $rol)
				<tr>
					<td>{{ $rol->id }}</td>
					<td>{{ $rol->nombre }}</td>
					<td class="text-center col-options">
						<a title="Editar" href="{{ route('admin.roles.edit', $rol->id) }}" class="">
							<i class="fa fa-pencil"></i>
						</a>
						<a title="Editar" href="{{ route('admin.roles.destroy', $rol->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
							<i class="fa fa-trash"></i>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $roles->render() !!}
	</div>
@endsection