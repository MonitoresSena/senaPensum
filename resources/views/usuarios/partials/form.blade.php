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
			{!! Form::select('rol_id', $rolesOpc, $usuario->rol_id, ['class' => 'form-control required', 'data-select-two' => true, 'id' => 'rol_id']) !!}
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

@include("usuarios.partials.modalRoles")

{!! Form::close() !!}

{!! Form::open(['route' => ['admin.usuarios.storeAjx'], 'method' => 'POST', 'id' => 'form-ajx-usuarios']) !!}
	<input type="hidden" value="Hola jako" name="saludo">
{!! Form::close() !!}

<script>
	jQuery(function(){
		jQuery("#form-usuarios").validar();

		jQuery("#add-role").click(function(){
			jQuery("#modal-roles").modal('show');
			setTimeout(function(){
				jQuery("#role_name").focus().select();
			}, 500);
			return false;
		});
	});

	function guardarRole(){
		var value = jQuery("#role_name");

		if(jQuery.trim(value.val()) == ""){
			alert("Por favor ingrese el nombre del rol");
			value.focus();
			return;
		}

		var ajxInput = value.clone();
		ajxInput.attr("type", "hidden").removeAttr("id");

		var form = $("#form-ajx-usuarios");
		form.append(ajxInput);

		var url = form.attr('action');
		var data = form.serialize();

		value.attr("disabled", "disabled");
		jQuery("#save-role").attr("disabled", "disabled");

		$.post(url, data, function(obj){
			value.removeAttr("disabled");
			jQuery("#save-role").removeAttr("disabled");
			ajxInput.remove();
			jQuery("#modal-roles").modal('hide');

			var select = jQuery("#rol_id").select2('destroy');
			var opt = jQuery("<option/>", {value: obj.id});
			
			opt.html(obj.texto);
			select.append(opt);
			select.select2({
				width: '100%',
			});

			setTimeout(function(){
				select.select2('open');
			}, 400);
			
		});
	}

</script>