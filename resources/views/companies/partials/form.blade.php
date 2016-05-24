{!! Form::open(['route' => !$empresa->exists? 'admin.empresas.store' : ['admin.empresas.update', $empresa->id], 'method' => 'PUT']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nomnre', $empresa->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de empresa', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	{!! Form::label('descripcion', 'Descripción') !!}
	{!! Form::text('descripcion', $empresa->descripcion, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción empresa']) !!}
</div>

@if(!$empresa->exists)

<div class="form-group">
	{!! Form::label('password', 'Contraseña') !!}
	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseña']) !!}
</div>

@endif

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $empresa->exists? "primary" : "success" }} btn-block">
				{{ $empresa->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.empresas.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>
{!! Form::close() !!}