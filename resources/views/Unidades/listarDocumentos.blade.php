@extends('templates.main')
@section('title', 'Documentos')

@section('content')

<div class="page-header">
    <h3>Documentos - {{ $unidad->nombre }}</h3>
</div>

<div class="form-group">
    <a href="{{ route('admin.unidad.documentos.proponer', $unidad->id) }}" class="btn btn-default"> 
        Proponer documento 
    </a>
</div>

<table class="table table-bordered table-hover table-responsive table-condensed table-striped">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Titulo</th>
            <th class="text-center">Estado</th>
            <th>Propuesto/Subido por</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documentos AS $doc)
        <tr>
            <td>{{ $doc->Tipo->tipo }}</td>
            <td>{{ $doc->titulo }}</td>
            <td class="text-center">
                <span class="label label-{{ $doc->getEstadoTag()['clase'] }}">{{ $doc->getEstadoTag()['texto'] }}</span>
            </td>
            <td>{{ $doc->Usuario->name }}</td>
            <td>
                @if($doc->estado != 1)
                <a href="{{ route('admin.unidades.documentos.aprobar', [$unidad->id, $doc->id]) }}" class="btn btn-success" title="Aprobar">
                    <i class="fa fa-check"></i>
                </a>
                @endif
                <a href="{{ asset("documentos/$doc->url") }}" title="Descargar" class="btn btn-primary" target="_blank">
                    <i class="fa fa-cloud-download"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $documentos->render() !!}
@endsection