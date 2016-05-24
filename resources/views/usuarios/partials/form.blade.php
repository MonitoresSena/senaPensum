{!! Form::open(['route' => (!$usuario->exists? ['admin.usuarios.store'] : ['admin.usuarios.update', $usuario->id]), 'method' => ($usuario->exists? 'PUT' : 'POST'), 'id' => 'form-usuarios']) !!}

<div class="form-group">
	{!! Form::label('name', 'Nombre') !!}
	{!! Form::text('name', $usuario->name, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre de usuario', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'E-mail') !!}
	{!! Form::email('email', $usuario->email, ['class' => 'form-control required', 'placeholder' => 'Ingrese el correo electrónico del usuario']) !!}
</div>

@if(!$usuario->exists)

<div class="form-group">
	{!! Form::label('password', 'Contraseña') !!}
	{!! Form::password('password', ['class' => 'form-control required', 'placeholder' => 'Ingrese la contraseña']) !!}
</div>

@endif

<div class="form-group">
	{!! Form::label('role_id', 'Rol') !!}
	<div class="row">		
		<div class="col-sm-9">
			{!! Form::select('rol_id', $rolesOpc, $usuario->rol_id, ['class' => 'form-control required', 'data-select-two' => true]) !!}
		</div>
		<div class="col-sm-3">
			<button id="add-role" class="btn btn-info">
				Crear rol <i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
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

{!! Form::open(['route' => ['admin.usuarios.storeAjx'], 'method' => 'POST', 'id' => 'form-ajx-usuarios']) !!}
	<input type="hidden" value="Hola jako" name="saludo">
{!! Form::close() !!}

<script>
	jQuery(function(){
		jQuery("#form-usuarios").validar();

		jQuery("#add-role").click(function(){
			guardarRole();
			return false;
		});
	});

	function guardarRole(){
		var form = $("#form-ajx-usuarios");
		var url = form.attr('action');
		var data = form.serialize();
		
		console.log(data);

		$.post(url, data, function(obj){
			console.log(obj.msg);
		});
	}

</script>