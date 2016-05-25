{!! Form::open(['route' => !$usuario->exists? 'admin.usuarios.store' : ['admin.usuarios.update', $usuario->id], 'method' => 'PUT']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $usuario->name, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del programa', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	{!! Form::label('version', 'Versión') !!}
	{!! Form::text('version', $usuario->version, ['class' => 'form-control', 'placeholder' => 'Ingrese la versión del usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('codigo', 'Código') !!}
	{!! Form::text('codigo', $usuario->codigo, ['class' => 'form-control', 'placeholder' => 'Ingrese el código del usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('fecha_inicio', 'Fecha de Inicio') !!}
	{!! Form::text('fecha_inicio', $usuario->fecha_inicio, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de fecha_fin del usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('fecha_fin', 'Fecha final') !!}
	{!! Form::text('fecha_fin', $usuario->fecha_fin, ['class' => 'form-control', 'placeholder' => 'Ingrese la versión del usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('dur_lectiva', 'Duración de Etapa Lectiva') !!}
	{!! Form::text('dur_lectiva', $usuario->dur_lectiva, ['class' => 'form-control', 'placeholder' => 'Ingrese la duración de la etapa lectiva del usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('dur_practica', 'Duración de Etapa Práctica') !!}
	{!! Form::text('dur_practica', $usuario->dur_practica, ['class' => 'form-control', 'placeholder' => 'Ingrese la duración de la etapa práctica del usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('justificacion', 'Justificación') !!}
	{!! Form::text('justificacion', $usuario->justificacion, ['class' => 'form-control', 'placeholder' => 'Ingrese la justificación del usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('requisitos', 'Requisitos del Aprendiz') !!}
	{!! Form::text('requisitos', $usuario->requisitos, ['class' => 'form-control', 'placeholder' => 'Ingrese los requisitos del aprendiz aspirante al usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('descripcion', 'Descripción') !!}
	{!! Form::text('descripcion', $usuario->descripcion, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción del usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('ocupaciones', 'Ocupaciones') !!}
	{!! Form::text('ocupaciones', $usuario->ocupaciones, ['class' => 'form-control', 'placeholder' => 'Ingrese las ocupaciones del egresado del usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('proyecto_formativo', 'Proyecto Formativo') !!}
	{!! Form::text('proyecto_formativo', $usuario->proyecto_formativo, ['class' => 'form-control', 'placeholder' => 'Ingrese el proyecto formativo del usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('resultados_practica', 'Resultados Práctica') !!}
	{!! Form::text('resultados_practica', $usuario->resultados_practica, ['class' => 'form-control', 'placeholder' => 'Ingrese los resultados de las prácticas del usuario']) !!}
</div>

<div class="form-group">
	{!! Form::label('url_proyecto_formativo', 'Url del Proyecto Formativo') !!}
	{!! Form::text('url_proyecto_formativo', $usuario->url_proyecto_formativo, ['class' => 'form-control', 'placeholder' => 'Ingrese la url proyecto formativo del usuario']) !!}
</div>

@if(!$usuario->exists)

<div class="form-group">
	{!! Form::label('password', 'Contraseña') !!}
	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseña']) !!}
</div>

@endif


<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $usuario->exists? "primary" : "success" }} btn-block">
				{{ $usuario->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.usuarios.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>
{!! Form::close() !!}