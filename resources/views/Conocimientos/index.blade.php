@extends('templates.main')
@section('title', 'Listado de Conocimientos')
@section('content')
	
	<div class="form-group">
		<a class="btn btn-primary" href="{{ route('admin.Conocimientos.create') }}">
			Registrar <i class="fa fa-user"></i>
		</a>
	</div>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>descripcion</th>
				<th>id proceso</th>
				<th>id unidad tematica	</th>
				<th class="text-center">Estado</th>


				<th class="col-sm-1">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($Conocimientos AS $Conoc)
			<tr>
				<td>{{ $Conoc->id }}</td>
				<td>{{ $Conoc->nombre }}</td>
				<td>{{ $Conoc->descripcion }}</td>
				<td>{{ $Conoc->id_proceso }}</td>
				<td>{{ $Conoc->id_unidad }}</td>
				<td class="text-center">		
					@if($Conoc->estado == 1)
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
					<a title="Editar" href="{{ route('admin.Conocimientos.edit', $Conoc->id) }}" class="">
						<i class="fa fa-pencil"></i>
					</a>
					<a title="Editar" href="{{ route('admin.Conocimientos.destroy', $Conoc->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $Conocimientos->render() !!}
@endsection