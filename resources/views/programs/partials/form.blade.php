{!! Form::open(['route' => !$program->exists? 'admin.programs.store' : ['admin.programs.update', $program->id], 'method' => 'PUT']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $program->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del programa', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	{!! Form::label('version', 'Versión') !!}
	{!! Form::text('version', $program->version, ['class' => 'form-control', 'placeholder' => 'Ingrese la versión del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('codigo', 'Código') !!}
	{!! Form::text('codigo', $program->codigo, ['class' => 'form-control', 'placeholder' => 'Ingrese el código del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('fecha_inicio', 'Fecha de Inicio') !!}
	{!! Form::text('fecha_inicio', $program->fecha_inicio, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de fecha_fin del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('fecha_fin', 'Fecha final') !!}
	{!! Form::text('fecha_fin', $program->fecha_fin, ['class' => 'form-control', 'placeholder' => 'Ingrese la versión del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('dur_lectiva', 'Duración de Etapa Lectiva') !!}
	{!! Form::text('dur_lectiva', $program->dur_lectiva, ['class' => 'form-control', 'placeholder' => 'Ingrese la duración de la etapa lectiva del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('dur_practica', 'Duración de Etapa Práctica') !!}
	{!! Form::text('dur_practica', $program->dur_practica, ['class' => 'form-control', 'placeholder' => 'Ingrese la duración de la etapa práctica del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('justificacion', 'Justificación') !!}
	{!! Form::text('justificacion', $program->justificacion, ['class' => 'form-control', 'placeholder' => 'Ingrese la justificación del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('requisitos', 'Requisitos del Aprendiz') !!}
	{!! Form::text('requisitos', $program->requisitos, ['class' => 'form-control', 'placeholder' => 'Ingrese los requisitos del aprendiz aspirante al program']) !!}
</div>

<div class="form-group">
	{!! Form::label('descripcion', 'Descripción') !!}
	{!! Form::text('descripcion', $program->descripcion, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('ocupaciones', 'Ocupaciones') !!}
	{!! Form::text('ocupaciones', $program->ocupaciones, ['class' => 'form-control', 'placeholder' => 'Ingrese las ocupaciones del egresado del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('proyecto_formativo', 'Proyecto Formativo') !!}
	{!! Form::text('proyecto_formativo', $program->proyecto_formativo, ['class' => 'form-control', 'placeholder' => 'Ingrese el proyecto formativo del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('resultados_practica', 'Resultados Práctica') !!}
	{!! Form::text('resultados_practica', $program->resultados_practica, ['class' => 'form-control', 'placeholder' => 'Ingrese los resultados de las prácticas del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('url_proyecto_formativo', 'Url del Proyecto Formativo') !!}
	{!! Form::text('url_proyecto_formativo', $program->url_proyecto_formativo, ['class' => 'form-control', 'placeholder' => 'Ingrese la url proyecto formativo del program']) !!}
</div>

@if(!$program->exists)

<div class="form-group">
	{!! Form::label('password', 'Contraseña') !!}
	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseña']) !!}
</div>

@endif


<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $program->exists? "primary" : "success" }} btn-block">
				{{ $program->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.programs.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>
{!! Form::close() !!}