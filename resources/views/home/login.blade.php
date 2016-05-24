@extends('templates.login')
@section('title', 'Iniciar sesión')
@section('content')
	
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					Iniciar sesión
				</div>
				<div class="panel-body">
				
					{{ Session::get("message") }}

					{!! Form::open(['route' => ['login'], 'method' => 'POST', 'class' => 'form-horizontal'])!!}

					<div class="col-sm-offset-1 col-sm-10">
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Nombre de usuario</label>
							<div class="col-sm-8">
								{!! Form::text('email', '', ['class' => 'form-control', 'autofocus' => true]); !!}
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Contraseña</label>
							<div class="col-sm-8">
								{!! Form::password('password', ['class' => 'form-control']); !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">								
								<p>{!! Form::checkbox('remember', '1', false) !!} Recordarme</p>
								<button class="btn btn-primary">Iniciar sesión</button> 
								<a href="@{{ route('home.recuperar') }}"> ¿Olvidó su contraseña?</a>
							</div>
						</div>

					</div>

					{!! Form::close() !!}
				</div>				
			</div>

		</div>
	</div>

@endsection