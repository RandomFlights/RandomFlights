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

