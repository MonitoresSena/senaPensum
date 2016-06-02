@extends('templates.main')
@section('title', 'Listado de competencias asociadas a programas')
@section('content')

<div class="form-group">
    <a class="btn btn-primary" href="{{ route('admin.dllComProgs.create') }}">
        Registrar <i class="fa fa-user"></i>
    </a>
</div>

<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>id programa</th>
            <th>id competencia</th>
            <th class="col-sm-1">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dllComProgs AS $ComProg)
        <tr>
            <td>{{ $ComProg->id }}</td>
            <td>{{ $ComProg->id_programa }}</td>
            <td>{{ $ComProg->id_competencia }}</td>
            
<!-- <td cl</td>

ass="text-center">
        
        
</td> -->
            <td class="text-center col-options">

                </a>
                <a title="Editar" href="{{ route('admin.dllComProgs.edit', $ComProg->id) }}" class="">
                    <i class="fa fa-pencil"></i>
                </a>
                <a title="Editar" href="{{ route('admin.dllComProgs.destroy', $ComProg->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $dllComProgs->render() !!}
@endsection