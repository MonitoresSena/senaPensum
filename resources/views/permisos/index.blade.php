@extends('templates.main')
@section('title', 'Listado de Rutas')
@section('content')

<div class="col-sm-6">
	

	{!! Form::open(['route' => ['admin.permisos.permisosAjx'],'method' => 'POST', 'id' => 'form-permisos']) !!}

	<input type="hidden" id="type" name="type">
	<input type="hidden" id="rol_selected" name="rol">
	<input type="hidden" id="permission_id" value="" name="permission_id">
	<input type="hidden" id="ruta-id" name="ruta_id">
	{!! Form::close() !!}
	
	{!! Form::label('rol_id', 'Rol') !!}

	{!! Form::select('rol_id', $rolesOpc, '', ['id'=>'select-rol', 'class' => 'form-control required', 'data-select-two' => true]) !!}
	<hr>

	<div class="list-group" id="permisions-list">
		
	</div>
</div>	
<script>
	jQuery(function(){ 
		jQuery("#select-rol").change(function(){

			jQuery("#rol_selected").val(jQuery(this).val());
			jQuery("#type").val("1");

			getPermisos();
		});
	});

	function getPermisos(){

		var form = jQuery("#form-permisos");
		var data = form.serialize();
		var url = form.attr("action");

		console.log(data);

		jQuery.post(url, data, function(obj){
			// var html = obj.html;
			buildPermissions(obj);
		});
	}

	function buildPermissions(arr){
		var html = "";
		jQuery.each(arr, function(k, v){
			var ac = v.permiso;

			html += '<div href="#" class="list-group-item">' +
	    				'<div div="col-sm-8">' + v.ruta + '</div>' +

	    				'<div div="col-sm-4" >' +
	    					'<div data-id="' + v.id + '" class="btn-group buttons-permission" data-toggle="buttons">' +
							  '<label onclick="guardarPermiso(jQuery(this))" class="btn btn-default ' + (ac == true? "active" : "") + '" data-val="true">' +
							    '<input type="radio" autocomplete="si" ' + (ac == true? 'checked="checked"' : "") + '> Si' +
							  '</label>' +
							  '<label onclick="guardarPermiso(jQuery(this))" class="btn btn-default ' + (ac == false? "active" : "") + '" data-val="false">' +
							    '<input  type="radio" autocomplete="no" ' + (ac == false? 'checked="checked"' : "") + '> No' +
							  '</label>' +
							 '</div>' +
	    				'</div>' + 
	  				'</div>';

				// guardarPermiso(jQuery(this));
		});


		jQuery("#permisions-list").html(html);
	}

	function guardarPermiso(obj){
		var value = obj.attr("data-val");
		jQuery("#type").val(2);		
		jQuery("#permission_id").val(value);
		var idRuta = obj.parent().attr("data-id");
		jQuery("#ruta-id").val(idRuta);

		var form = jQuery("#form-permisos");
		var data = form.serialize();
		var url = form.attr("action");

		jQuery.post(url, data, function(obj){
			
		});
	}
</script>

@endsection