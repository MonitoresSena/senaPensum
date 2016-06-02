{!! Form::open(['route' => (!$prog->exists? ['admin.programs.store'] : ['admin.programs.update', $prog->id]), 'method' => ($prog->exists? 'PUT' : 'POST'), 'id' => 'form-programs']) !!}

<div class="form-group">
    {!! Form::label('area', 'Area') !!}
    {!! Form::select('area', $areas, '', ['class' => 'form-control required', 'data-select-two' => true, 'id' => 'area']) !!}
</div>

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $prog->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del programa', ]) !!}
</div>

<div class="form-group">
	{!! Form::label('version', 'Versión') !!}
	{!! Form::text('version', $prog->version, ['class' => 'form-control', 'placeholder' => 'Ingrese la versión del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('codigo', 'Código') !!}
	{!! Form::text('codigo', $prog->codigo, ['class' => 'form-control', 'placeholder' => 'Ingrese el código del programa']) !!}
</div>

<div class="form-group">
	{!! Form::label('fecha_inicio', 'Fecha de Inicio') !!}
	{!! Form::date('fecha_inicio', $prog->fecha_inicio, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de fecha_fin del programa']) !!}
</div>

<div class="form-group">
	{!! Form::label('fecha_fin', 'Fecha final') !!}
	{!! Form::date('fecha_fin', $prog->fecha_fin, ['class' => 'form-control', 'placeholder' => 'Ingrese la versión del programa']) !!}
</div>

<div class="form-group">
	{!! Form::label('dur_lectiva', 'Duración de Etapa Lectiva (Meses)') !!}
	{!! Form::number('dur_lectiva', $prog->dur_lectiva, ['class' => 'form-control', 'placeholder' => 'Ingrese la duración de la etapa lectiva del programa']) !!}
</div>

<div class="form-group">
	{!! Form::label('dur_productiva', 'Duración de Etapa Práctica (Meses)') !!}
	{!! Form::number('dur_productiva', $prog->dur_productiva, ['class' => 'form-control', 'placeholder' => 'Ingrese la duración de la etapa práctica del programa']) !!}
</div>

<div class="form-group">
	{!! Form::label('justificacion', 'Justificación') !!}
	{!! Form::textarea('justificacion', $prog->justificacion, ['class' => 'form-control', 'placeholder' => 'Ingrese la justificación del programa']) !!}
</div>

<div class="form-group">
	{!! Form::label('requisitos', 'Requisitos del Aprendiz') !!}
	{!! Form::textarea('requisitos', $prog->requisitos, ['class' => 'form-control', 'placeholder' => 'Ingrese los requisitos del aprendiz aspirante al programa']) !!}
</div>

<div class="form-group">
	{!! Form::label('descripcion', 'Descripción') !!}
	{!! Form::textarea('descripcion', $prog->descripcion, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción del programa']) !!}
</div>

<div class="form-group">
	{!! Form::label('ocupaciones', 'Ocupaciones') !!}
	{!! Form::textarea('ocupaciones', $prog->ocupaciones, ['class' => 'form-control', 'placeholder' => 'Ingrese las ocupaciones del egresado del program']) !!}
</div>

<div class="form-group">
	{!! Form::label('proyecto_formativo', 'Proyecto Formativo') !!}
	{!! Form::textarea('proyecto_formativo', $prog->proyecto_formativo, ['class' => 'form-control', 'placeholder' => 'Ingrese el proyecto formativo del programa']) !!}
</div>

<div class="form-group">
	{!! Form::label('resultados_practica', 'Resultados Práctica') !!}
	{!! Form::textarea('resultados_practica', $prog->resultados_practica, ['class' => 'form-control', 'placeholder' => 'Ingrese los resultados de las prácticas del programa']) !!}
</div>

<!--<div class="form-group">
	{!! Form::label('url_proyecto_formativo', 'Url del Proyecto Formativo') !!}
	{!! Form::text('url_proyecto_formativo', $prog->url_proyecto_formativo, ['class' => 'form-control', 'placeholder' => 'Ingrese la url proyecto formativo del programa']) !!}
</div>-->

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $prog->exists? "primary" : "success" }} btn-block">
				{{ $prog->exists? "Actualizar" : "Guardar" }}
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
<script>
    jQuery(function(){
        setTimeout(function(){
            jQuery("#area").select2('open');
        }, 100);
    });
</script>