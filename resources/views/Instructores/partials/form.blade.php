
{!! Form::open(['route' => (!$Instruct->exists? ['admin.Instructores.store'] : ['admin.Instructores.update', $Instruct->id]), 'method' => ($Instruct->exists? 'PUT' : 'POST'), 'id' => 'form-Instructores']) !!}

	<div class="form-group">
	{!! Form::label('Nombre', 'Nombre') !!}
	{!! Form::text('Nombre', $Instruct->Nombre, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre del Instructor', 'autofocus' => true]) !!}
	</div>

	<div class="form-group">
	{!! Form::label('Apellido', 'Apellido') !!}
	{!! Form::text('Apellido', $Instruct->Apellido, ['class' => 'form-control required', 'placeholder' => 'Ingrese el apellido del Instructor', 'autofocus' => true]) !!}
	</div>

	<div class="form-group">
	{!! Form::label('Identificacion', 'Identificacion') !!}
	{!! Form::text('Identificacion', $Instruct->Identificacion, ['class' => 'form-control required', 'placeholder' => 'Ingrese el numero de identificacion del Instructor', 'autofocus' => true]) !!}
	</div>

	<div class="form-group">
	{!! Form::label('Email', 'E-mail') !!}
	{!! Form::email('Email', $Instruct->Email, ['class' => 'form-control required', 'placeholder' => 'Ingrese el E-Mail del usuario', 'autofocus' => true]) !!}
	</div>

	
</div>

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $Instruct->exists? "primary" : "success" }} btn-block">
				{{ $Instruct->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.Instructores.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>

{!! Form::close() !!}

<script>
	jQuery(function(){
		jQuery("#form-Instructores").validar();
	});
</script>