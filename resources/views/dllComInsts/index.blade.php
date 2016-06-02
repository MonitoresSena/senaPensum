@extends('templates.main')
@section('title', 'Listado de competencias asociadas a instructores')
@section('content')

<div class="form-group">
    <a class="btn btn-primary" href="{{ route('admin.dllComInsts.create') }}">
        Registrar <i class="fa fa-user"></i>
    </a>
</div>

<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>id instructor</th>
            <th>id competencia</th>
            <th class="col-sm-1">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dllComInsts AS $ComInstruct)
        <tr>
            <td>{{ $ComInstruct->id }}</td>
            <td>{{ $ComInstruct->id_instructor }}</td>
            <td>{{ $ComInstruct->id_competencia }}</td>
            
<!-- <td cl</td>

ass="text-center">
        
        
</td> -->
            <td class="text-center col-options">

                </a>
                <a title="Editar" href="{{ route('admin.dllComInsts.edit', $ComInstruct->id) }}" class="">
                    <i class="fa fa-pencil"></i>
                </a>
                <a title="Editar" href="{{ route('admin.dllComInsts.destroy', $ComInstruct->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $dllComInsts->render() !!}
@endsection