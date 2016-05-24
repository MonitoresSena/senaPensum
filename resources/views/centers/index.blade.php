@extends('templates.main')
@section('title', 'Listado de Usuarios')
@section('content')
	
	<div class="form-group">
		<a class="btn btn-primary" href="{{ route('admin.usuarios.create') }}">
			Registrar <i class="fa fa-user"></i>
		</a>
	</div>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>E-mail</th>
				<th>Estado</th>
				<!-- <th>Rol</th> -->
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios AS $usuario)
			<tr>
				<td>{{ $usuario->id }}</td>
				<td>{{ $usuario->name }}</td>
				<td>{{ $usuario->email }}</td>
				<td>{{ $usuario->state }}</td>
				<!-- <td></td> -->
				<td class="text-center">
					<a title="Editar" href="{{ route('admin.usuarios.show', $usuario->id) }}" class="btn btn-default">
						<i class="fa fa-eye"></i>
					</a>
					<a title="Editar" href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-warning">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.usuarios.destroy', $usuario->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $usuarios->render() !!}
@endsection