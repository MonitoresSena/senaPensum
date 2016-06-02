
{!! Form::open(['route' => (!$rol->exists? ['admin.roles.store'] : ['admin.roles.update', $rol->id]), 'method' => ($rol->exists? 'PUT' : 'POST'), 'id' => 'form-roles']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $rol->nombre, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre del rol', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $rol->exists? "primary" : "success" }} btn-block">
				{{ $rol->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.roles.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>

{!! Form::close() !!}

<script>
	jQuery(function(){
		jQuery("#form-roles").validar();
	});
</script>