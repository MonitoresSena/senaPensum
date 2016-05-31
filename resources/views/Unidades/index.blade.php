@extends('templates.main')
@section('title', 'Listado de Resultados de Unidades Tematicas')
@section('content')

<div class="form-group">
    <a class="btn btn-primary" href="{{ route('admin.Unidades.create') }}">
        Registrar <i class="fa fa-user"></i>
    </a>
</div>

<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Id Resultado Aprendizaje</th>
            <th>Guias</th>
            <th>E. conceptos</th>
            <th>E. procesos</th>
            <th class="col-sm-1">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Unidades AS $Unid)
        <tr>
            <td>{{ $Unid->id }}</td>
            <td>{{ $Unid->nombre }}</td>
            <td>{{ $Unid->Resultado->Denominacion }}</td>
            <td><a href="{{ route('admin.unidad.documentos.listar', $Unid->id) }}">{{ $Unid->TotalGuias() }}</a></td>
            <td><a href="">{{ $Unid->totalEC() }}</a></td>
            <td><a href="">{{ $Unid->totalEP() }}</a></td>
            
<!-- <td cl</td>

ass="text-center">
        
        
</td> -->
            <td class="text-center col-options">

                </a>
                <a title="Editar" href="{{ route('admin.Unidades.edit', $Unid->id) }}" class="">
                    <i class="fa fa-pencil"></i>
                </a>
                <a title="Editar" href="{{ route('admin.Unidades.destroy', $Unid->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $Unidades->render() !!}
@endsection