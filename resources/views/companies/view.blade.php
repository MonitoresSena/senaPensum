@extends('templates.main')
@section('title', 'Detalles Empresa')
@section('content')
	<div class="page-header">
		<h3>Ver Detalles Empresa</h3>
	</div>

	<div class="col-sm-6">		
		<div class="panel panel-default">	
			<div class="panel-heading">
				{{ $empresa->nombre }}
			</div>
			/*<table class="table table-hover table-bordered">
			 </table>*/
			<div class="panel-footer">
				<div class="form-group">
					<a href="{{ route('admin.companies.index') }}" class="btn btn-default">
						<i class="fa fa-reply"></i> Volver
					</a>
				</div>
			</div>
		</div>
		
	</div>
@endsection