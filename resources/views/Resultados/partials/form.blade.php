{!! Form::open(['route' => (!$Result->exists? ['admin.Resultados.store'] : ['admin.Resultados.update', $Result->id]), 'method' => ($Result->exists? 'PUT' : 'POST'), 'id' => 'form-usuarios']) !!}


<div class="form-group">
	{!! Form::label('Denominacion', 'Denominacion') !!}
	{!! Form::text('Denominacion', $Result->Denominacion, ['class' => 'form-control required', 'placeholder' => 'Ingrese la denominacion', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	{!! Form::label('Estado', 'Estado') !!}
	{!! Form::number('Estado', $Result->Estado, ['class' => 'form-control required', 'placeholder' => 'Ingrese el estado de el resultado']) !!}
</div>



<div class="form-group">
	{!! Form::label('id_competencia', 'Competencia') !!}
	<div class="row">		
		<div class="col-sm-9">
			{!! Form::select('Id_competencia', $CompetOPC, $Result->id_competencia, ['class' => 'form-control required', 'data-select-twos' => true]) !!}
		</div>
		<div class="col-sm-3">
			<button id="add-Compet" class="btn btn-info">
				Crear Competencia <i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $Result->exists? "primary" : "success" }} btn-block">
				{{ $Result->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.Resultados.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>

{!! Form::close() !!}


<script>
	jQuery(function(){
		jQuery("#form-Resultados").validar();

	});

	
	}

</script>