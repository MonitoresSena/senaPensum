@extends('templates.main')
@section('title', 'Listado de Competencias')
@section('content')
	<div class="col-sm-6">
		<div class="form-group">
			<a class="btn btn-primary" href="{{ route('admin.Competencias.create') }}">
				Registrar <i class="fa fa-plus"></i>
			</a>
		</div>

		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Codigo</th>
					<th>Denominacion</th>
					<th>Duracion</th>
					<th>Estado</th>


					<th class="col-sm-2">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($Competencias AS $Compet)
				<tr>
					<td>{{ $Compet->id }}</td>
					<td>{{ $Compet->Codigo }}</td>
					<td>{{ $Compet->Denominacion }}</td>
					<td>{{ $Compet->Duracion }}</td>
					<td>{{ $Compet->Estado }}</td>
						<td class="text-center col-options">
						<a title="Editar" href="{{ route('admin.Competencias.edit', $Compet->id) }}" class="">
							<i class="fa fa-pencil"></i>
						</a>
						<a title="Editar" href="{{ route('admin.Competencias.destroy', $Compet->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
							<i class="fa fa-trash"></i>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $Competencias->render() !!}
	</div>
@endsection