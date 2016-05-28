
{!! Form::open(['route' => (!$are->exists? ['admin.areas.store'] : ['admin.areas.update', $are->id]), 'method' => ($are->exists? 'PUT' : 'POST'), 'id' => 'form-are']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $are->nombre, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre', 'autofocus' => true]) !!}
</div>


<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $are->exists? "primary" : "success" }} btn-block">
				{{ $are->exists? "Actualizar" : "Guardar" }}
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

<script>
	jQuery(function(){
		jQuery("#form-are").validar();
	});
</script>