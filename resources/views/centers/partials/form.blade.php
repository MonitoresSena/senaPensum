{!! Form::open(['route' => (!$cent->exists? ['admin.centers.store'] : ['admin.centers.update', $cent->id]), 'method' => ($cent->exists? 'PUT' : 'POST'), 'id' => 'form-cent']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $cent->nombre, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre del rol', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	{!! Form::label('descripcion', 'Descripción') !!}
	{!! Form::textarea('descripcion', $cent->descripcion, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre del rol', 'autofocus' => true]) !!}
</div>

<!--<div class="form-group">
	{!! Form::label('id_municipio', 'id_municipio') !!}
	{!! Form::number('id_municipio', $cent->id_municipio, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre del rol', 'autofocus' => true]) !!}
</div>-->

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $cent->exists? "primary" : "success" }} btn-block">
				{{ $cent->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.centers.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>

{!! Form::close() !!}

<script>
	jQuery(function(){
		jQuery("#form-cent").validar();
	});
</script>
