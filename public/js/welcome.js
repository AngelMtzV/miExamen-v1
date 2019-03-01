$(function(){
	$.ajaxSetup({
        beforeSend: function(xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        },
    });
});


//Funcion para guardar las respuestas
function ver () {
 	$(document).ready(function() {
 	    $('#enviar').click(function(){
 	        var selected = '';    
 	        $('#formid input[type=radio]').each(function(){
 	            if (this.checked) {
 	                selected += $(this).val()+', ';
 	                $("#respuestas").val(selected);
 	            }
 	        }); 

 	        //Token
 	        $.ajaxSetup({
	            beforeSend: function(xhr, type) {
	                if (!type.crossDomain) {
	                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
	                }
	            },
	        });

 	        if (selected != ''){
 	        	document.getElementById('formid').submit();
 	        	/*var json = JSON.stringify(selected);
 	        	//enviar las respuestas guardadas en la variable selected al archivo php(Controlador: PreguntaUsuario.php)
	 	        $.ajax({
            	method: 'POST',
            	dataType: 'html',
            	url: "respuestas",
            	data: ('json='+json), 
            	success: function(respuesta) {
            	  //$("#respu").val(selected);
            	  //console.log('Javascript')
	          	  //console.log(json)
	              //window.location = "/prueba";
	              document.getElementById('formid').submit();
	 	         },
	 	         error: function(respuesta){
	 	            alert("error: ")
	 	            //console.log(json);
	 	         }
 	            })*/ 
 	        } else
 	            alert('Debes seleccionar una opción para cada pregunta.')
 	        return false;
 	    });        
 	});  
 } 






