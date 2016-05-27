{!! Form::open(['route' => (!$Crit->exists? ['admin.Criterios.store'] : ['admin.Criterios.update', $Crit->id]), 'method' => ($Crit->exists? 'PUT' : 'POST'), 'id' => 'form-Criterios']) !!}


<div class="form-group">
	{!! Form::label('nombre', 'nombre') !!}
	{!! Form::text('nombre', $Crit->nombre, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	{!! Form::label('Estado', 'Estado') !!}
	{!! Form::number('Estado', $Crit->estado, ['class' => 'form-control required', 'placeholder' => 'Ingrese el estado del criterio']) !!}
</div>



<div class="form-group">
	{!! Form::label('id_resultado', 'resultado') !!}
	<div class="row">		
		<div class="col-sm-9">
			{!! Form::select('id_resultado', $ResultOPC, $Crit->id_resultado, ['class' => 'form-control required', 'data-select-twos' => true]) !!}
		</div>
		<div class="col-sm-3">
			<button id="add-Result" class="btn btn-info">
				Crear Resultado <i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $Crit->exists? "primary" : "success" }} btn-block">
				{{ $Crit->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.Criterios.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>

{!! Form::close() !!}


<script>
	jQuery(function(){
		jQuery("#form-Criterios").validar();

	});

	
	}

</script>