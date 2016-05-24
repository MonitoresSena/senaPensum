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
					<th class="col-sm-2">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($Instructores AS $Instruc)
				<tr>
					<td>{{ $Instruc->id }}</td>
					<td>{{ $Instruc->nombre }}</td>
					<td>{{ $Instruc->Apellido }}</td>
					<td>{{ $Instruc->Identificacion }}</td>
					<td>{{ $Instruc->Email }}</td>
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
		{!! $Inst->render() !!}
	</div>
@endsection