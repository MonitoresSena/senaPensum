@extends('templates.main')
@section('title', 'Listado de Instructores')
@section('content')
	<div class="col-sm-6">
		<div class="form-group">
			<a class="btn btn-primary" href="{{ route('admin.Instructores.create') }}">
				Registrar <i class="fa fa-plus"></i>
			</a>
		</div>

		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Identificacion</th>
					<th>Email</th>


					<th class="col-sm-2">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($Instructores AS $Instruct)
				<tr>
					<td>{{ $Instruct->id }}</td>
					<td>{{ $Instruct->Nombre }}</td>
					<td>{{ $Instruct->Apellido }}</td>
					<td>{{ $Instruct->Identificacion }}</td>
					<td>{{ $Instruct->Email }}</td>

					<td class="text-center col-options">
						<a title="Editar" href="{{ route('admin.Instructores.edit', $Instruct->id) }}" class="">
							<i class="fa fa-pencil"></i>
						</a>
						<a title="Editar" href="{{ route('admin.Instructores.destroy', $Instruct->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
							<i class="fa fa-trash"></i>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $Instructores->render() !!}
	</div>
@endsection