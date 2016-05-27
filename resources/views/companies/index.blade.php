@extends('templates.main')
@section('title', 'Listado de Empresas')
@section('content')
	
	<div class="form-group">
		<a class="btn btn-primary" href="{{ route('admin.empresas.create') }}">
			Registrar <i class="fa fa-user"></i>
		</a>
	</div>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($empresas AS $empresa)
			<tr>
				<td>{{ $empresa->id }}</td>
				<td>{{ $empresa->nombre }}</td>
				<!-- <td></td> -->
				<td class="text-center">
					<a title="Editar" href="{{ route('admin.empresas.show', $empresa->id) }}" class="btn btn-default">
						<i class="fa fa-eye"></i>
					</a>
					<a title="Editar" href="{{ route('admin.empresas.edit', $empresa->id) }}" class="btn btn-warning">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.empresas.destroy', $empresa->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $empresas->render() !!}
@endsection