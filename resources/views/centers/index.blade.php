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
				<th>Empresa Relacionada</th>
			</tr>
		</thead>
		<tbody>
			@foreach($centers AS $center)
			<tr>
				<td>{{ $center->id }}</td>
				<td>{{ $center->nombre }}</td>
				<td>{{ $center->descripcion }}</td>
				<td>{{ $center->id_company }}</td>
				<!-- <td></td> -->
				<td class="text-center">
					<a title="Editar" href="{{ route('admin.centers.show', $center->id) }}" class="btn btn-default">
						<i class="fa fa-eye"></i>
					</a>
					<a title="Editar" href="{{ route('admin.centers.edit', $center->id) }}" class="btn btn-warning">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.centers.destroy', $center->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $centers->render() !!}
@endsection