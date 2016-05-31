@extends('templates.main')
@section('title', 'Proponer documento')
@section('content')

<div class="page-header">
    <h3>{{ $unidad->nombre }} - Proponer documento</h3>
</div>
<div class="col-sm-6">
    
    <form method="post" action="{{ route('unidad.documentos.proponer.guardar', $unidad->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::text('titulo', '', ['placeholder' => 'Ingrese un titulo para el documento', 'class' => 'form-control', 'autofocus' => true]) !!}
        </div>

        <div class="form-group">
            {!! Form::select('tipo-doc', $tipos, '', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::file('documento', '', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <button name="proponer-doc" class="btn btn-primary btn-block">
                Proponer <i class="fa fa-send"></i>
            </button>
        </div>
    </form>

</div>
@endsection