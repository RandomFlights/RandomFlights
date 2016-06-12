$(document).ready(function(){
    $(document).ready(sesion);
    $('#submitReg').click(compruebaReg);
    $('#submitLog').click(compruebaLog);
    $('#comenzar').click(buscarVuelos);

});

/*FUNCION PARA REGISTRARSE {*/
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'ebc7ae870411addaf165f962b203459b48f41d44';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='//www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
/*}*/

function crearCuenta(){
  var usuarioReg = $('#usuarioReg').val();
  var passwdReg = $('#passwdReg').val();
  var passwdReg2 = $('#passwdReg2').val();
  var email = $('#email').val();
  var telefono = $('#telefono').val();
  var fechaNac = $('#fechaNac').val();
  
  var peticion = $.ajax({
  url:  'http://127.0.0.1/RandomFlights/php/registro.php?nocache='+Math.random(),
  type: 'POST',
  async: true,
  data: 'usuarioReg='+encodeURIComponent(usuarioReg) +
        '&passwdReg='+encodeURIComponent(passwdReg) +
        '&passwdReg2='+encodeURIComponent(passwdReg2) +
        '&email='+encodeURIComponent(email) +
        '&telefono='+encodeURIComponent(telefono) +
        '&fechaNac='+encodeURIComponent(fechaNac),
  success: function(){
    var ok = peticion.responseText;
    var pintado = "";
        
    if(ok=="True"){
        pintado = "<div class='alert alert-success'><strong>Tu cuenta se ha creado correctamente.</strong></div>";
    }else{
        pintado = "<div class='alert alert-danger'><strong><i>Ha ocurrido un error. Por favor, <a href='./contacta.html'>contacta con nosotros</a>.</i></strong></div>";
    } 
    $("#REGISTRADO").html(pintado);
    },
    error: function(){ alert('Se produjo un error inesperado'); }
    });
}
/*}*/

