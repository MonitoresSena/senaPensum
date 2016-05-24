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
				<th>Rol</th>
				<th>E-mail</th>
				<th class="text-center">Estado</th>
				<th class="col-sm-1">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios AS $usuario)
			<tr>
				<td>{{ $usuario->id }}</td>
				<td>{{ $usuario->name }}</td>
				<td>{{ $usuario->Rol->nombre }}</td>
				<td>{{ $usuario->email }}</td>
				<td class="text-center">
					@if($usuario->state == 1)
					<span class="label label-success">Activo</span>
					@else
					<span class="label label-default">Inactivo</span>
					@endif
					
				</td>
				<td class="text-center col-options">
					<a title="Editar" href="{{ route('admin.usuarios.show', $usuario->id) }}" class="">
						<i class="fa fa-eye"></i>
					</a>
					<a title="Editar" href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.usuarios.destroy', $usuario->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $usuarios->render() !!}
@endsection