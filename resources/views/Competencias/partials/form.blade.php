
{!! Form::open(['route' => (!$Compet->exists? ['admin.Competencias.store'] : ['admin.Competencias.update', $Compet->id]), 'method' => ($Compet->exists? 'PUT' : 'POST'), 'id' => 'form-Competencias']) !!}

	<div class="form-group">
	{!! Form::label('Codigo', 'Codigo') !!}
	{!! Form::text('Codigo', $Compet->Codigo, ['class' => 'form-control required', 'placeholder' => 'Ingrese el codigo de la competencia', 'autofocus' => true]) !!}
	</div>

	<div class="form-group">
	{!! Form::label('Denominacion', 'Denominacion') !!}
	{!! Form::text('Denominacion', $Compet->Denominacion, ['class' => 'form-control required', 'placeholder' => 'Ingrese la denominación de la competencia', 'autofocus' => true]) !!}
	</div>

	<div class="form-group">
	{!! Form::label('Duracion', 'Duracion') !!}
	{!! Form::number('Duracion', $Compet->Duracion, ['class' => 'form-control required', 'placeholder' => 'Ingrese la duracion de la competencia', 'autofocus' => true]) !!}
	</div>

	<div class="form-group">
	{!! Form::label('Estado', 'Estado') !!}
	{!! Form::number('Estado', $Compet->Estado, ['class' => 'form-control required', 'placeholder' => 'Ingrese el estado de la competencia (1. activa, 2. inactiva)', 'autofocus' => true]) !!}
	</div>

	
</div>

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $Compet->exists? "primary" : "success" }} btn-block">
				{{ $Compet->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.Competencias.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>

{!! Form::close() !!}

<script>
	jQuery(function(){
		jQuery("#form-Competencias").validar();
	});
</script>