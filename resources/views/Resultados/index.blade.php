@extends('templates.main')
@section('title', 'Listado de Resultados de aprendizaje')
@section('content')
	
	<div class="form-group">
		<a class="btn btn-primary" href="{{ route('admin.Resultados.create') }}">
			Registrar <i class="fa fa-user"></i>
		</a>
	</div>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Denominacion</th>
				<th>Id Competencia</th>
				<th class="text-center">Estado</th>
				<th class="col-sm-1">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($Resultados AS $Result)
			<tr>
				<td>{{ $Result->id }}</td>
				<td>{{ $Result->Denominacion }}</td>
				<td>{{ $Result->Id_competencia }}</td>
				<td class="text-center">		
					@if($Result->Estado == 1)
					<span class="label label-success">Activo</span>
					@else
					<span class="label label-default">Inactivo</span>
					@endif
				<!-- <td cl</td>

			ass="text-center">
					
					
				</td> -->
				<td class="text-center col-options">
					
					</a>
					<a title="Editar" href="{{ route('admin.Resultados.edit', $Result->id) }}" class="">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.Resultados.destroy', $Result->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $Resultados->render() !!}
@endsection