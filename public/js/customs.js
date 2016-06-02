jQuery(function(){
	$("[data-select-two]").select2();
});
/*+-----------------------------+*/
/*|								|*/
/*|		 Plugins de jQuery 		|*/
/*|								|*/
/*+-----------------------------+*/


/*+---------------------------------+*/
/*|			 Plugins de jQuery 		|*/
/*+---------------------------------+*/
/*|	Plugin para validar formularios	|*/
/*+---------------------------------+*/
(function($){
	$.fn.validar = function(){
		var form = jQuery(this);
		var items = jQuery(this).find("input.required, select.required, texarea.required");
		var errores = false;
		var id = "alert-report";

		// removemos notificaciones anteriores

		form.validarCampos = function(){			
			jQuery("#" + id).fadeOut('fast', function(){
				jQuery(this).remove()
			});
			var ul = jQuery("<ul/>");
			var primeroConError = null;

			jQuery.each(items, function(k,v){
				var element = jQuery(v);
				if(element.hasClass("required") && jQuery.trim(element.val()) == ""){

					if(primeroConError == null){
						primeroConError = element;
					}

					var li = jQuery("<li/>");
					var label = element.closest(".form-group").find("label");
					li.html(label.html());
					ul.append(li);
					errores = true;
				}
			});

			var alert = jQuery("<div/>", {id:id, class:"alert alert-danger", style:"display:none;"});
			alert.append("<p>Los siguientes campos no pueden estar vacios:</p>");
			alert.append(ul);			
			if(primeroConError !== null){
				primeroConError.focus();
			}
			return alert;
		};

		// añadimos eventos
		form.submit(function(){
			var info = form.validarCampos();
			if(errores == true){
				form.prepend(info);
				info.slideDown();
				errores = false; 	// debemos resetear la bandera de errores
				return false;
			}else {
				return true;
			}
			
		});

	};
}(jQuery));
