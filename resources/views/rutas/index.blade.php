@extends('templates.main')
@section('title', 'Listado de Rutas')
@section('content')
	
	<div class="form-group">
		<a class="btn btn-primary" href="{{ route('admin.rutas.create') }}">
			Registrar <i class="fa fa-user"></i>
		</a>
	</div>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th class="col-sm-1">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($rutas AS $ruta)
			<tr>
				<td>{{ $ruta->id }}</td>
				<td>{{ $ruta->ruta }}</td>
				<td class="text-center col-options">
					<a title="Editar" href="{{ route('admin.rutas.edit', $ruta->id) }}" class="">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.rutas.destroy', $ruta->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $rutas->render() !!}
@endsection