{!! Form::open(['route' => (!$comp->exists? ['admin.companies.store'] : ['admin.companies.update', $comp->id]), 'method' => ($comp->exists? 'PUT' : 'POST'), 'id' => 'form-are']) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', $comp->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de empresa', 'autofocus' => true]) !!}
</div>

<div class="form-group">
	{!! Form::label('descripcion', 'Descripción') !!}
	{!! Form::text('descripcion', $comp->descripcion, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción empresa']) !!}
</div>


<div class="form-group">
	<div class="row">		
		<div class="col-sm-6">					
			<button class="btn btn-{{ $comp->exists? "primary" : "success" }} btn-block">
				{{ $comp->exists? "Actualizar" : "Guardar" }}
				 <i class="fa fa-floppy-o"></i>				
			</button>
		</div>
		<div class="col-sm-6">	
			<a href="{{ route('admin.companies.index') }}" class="btn btn-default btn-block">
				Cancelar <i class="fa fa-remove"></i>
			</a>		
		</div>
	</div>
</div>
{!! Form::close() !!}