@extends('templates.main')
@section('title', 'Listado de Rrogramas')
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
			@foreach($programs AS $program)
			<tr>
				<td>{{ $program->id }}</td>
				<td>{{ $program->codigo }}</td>
				<td>{{ $program->nombre }}</td>
				<td>{{ $program->version }}</td>
				<td>{{ $program->descripcion }}</td>
				<td>{{ $program->proyecto_formativo }}</td>
				<!-- <td></td> -->
				<td class="text-center">
					<a title="Editar" href="{{ route('admin.programs.show', $program->id) }}" class="btn btn-default">
						<i class="fa fa-eye"></i>
					</a>
					<a title="Editar" href="{{ route('admin.programs.edit', $program->id) }}" class="btn btn-warning">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.programs.destroy', $program->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $programs->render() !!}
@endsection