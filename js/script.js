$(document).ready(function(){
    $('#submitReg').click(crearCuenta, compruebaReg);
    $('#submitLog').click(compruebaLog);
});

/*FUNCION PARA REGISTRARSE {*/
function crearCuenta(){
  var usuarioReg = $('#usuarioReg').val();
  var passwdReg = $('#passwdReg').val();
  var email = $('#email').val();
  var telefono = $('#telefono').val();
  var fechaNac = $('#fechaNac').val();
  
  var peticion = $.ajax({
  url:  'http://127.0.0.1/PROYECTOV2/php/registro.php?nocache='+Math.random(),
  type: 'POST',
  asnc: true,
  data: 'usuarioReg='+encodeURIComponent(usuarioReg) +
          '&passwdReg='+encodeURIComponent(passwdReg) +
          '&email='+encodeURIComponent(email) +
          '&telefono='+encodeURIComponent(telefono) +
          '&fechaNac='+encodeURIComponent(fechaNac),
  success: function(){
    $("#LOGEADO").fadeIn(500);
        var ok = peticion.responseText;
        var pintado = "";
        
        if(ok=="true")
           alert("bien");
        else
           alert("mal");
        
        
    $("#LOGEADO").html(pintado);
    },
    error: function(){alert('Se produjo un error inesperado');}
    });
}
/*}*/

/*FUNCION PARA MOSTRAR EL FORMULARIO {*/
function mostarForm(){
  document.getElementById("formulario").style.visibility="visible";
}
/*}*/
/*FUNCION PARA COMPROBAR LOS DATOS DEL LOGIN {*/
var elementosLog = new Array("usuario", "passwd", "usuarioReg", "passwdReg", "passwdReg2", "email", "fechaNac");
function mandaValor(elemento) {
  delete elementosLog[elementosLog.indexOf(elemento)];
}

function compruebaLog(){
  for(var k=0;k<2; k++) {
    if(elementosLog[k]!=undefined)
      document.getElementById(document.getElementById(elementosLog[k]).parentNode.id).className+=' has-error';
   }
}
function compruebaReg(){
  for(var k=2;k<elementosLog.length; k++) {
    if(elementosLog[k]!=undefined)
        document.getElementById(document.getElementById(elementosLog[k]).parentNode.id).className+=' has-error';
  }
}
/*}*/

