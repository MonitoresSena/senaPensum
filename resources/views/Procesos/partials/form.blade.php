
{!! Form::open(['route' => (!$Proc->exists? ['admin.Procesos.store'] : ['admin.Proces.update', $Proc->id]), 'method' => ($Proc->exists? 'PUT' : 'POST'), 'id' => 'form-Procesos']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $Proc->nombre, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre del Proceso', 'autofocus' => true]) !!}
</div>
<div class="form-group">
	{!! Form::label('estado', 'estado') !!}
	{!! Form::text('estado', $Proc->estado, ['class' => 'form-control required', 'placeholder' => 'Ingrese el estado del Proceso', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $Proc->exists? "primary" : "success" }} btn-block">
				{{ $Proc->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.Procesos.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>

{!! Form::close() !!}

<script>
	jQuery(function(){
		jQuery("#form-Procesos").validar();
	});
</script>