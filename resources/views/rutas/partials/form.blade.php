{!! Form::open(['route' => (!$ruta->exists? ['admin.rutas.store'] : ['admin.rutas.update', $ruta->id]), 'method' => ($ruta->exists? 'PUT' : 'POST'), 'id' => 'form-rutas']) !!}

<div class="form-group">
	{!! Form::label('ruta', 'Ruta') !!}
	{!! Form::text('ruta', $ruta->ruta, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre de la ruta', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $ruta->exists? "primary" : "success" }} btn-block">
				{{ $ruta->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.rutas.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>