/*FUNCION PARA LOGEARSE {*/
function identificarse(){
  var user = $('#usuario').val();
  var passwd = $('#passwd').val();
  
  var peticion = $.ajax({
  url:  'http://127.0.0.1/RandomFlights/php/login.php?nocache='+Math.random(),
  type: 'POST',
  asnc: true,
  data: 'user='+encodeURIComponent(user) +
          '&passwd='+encodeURIComponent(passwd),
  success: function(){
        var ok = peticion.responseText;
        
        if(ok=="true") {
            var pintado = "<p class='kglifeGrey'>¡Bienvenido <span class='orange'>"+user+"</span>!</p><button  id='cerrarSesion' onclick='cerrarSesion()' type='button' class='btn btn-warning'>Cerrar sesión</button>";
            document.getElementById("login").style.display="none";
            document.getElementById("LOGEADO").style.visibility="visible";
            sessionStorage.usuario = document.getElementById("usuario").value;
            document.getElementById("rallaLogin").style.top="115px";
        } else {
            var pintado = "<p>Lo sentimos, pero no esta registrado en nuestra base de datos.</p>";
            document.getElementById("login").style.display="none";
            document.getElementById("LOGEADO").style.visibility="visible";
            document.getElementById("rallaLogin").style.top="115px";
        }
        
        
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
  var i = 0;
  for(var k=0;k<2; k++) {
    if(elementosLog[k]!=undefined) {
      document.getElementById(document.getElementById(elementosLog[k]).parentNode.id).className+=' has-error';
     } else
      i++;

    if(i==2)
      identificarse();
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

/*FUNCION PARA CERRAR SESION {*/
function cerrarSesion() {
    location.reload();
    sessionStorage.usuario="";
}
/*}*/

/*FUNCION PARA QUE APAREZCA EL LOGIN EN LAS SIGUIENTE PAGINAS CON SESSIONSTORAGE {*/
function loginSession() {
    var user = sessionStorage.usuario;
    if(user!="") {
      var pintado = "<p class='kglifeGrey'>¡Bienvenido <span class='orange'>"+user+"</span>!</p><button  id='cerrarSesion' onclick='cerrarSesion()' type='button' class='btn btn-warning'>Cerrar sesión</button>";
      document.getElementById("LOGEADO").innerHTML = pintado;
      document.getElementById("LOGEADO").style.visibility="visible";
      document.getElementById("rallaLogin").style.top="115px";
      document.getElementById("login").style.display="none";
    }
}
/*}*/

/*FUNCION PARA OCULTAR EL LOGIN {*/
function ocultaLogin() {
    if(sessionStorage.usuario == "") {       
        document.getElementById("login").style.display="true";
        document.getElementById("LOGEADO").style.visibility="hidden";
    } else {
        document.getElementById("login").style.display="none";
        document.getElementById("LOGEADO").style.visibility="visible";
        document.getElementById("rallaLogin").style.top="115px";
    }
}
/*}*/

/*FUNCION PARA CAMBIAR LA FOTO DEL BOTON COMENZAR {*/
function cambiaFoto() {
  document.getElementById("botoncomenzar").src="./media/img/botoncomenzar0.png";
}
function cambiaFotoOut() {
  document.getElementById("botoncomenzar").src="./media/img/botoncomenzar1.png";
}
/*}*/

/*FUNCION PARA CAMBIAR LAS FRASES ALREFRESCAR LA PAGINA*/
function cambiafrase() {
  var frases = [
    '"El mundo es un libro, y aquellos que no viajan leen solo una página." -San Agustín.',
    '"No hay tierras extranjeras. Quien viaja es el único extranjero". – Robert Louis Stevenson',
    '"Aquel que no viaja no conoce el valor de los hombres". – Proverbio moro',
    '"Nuestro destino nunca es un lugar, sino una nueva forma de ver las cosas". – Henry Miller',
    '"Un viajero sin capacidad de observación es como un pájaro sin alas" – Moslih Eddin Saadi',
    '"Todos los viajes tienen destinos secretos sobre los que el viajero nada sabe". – Martin Buber',
    '"Dos senderos se abrían en el bosque y yo… yo tomé el menos transitado". – Robert Frost',
    '"Un buen viajero no tiene planes fijos ni tampoco la intención de llegar" – Lao Tzu',
    '"Es el viaje y no el arribo el que importa" – T. S. Eliot',
    '"Un viaje se mide mejor en amigos que en millas" –  Tim Cahill',
    '"No todos los que deambulan están perdidos" – J. R. R. Tolkien',
    '"Viajar y cambiar de lugar revitaliza la mente". – Seneca',
    '"Viajar es descubrir que todos están equivocados sobre los otros países". – Aldous Huxley',
    '"El viajar sólo es glamoroso cuando se lo mira en retrospectiva". – Paul Theroux',
    '"Un viajero sabio nunca desprecia a su propio país". – Carlo Goldoni'
  ]
  var ale = Math.floor(Math.random() * 14);

  document.getElementById("frase").innerHTML=frases[ale];
}
/*}*/


function restaFechas(f1,f2)
 {
 var aFecha1 = f1.split('-'); 
 var aFecha2 = f2.split('-'); 
 var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,aFecha1[2]); 
 var fFecha2 = Date.UTC(aFecha2[0],aFecha2[1]-1,aFecha2[2]); 
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
 return dias;
 }




/*FUNCION PARA BUSCAR VUELOS {*/
function buscarVuelos(){
  var origen = $('#origen').val();
  var pvp = $('#rangevalue').val();
  var fecha_salida = $('#fecha_salida').val();
  var fecha_vuelta = $('#fecha_vuelta').val(); 
  var aventureros = $('#aventureros').val();
  var dias = restaFechas(fecha_salida, fecha_vuelta);

  var peticion = $.ajax({
  url:  'http://127.0.0.1/RandomFlights/php/vuelos.php?nocache='+Math.random(),
  type: 'POST',
  asnc: true,
  data: 'origen='+encodeURIComponent(origen) +
        '&pvp='+encodeURIComponent(pvp) +
        '&fecha_salida='+encodeURIComponent(fecha_salida) +
        '&fecha_vuelta='+encodeURIComponent(fecha_vuelta) +
        '&aventureros='+encodeURIComponent(aventureros) +
        '&dias='+encodeURIComponent(dias),
        
  success: function(){
    var ok = peticion.responseText;
    if(ok == "error1")
      mensaje = "<div class='alert alert-warning errorVuelos'>Por favor, rellena todos los campos para continuar.</div>";
    else
      if(ok == "error2")
        mensaje = "<div class='alert alert-danger errorVuelos'>Lo sentimos pero no hay ningun paquete disponible para esas fechas.</div>";
      else
        mensaje = peticion.responseText;
    $("#RESULTADO_DE_VUELOS").slideDown(1000);
    $("#RESULTADO_DE_VUELOS").html(mensaje);
    },
    error: function(){alert('Se produjo un error inesperado');}
    });
}
/*}*/

/*FUNCION PARA RESERVAR VUELOS {*/
function reservar() {
  var mensaje = "";
  if(sessionStorage.usuario != "") {
    var ida = $('#ida').val();
    var destino = $('#destino').val();
    var vuelta = $('#vuelta').val();
    var hotel = $('#hotel').val();
    var direccion_hotel = $('#direccion_hotel').val();
    var pvp_final = $('#pvp_final').val();
    var fecha_salida = $('#fecha_salida').val();
    var fecha_vuelta = $('#fecha_vuelta').val(); 
    var salida_ida = $('#salida_ida').val(); 
    var salida_vuelta = $('#salida_vuelta').val(); 
    var user = sessionStorage.usuario;

    var peticion = $.ajax({
    url:  'http://127.0.0.1/RandomFlights/php/reservar.php?nocache='+Math.random(),
    type: 'POST',
    asnc: true,
    data: 'ida='+encodeURIComponent(ida) +
          '&destino='+encodeURIComponent(destino) +
          '&vuelta='+encodeURIComponent(vuelta) +
          '&hotel='+encodeURIComponent(hotel) +
          '&direccion_hotel='+encodeURIComponent(direccion_hotel) +
          '&user='+encodeURIComponent(user) +
          '&fecha_salida='+encodeURIComponent(fecha_salida) +
          '&fecha_vuelta='+encodeURIComponent(fecha_vuelta) +
          '&salida_ida='+encodeURIComponent(salida_ida) +
          '&salida_vuelta='+encodeURIComponent(salida_vuelta) +
          '&pvp_final='+encodeURIComponent(pvp_final),
          
    success: function(){
      var ok = peticion.responseText;
      if(ok=="true") {
        mensaje = "<p>Su vuelo se ha guardado con éxito. Puede ver los detalles en <a href='./paginas/reservas.html'>Reservas</a></p>";
        $("#alerta").html(mensaje);
        $("#alerta").removeClass("alert-danger");
        $("#alerta").addClass("alert-success");
      } else {
        mensaje = "<p>Ha ocurrido un error al reservar su vuelo.</p>";
        $("#alerta").html(mensaje);
        $("#alerta").addClass("alert-danger");
      }
     
      document.getElementById("alerta").style.visibility="visible";
      },
      error: function(){alert('Se produjo un error inesperado');}
      });
  } else {
    mensaje = "<p>Ups! Para reservar un vuelo debes estar registrado. No pierdas mas tiempo, <a href='./paginas/login.html'>inicia sesión</a></p>";
    document.getElementById("alerta").innerHTML=mensaje;
    document.getElementById("alerta").className+=" alert-danger";
    document.getElementById("alerta").style.visibility="visible";
  } 
}
/*}*/

/*FUNCION PARA MOSTRAR RESERVAS {*/
function muestrareservas(){
  var user = sessionStorage.usuario;
  var peticion = $.ajax({
  url:  'http://127.0.0.1/RandomFlights/php/muestrareservas.php?nocache='+Math.random(),
  type: 'POST',
  asnc: true,
  data: 'user='+encodeURIComponent(user),
        
  success: function(){
    $("#RESERVAS").html(peticion.responseText);
    },
    error: function(){alert('Se produjo un error inesperado');}
    });
}
/*}*/

/*FUNCION PARA MANTENER LA SESION EN BLANCO {*/
function sesion() {
  if(sessionStorage.usuario == undefined)
    sessionStorage.usuario = "";
}
/*}*/

/*Funcion para scroll automatico {*/
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false; 
      }
    }
  });
});
/*}*/

