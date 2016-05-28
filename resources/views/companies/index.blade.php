@extends('templates.main')
@section('title', 'Listado de Empresas')
@section('content')
	
	<div class="form-group">
		<a class="btn btn-primary" href="{{ route('admin.companies.create') }}">
			Registrar <i class="fa fa-user"></i>
		</a>
	</div>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($companies AS $comp)
			<tr>
				<td>{{ $comp->id }}</td>
				<td>{{ $comp->nombre }}</td>
				<td>{{ $comp->descripcion}}</td>
				<!-- <td></td> -->
				<td class="text-center">
					<a title="Editar" href="{{ route('admin.companies.show', $comp->id) }}" class="btn btn-default">
						<i class="fa fa-eye"></i>
					</a>
					<a title="Editar" href="{{ route('admin.companies.edit', $comp->id) }}" class="btn btn-warning">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.companies.destroy', $comp->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $companies->render() !!}
@endsection