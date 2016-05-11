$(document).ready(function(){
    $('#submitReg').click(compruebaReg);
    $('#submitLog').click(compruebaLog);
});

/*FUNCION PARA REGISTRARSE {*/
/* smartsupp */
var _smartsupp = _smartsupp || {};
_smartsupp.key = "ebc7ae870411addaf165f962b203459b48f41d44";
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='//www.smartsuppchat.com/loader.js';s.parentNode.insertBefore(c,s);
})(document);
/* /_smartsupp */


function crearCuenta(){
  var usuarioReg = $('#usuarioReg').val();
  var passwdReg = $('#passwdReg').val();
  var email = $('#email').val();
  var telefono = $('#telefono').val();
  var fechaNac = $('#fechaNac').val();
  
  var peticion = $.ajax({
  url:  'http://localhost/JQUERY/PROYECTOV2/php/registro.php?nocache='+Math.random(),
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
            pintado = "<p>Registro creado correctamente</p><a href='formulario.html'>Volver al inicio</a>";
        else
            pintado = "<p><i>Por favor rellena todos los campos.</i></p>.";
        
        
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
  var i = 0;
  for(var k=2;k<elementosLog.length; k++) {
    if(elementosLog[k]!=undefined) {
        document.getElementById(document.getElementById(elementosLog[k]).parentNode.id).className+=' has-error';
    } else 
      i++;

    if(i==5)
      crearCuenta();
  }
}
/*}*/

