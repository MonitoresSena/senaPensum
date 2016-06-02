@extends('templates.main')
@section('title', 'Listado de Sectores')
@section('content')
	
	<div class="form-group">
		<a class="btn btn-primary" href="{{ route('admin.sectors.create') }}">
			Registrar <i class="fa fa-user"></i>
		</a>
	</div>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Centro Relacionado</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sectors AS $sector)
			<tr>
				<td>{{ $sector->id }}</td>
				<td>{{ $sector->nombre }}</td>
				<td>{{ $sector->descripcion }}</td>
				<td>{{ $sector->id_centro }}</td>
				<!-- <td></td> -->
				<td class="text-center">
					<a title="Editar" href="{{ route('admin.sectors.show', $sector->id) }}" class="btn btn-default">
						<i class="fa fa-eye"></i>
					</a>
					<a title="Editar" href="{{ route('admin.sectors.edit', $sector->id) }}" class="btn btn-warning">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.sectors.destroy', $sector->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $sectors->render() !!}
@endsection