/*FUNCION PARA DESPLEGAR LA INFORMACION DE LAS RESERVAS {*/
function masInfo(id){
  var str = "#masinfo_"+id;
  $(str).toggle(500);
}

/*}*/

/*FUNCION PARA GUARDAR EN SESION LOS DATOS DEL VUELO RESERVADO {*/
function datosSesion() {
  sessionStorage.ida = $('#ida').val();
  sessionStorage.destino = $('#destino').val();
  sessionStorage.vuelta = $('#vuelta').val();
  sessionStorage.hotel = $('#hotel').val();
  sessionStorage.direccion_hotel = $('#direccion_hotel').val();
  sessionStorage.pvp_final = $('#pvp_final').val();
  sessionStorage.fecha_salida = $('#fecha_salida').val();
  sessionStorage.fecha_vuelta = $('#fecha_vuelta').val(); 
  sessionStorage.salida_ida = $('#salida_ida').val(); 
  sessionStorage.salida_vuelta = $('#salida_vuelta').val(); 
  var user = sessionStorage.usuario;
}
/*}*/

/*FUNCION PARA RECOGER EL ID DE UNA RESERVA*/
function sesionID(id) {
  sessionStorage.id = id;
}
/*}*/

/*FUNCION PARA CONFIRMAR PAGO {*/
function confirmarPago(){
  var ida = sessionStorage.ida;
  var destino = sessionStorage.destino;
  var vuelta = sessionStorage.vuelta;
  var hotel = sessionStorage.hotel;
  var direccion_hotel = sessionStorage.direccion_hotel;
  var pvp_final = sessionStorage.pvp_final;
  var fecha_salida = sessionStorage.fecha_salida;
  var fecha_vuelta = sessionStorage.fecha_vuelta;
  var salida_ida = sessionStorage.salida_ida;
  var salida_vuelta = sessionStorage.salida_vuelta;
  var user = sessionStorage.usuario;
  var id = sessionStorage.id;

  var peticion = $.ajax({
  url:  'http://127.0.0.1/RandomFlights/php/pagos.php?nocache='+Math.random(),
  type: 'POST',
  asnc: true,
  data: 'ida='+encodeURIComponent(ida) +
          '&destino='+encodeURIComponent(destino) +
          '&vuelta='+encodeURIComponent(vuelta) +
          '&hotel='+encodeURIComponent(hotel) +
          '&direccion_hotel='+encodeURIComponent(direccion_hotel) +
          '&user='+encodeURIComponent(user) +
          '&fecha_salida='+encodeURIComponent(fecha_salida) +
          '&fecha_vuelta='+encodeURIComponent(fecha_vuelta) +
          '&salida_ida='+encodeURIComponent(salida_ida) +
          '&salida_vuelta='+encodeURIComponent(salida_vuelta) +
          '&id='+encodeURIComponent(id) +
          '&pvp_final='+encodeURIComponent(pvp_final),

  success: function(){
   
    var ok = peticion.responseText;

    if(ok=="Si")
      var mensaje = "<div class='alert alert-success'>El pago se ha realizado de forma exitosa</div>";
    else
      var mensaje = "<div class='alert alert-warning'>Ha ocurrido un error procesando su peticion.</div>";

    $("#RESULTADOCOMPRA").html(mensaje);
    },
    error: function(){alert('Se produjo un error inesperado');}
    });
}
/*}*/

/*FUNCION PARA borrar reserva {*/
function borrarReserva(id){
  var id = id;

  var peticion = $.ajax({
  url:  'http://127.0.0.1/RandomFlights/php/borrarReserva.php?nocache='+Math.random(),
  type: 'POST',
  asnc: true,
  data: 'id='+encodeURIComponent(id),


  success: function(){
   
    
      location.reload();
      
    },
    error: function(){alert('Se produjo un error inesperado');}
    });
}
/*}*/
