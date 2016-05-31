{!! Form::open(['route' => (!$Unid->exists? ['admin.Unidades.store'] : ['admin.Unidades.update', $Unid->id]), 'method' => ($Unid->exists? 'PUT' : 'POST'), 'id' => 'form-Unidades', 'files' => true]) !!}
<!--'enctype' => 'multipart/form-data'-->

<div class="form-group">
    {!! Form::label('nombre', 'nombre') !!}
    {!! Form::text('nombre', $Unid->nombre, ['class' => 'form-control required', 'placeholder' => 'Ingrese el nombre', 'autofocus' => true]) !!}
</div>

<div class="form-group">
    {!! Form::label('guia', 'Guia') !!}
    {!! Form::file('guia', '', ['class' => 'form-control', 'placeholder' => 'Seleccione archivo para cargar']) !!}
</div>

<div class="form-group">
    {!! Form::label('evaluacion-concpeto', 'Evaluación de concepto') !!}
    {!! Form::file('evaluacion-concpeto', '', ['class' => 'form-control', 'placeholder' => 'Seleccione archivo para cargar']) !!}
</div>

<div class="form-group">
    {!! Form::label('evaluacion-procesos', 'Evaluación de procesos') !!}
    {!! Form::file('evaluacion-procesos', '', ['class' => 'form-control', 'placeholder' => 'Seleccione archivo para cargar']) !!}
</div>




<div class="form-group">
    {!! Form::label('id_resultado', 'resultado') !!}
    <div class="row">		
        <div class="col-sm-9">
            {!! Form::select('id_resultado', $ResultOPC, $Unid->id_resultado, ['class' => 'form-control required', 'data-select-twos' => true]) !!}
        </div>
        <div class="col-sm-3">
            <button id="add-Compet" class="btn btn-info">
                Crear Resultado <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">		
        <div class="col-sm-6">					
            <button class="btn btn-{{ $Unid->exists? "primary" : "success" }} btn-block">
                {{ $Unid->exists? "Actualizar" : "Guardar" }}
                <i class="fa fa-floppy-o"></i>				
            </button>
        </div>
        <div class="col-sm-6">		
            <a href="{{ route('admin.Unidades.index') }}" class="btn btn-default btn-block">
                Cancelar <i class="fa fa-remove"></i>
            </a>		
        </div>
    </div>
</div>

{!! Form::close() !!}


<script>
    jQuery(function () {
        jQuery("#form-Unidades").validar();

    });


    }

</script>