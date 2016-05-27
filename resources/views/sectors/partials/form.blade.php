{!! Form::open(['route' => (!$sect->exists? ['admin.sectors.store'] : ['admin.sectors.update', $sect->id]), 'method' => ($sect->exists? 'PUT' : 'POST'), 'id' => 'form-sectores']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $sect->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del sector', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $sect->exists? "primary" : "success" }} btn-block">
				{{ $sect->exists? "Actualizar" : "Guardar" }}
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