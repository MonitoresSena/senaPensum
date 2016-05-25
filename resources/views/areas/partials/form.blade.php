{!! Form::open(['route' => !$ara->exists? 'admin.areas.store' : ['admin.areas.update', $ara->id], 'method' => 'PUT']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $ara->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Compañía', 'autofocus' => true]) !!}
</div>


@if(!$ara->exists)

<div class="form-group">
	{!! Form::label('password', 'Contraseña') !!}
	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseña']) !!}
</div>

@endif

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $ara->exists? "primary" : "success" }} btn-block">
				{{ $ara->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.areas.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>
{!! Form::close() !!}