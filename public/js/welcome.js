$(function(){
	$.ajaxSetup({
        beforeSend: function(xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        },
    });

    // modificar aquí la cantidad de segundos y en el stilo .start
    var tiempo = $('#tiempo').val();
    var contador=tiempo;  
    setTimeout(()=>{
        document.querySelector(".meter .bar span").style.display="block";
        document.querySelector(".meter .bar span").classList.add("start");
        //document.querySelector(".meter .num").innerHTML=contador;
        var interval=setInterval(()=>{
            contador--;
            //document.querySelector(".meter .num").innerHTML=contador;
            if(contador<=0)
            {
                clearInterval(interval);
                finalCuentaAtras();
            }
        },1000);
    },500);
     
    function finalCuentaAtras() {
        alert("ha finalizado la cuenta atras");
    }
});


function carga()
{
	var cronometro=0;
    contador_s =0;
    contador_m =0;
    s = document.getElementById("segundos");
    m = document.getElementById("minutos");  
    cronometro = setInterval(
        function(){
            if(contador_s==60)
            {
                contador_s=0;
                contador_m++;
                m.innerHTML = contador_m;
                if(contador_m==60)
                {
                    contador_m=0;
                }
            }
            s.innerHTML = contador_s;
            contador_s++;
            //alert(cronometro)
        }
        ,100);
    if (cronometro === 10) {
      clearInterval(cronometro);
      alert("Se agoto tu tiempo.")
      window.location = "home";
    }
}
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






