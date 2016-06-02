{!! Form::open(['route' => (!$ComInstruct->exists? ['admin.dllComInsts.store'] : ['admin.dllComInsts.update', $ComInstruct->id]), 'method' => ($ComInstruct->exists? 'PUT' : 'POST'), 'id' => 'form-dllComInsts', 'files' => true]) !!}
<!--'enctype' => 'multipart/form-data'-->





<div class="form-group">
    {!! Form::label('id_instructor', 'id instructor') !!}
    <div class="row">		
        <div class="col-sm-9">
            {!! Form::select('id_instructor', $InstOPC, $ComInstruct->id_instructor, ['class' => 'form-control required', 'data-select-twos' => true]) !!}
        </div>
        <div class="col-sm-3">
            <button id="add-Compet" class="btn btn-info">
                Crear instructor <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>



<div class="form-group">
    {!! Form::label('id_competencia', 'id competencia') !!}
    <div class="row">       
        <div class="col-sm-9">
            {!! Form::select('id_competencia', $CompOPC, $ComInstruct->id_competencia, ['class' => 'form-control required', 'data-select-twos' => true]) !!}
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
            <button class="btn btn-{{ $ComInstruct->exists? "primary" : "success" }} btn-block">
                {{ $ComInstruct->exists? "Actualizar" : "Guardar" }}
                <i class="fa fa-floppy-o"></i>				
            </button>
        </div>
        <div class="col-sm-6">		
            <a href="{{ route('admin.dllComInsts.index') }}" class="btn btn-default btn-block">
                Cancelar <i class="fa fa-remove"></i>
            </a>		
        </div>
    </div>
</div>

{!! Form::close() !!}


<script>
    jQuery(function () {
        jQuery("#form-dllComInsts").validar();

    });


    }

</script>