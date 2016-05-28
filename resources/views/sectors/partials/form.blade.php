{!! Form::open(['route' => (!$sec->exists? ['admin.sectors.store'] : ['admin.sectors.update', $sec->id]), 'method' => ($sec->exists? 'PUT' : 'POST'), 'id' => 'form-sectors']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $sec->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del sector', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $sec->exists? "primary" : "success" }} btn-block">
				{{ $sec->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">		
			<a href="{{ route('admin.sectors.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>
{!! Form::close() !!}