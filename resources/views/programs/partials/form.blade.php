{!! Form::open(['route' => !$usuario->exists? 'admin.usuarios.store' : ['admin.usuarios.update', $usuario->id], 'method' => 'PUT']) !!}

<div class="form-group">
	{!! Form::label('name', 'Nombre') !!}
	{!! Form::text('name', $usuario->name, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de usuario', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'E-mail') !!}
	{!! Form::text('email', $usuario->email, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo electrónico del usuario']) !!}
</div>

@if(!$usuario->exists)

<div class="form-group">
	{!! Form::label('password', 'Contraseña') !!}
	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseña']) !!}
</div>

@endif

<div class="form-group">
	{!! Form::label('role_id', 'Rol') !!}
	{!! Form::select('role_id', $rolesOpc, $usuario->role_id, ['class' => 'form-control']) !!}
</div>

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