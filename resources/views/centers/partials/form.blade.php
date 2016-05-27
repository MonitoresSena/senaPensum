{!! Form::open(['route' => !$centro->exists? 'admin.centros.store' : ['admin.centros.update', $centro->id], 'method' => 'PUT']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $centro->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de centro', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	{!! Form::label('municipio', 'Municipio') !!}
	{!! Form::text('municipio', $centro->municipio, ['class' => 'form-control', 'placeholder' => 'Ingrese el municipio al que pertenece el centro']) !!}
</div>

<div class="form-group">
	{!! Form::label('descripcion', 'Descripción') !!}
	{!! Form::text('municipio', $centro->descripcion, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción del centro']) !!}
</div>



@if(!$centro->exists)

<div class="form-group">
	{!! Form::label('password', 'Contraseña') !!}
	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseña']) !!}
</div>

@endif

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $centro->exists? "primary" : "success" }} btn-block">
				{{ $centro->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.centros.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>
{!! Form::close() !!}