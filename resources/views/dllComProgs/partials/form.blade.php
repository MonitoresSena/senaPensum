{!! Form::open(['route' => (!$ComProg->exists? ['admin.dllComProgs.store'] : ['admin.dllComProgs.update', $ComProg->id]), 'method' => ($ComProg->exists? 'PUT' : 'POST'), 'id' => 'form-dllComProgs', 'files' => true]) !!}
<!--'enctype' => 'multipart/form-data'-->





<div class="form-group">
    {!! Form::label('id_programa', 'id programa') !!}
    <div class="row">		
        <div class="col-sm-9">
            {!! Form::select('id_programa', $ProgOPC, $ComProg->id_programa, ['class' => 'form-control required', 'data-select-twos' => true]) !!}
        </div>
        <div class="col-sm-3">
            <button id="add-Compet" class="btn btn-info">
                Crear programa <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>


<div class="form-group">
    {!! Form::label('id_competencia', 'id competencia') !!}
    <div class="row">       
        <div class="col-sm-9">
            {!! Form::select('id_competencia', $CompOPC, $ComProg->id_competencia, ['class' => 'form-control required', 'data-select-twos' => true]) !!}
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
            <button class="btn btn-{{ $ComProg->exists? "primary" : "success" }} btn-block">
                {{ $ComProg->exists? "Actualizar" : "Guardar" }}
                <i class="fa fa-floppy-o"></i>				
            </button>
        </div>
        <div class="col-sm-6">		
            <a href="{{ route('admin.dllComProgs.index') }}" class="btn btn-default btn-block">
                Cancelar <i class="fa fa-remove"></i>
            </a>		
        </div>
    </div>
</div>

{!! Form::close() !!}


<script>
    jQuery(function () {
        jQuery("#form-dllComProgs").validar();

    });


    }

</script>