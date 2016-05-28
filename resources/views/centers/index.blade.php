@extends('templates.main')
@section('title', 'Listado de Centros')
@section('content')
	
	<div class="form-group">
		<a class="btn btn-primary" href="{{ route('admin.centers.create') }}">
			Registrar <i class="fa fa-user"></i>
		</a>
	</div>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>id municipio</th>
			</tr>
		</thead>
		<tbody>
			@foreach($centers AS $cent)
			<tr>
				<td>{{ $cent->id }}</td>
				<td>{{ $cent->nombre }}</td>
				<td>{{ $cent->descripcion }}</td>
				<td>{{ $cent->id_municipio}}</td>
				<!-- <td></td> -->
				<td class="text-center">
					<a title="Editar" href="{{ route('admin.centers.show', $cent->id) }}" class="btn btn-default">
						<i class="fa fa-eye"></i>
					</a>
					<a title="Editar" href="{{ route('admin.centers.edit', $cent->id) }}" class="btn btn-warning">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.centers.destroy', $cent->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $centers->render() !!}
@endsection