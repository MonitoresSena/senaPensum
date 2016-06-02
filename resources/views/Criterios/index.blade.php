@extends('templates.main')
@section('title', 'Listado de Criterios de evaluacion')
@section('content')
	
	<div class="form-group">
		<a class="btn btn-primary" href="{{ route('admin.Criterios.create') }}">
			Registrar <i class="fa fa-user"></i>
		</a>
	</div>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Id Resultado Aprendizaje</th>
				<th class="text-center">Estado</th>
				<th class="col-sm-1">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($Criterios AS $Crit)
			<tr>
				<td>{{ $Crit->id }}</td>
				<td>{{ $Crit->nombre }}</td>
				<td>{{ $Crit->id_resultado }}</td>
				<td class="text-center">		
					@if($Crit->estado == 1)
					<span class="label label-success">Activo</span>
					@else
					<span class="label label-default">Inactivo</span>
					@endif 
				</td>
				
				<!-- <td cl</td>

			ass="text-center">
					
					
				</td> -->
				<td class="text-center col-options">
					
					</a>
					<a title="Editar" href="{{ route('admin.Criterios.edit', $Crit->id) }}" class="">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.Criterios.destroy', $Crit->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $Criterios->render() !!}
@endsection