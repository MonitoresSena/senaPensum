@extends('templates.main')
@section('title', 'Detalles del Programa')
@section('content')
	<div class="page-header">
		<h3>Ver Detalles del Programa</h3>
	</div>

	<div class="col-sm-6">		
		<div class="panel panel-default">	
			<div class="panel-heading">
				{{ $prog->name }}
			</div>
			<table class="table table-hover table-bordered">
				<tr><th>Código</th><td>{{ $prog->codigo }}</td></tr>
				<tr><th>Estado</th><td>{{ $prog->estado }}</td></tr>
				<tr><th>Versión</th><td>{{ $prog->version }}</td></tr>
				<tr><th>Fecha de Inicio</th><td>{{ $prog->fecha_inicio }}</td></tr>
				<tr><th>Fecha Final</th><td>{{ $prog->fecha_fin }}</td></tr>
				<tr><th>Duración de Etapa Lectiva</th><td>{{ $prog->dur_lectiva }}</td></tr>
				<tr><th>Duración de Etapa Práctica</th><td>{{ $prog->dur_practica }}</td></tr>
				<tr><th>Justificación del Programa</th><td>{{ $prog->justificacion }}</td></tr>
				<tr><th>Requisitos para Aspirantes</th><td>{{ $prog->requisitos }}</td></tr>
				<tr><th>Descripción</th><td>{{ $prog->descripcion }}</td></tr>
				<tr><th>Ocupaciones del Egrasado</th><td>{{ $prog->ocupaciones }}</td></tr>
				<tr><th>Resultados de Etapa Práctica</th><td>{{ $prog->resultados_practica }}</td></tr>
				<tr><th>Proyecto Formativo</th><td>{{ $prog->proyecto_formativo }}</td></tr>
				<tr><th>URL del Proyecto Formativo</th><td>{{ $prog->url_proyecto_formativo }}</td></tr>
			</table>
			<div class="panel-footer">
				<div class="form-group">
					<a href="{{ route('admin.programs.index') }}" class="btn btn-default">
						<i class="fa fa-reply"></i> Volver
					</a>
				</div>
			</div>
		</div>
		
	</div>
@endsection