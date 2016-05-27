@extends('templates.main')
@section('title', 'Listado de Procesos')
@section('content')
	<div class="col-sm-6">
		<div class="form-group">
			<a class="btn btn-primary" href="{{ route('admin.Procesos.create') }}">
				Registrar <i class="fa fa-plus"></i>
			</a>
		</div>

		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th class="text-center">Estado</th>

					<th class="col-sm-2">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($Procesos AS $Proc)
				<tr>
					<td>{{ $Proc->id }}</td>
					<td>{{ $Proc->nombre }}</td>
					<td class="text-center">		
					@if($Proc->estado == 1)
					<span class="label label-success">Activo</span>
					@else
					<span class="label label-default">Inactivo</span>
					@endif 
				</td>
					<td class="text-center col-options">
						<a title="Editar" href="{{ route('admin.Procesos.edit', $Proc->id) }}" class="">
							<i class="fa fa-pencil"></i>
						</a>
						<a title="Editar" href="{{ route('admin.Procesos.destroy', $Proc->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
							<i class="fa fa-trash"></i>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $Procesos->render() !!}
	</div>
@endsection