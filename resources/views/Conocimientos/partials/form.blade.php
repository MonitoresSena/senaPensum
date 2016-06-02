{!! Form::open(['route' => (!$Conoc->exists? ['admin.Conocimientos.store'] : ['admin.Conocimientos.update', $Conoc->id]), 'method' => ($Conoc->exists? 'PUT' : 'POST'), 'id' => 'form-Conocimientos']) !!}


<div class="form-group">
	{!! Form::label('nombre', 'nombre') !!}
	{!! Form::text('nombre', $Conoc->nombre, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre', 'autofocus' => true]) !!}
</div>


<div class="form-group">
	{!! Form::label('descripcion', 'descripcion') !!}
	{!! Form::text('descripcion', $Conoc->descripcion, ['class' => 'form-control required', 'placeholder' => 'Ingrese la descripcion', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	{!! Form::label('estado', 'estado') !!}
	{!! Form::text('estado', $Conoc->estado, ['class' => 'form-control required', 'placeholder' => 'Ingrese el estado', 'autofocus' => true]) !!}
</div>


<div class="form-group">
	{!! Form::label('id_proceso', 'proceso') !!}
	<div class="row">		
		<div class="col-sm-9">
			{!! Form::select('id_proceso', $ProcOPC, $Conoc->id_proceso, ['class' => 'form-control required', 'data-select-twos' => true]) !!}
		</div>
		<div class="col-sm-3">
			<button id="add-Compet" class="btn btn-info">
				Crear proceso <i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('id_unidad', 'unidad') !!}
	<div class="row">		
		<div class="col-sm-9">
			{!! Form::select('id_unidad', $UnidOPC, $Conoc->id_unidad, ['class' => 'form-control required', 'data-select-twos' => true]) !!}
		</div>
		<div class="col-sm-3">
			<button id="add-Compet" class="btn btn-info">
				Crear unidad <i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $Conoc->exists? "primary" : "success" }} btn-block">
				{{ $Conoc->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.Conocimientos.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>


{!! Form::close() !!}


<script>
	jQuery(function(){
		jQuery("#form-Unidades").validar();

	});

	
	}

</script>