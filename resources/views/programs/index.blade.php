@extends('templates.main')
@section('title', 'Listado de Programas')
@section('content')
	
	<div class="form-group">
		<a class="btn btn-primary" href="{{ route('admin.programs.create') }}">
			Registrar <i class="fa fa-user"></i>
		</a>
	</div>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Versión</th>
				<th>Descripción</th>
				<th>Proyecto Formativo</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($programs AS $prog)
			<tr>
				<td>{{ $prog->id }}</td>
				<td>{{ $prog->codigo }}</td>
				<td>{{ $prog->nombre }}</td>
				<td>{{ $prog->version }}</td>
				<td>{{ $prog->descripcion }}</td>
				<td>{{ $prog->proyecto_formativo }}</td>
				<!-- <td></td> -->
				<td class="text-center">
					<a title="Editar" href="{{ route('admin.programs.show', $prog->id) }}" class="btn btn-default">
						<i class="fa fa-eye"></i>
					</a>
					<a title="Editar" href="{{ route('admin.programs.edit', $prog->id) }}" class="btn btn-warning">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.programs.destroy', $prog->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $programs->render() !!}
@endsection