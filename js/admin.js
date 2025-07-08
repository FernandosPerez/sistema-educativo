function objetoAjax() {
    var xmlhttp = false;
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (E) {
        xmlhttp = false;
      }
    }
  
    if (!xmlhttp && typeof XMLHttpRequest != "undefined") {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}


function Add() {
    //alert("hola");
    divResultado = document.getElementById("datosModal");
    ajax = objetoAjax();
    ajax.open("POST", "funciones/admin.php", true);
    ajax.onreadystatechange = function () {
      if (ajax.readyState == 4) {
        //mostrar resultados en esta capa
        //divResultado.innerHTML = ajax.responseText;
      }
    };
    ajax.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded;charset=utf-8"
    );
    ajax.send("op=1");
}


//---------------------------------------------INDEX ADMIN--------------------------------------------//




function agregarNivel(){
   divResultado = document.getElementById("datosModal");
  ajax = objetoAjax();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      //mostrar resultados en esta capa
      divResultado.innerHTML = ajax.responseText;
    }
  };
  ajax.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded;charset=utf-8"
  );
  ajax.send("op=10");
}


function guardarNivel(){


  const nombre = document.getElementById('nombre').value;

  if (!nombre) {
   
    Swal.fire({
      title: "Datos faltantes",
      text: "Por favor, complete los campos",
      icon: "warning"
    });
    return;
  }



  ajax = objetoAjax();
    ajax.open("POST", "funciones/admin.php", true);
    ajax.onreadystatechange = function () {
      if (ajax.readyState == 4) {
        if(ajax.responseText==1){
            Swal.fire({
              title: "Completado",
              text: "Nivel agregado correctamente",
              icon: "success"
            });

            $('#exampleModal').modal('hide');

            setTimeout(() => {
              location.reload(true);
            }, 2000);

            
          }else{
            Swal.fire({
              title: "Error",
              text: "Algo anda mal",
              icon: "error"
            });
          }
      }
    };
    ajax.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded;charset=utf-8"
    );
    ajax.send("op=11&nombre="+nombre);
}


function agregarmadalidad(){

divResultado = document.getElementById("datosModal");
  ajax = objetoAjax();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      //mostrar resultados en esta capa
      divResultado.innerHTML = ajax.responseText;
    }
  };
  ajax.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded;charset=utf-8"
  );
  ajax.send("op=12");

}


function guardarModalidad(){


  const nombre = document.getElementById('nombre').value;

  if (!nombre) {
   
    Swal.fire({
      title: "Datos faltantes",
      text: "Por favor, complete los campos",
      icon: "warning"
    });
    return;
  }



  ajax = objetoAjax();
    ajax.open("POST", "funciones/admin.php", true);
    ajax.onreadystatechange = function () {
      if (ajax.readyState == 4) {
        if(ajax.responseText==1){
            Swal.fire({
              title: "Completado",
              text: "Modalidad agregada correctamente",
              icon: "success"
            });

            $('#exampleModal').modal('hide');

            setTimeout(() => {
              location.reload(true);
            }, 2000);

            
          }else{
            Swal.fire({
              title: "Error",
              text: "Algo anda mal",
              icon: "error"
            });
          }
      }
    };
    ajax.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded;charset=utf-8"
    );
    ajax.send("op=13&nombre="+nombre);
}





//---------------------------------------------PLANTELES--------------------------------------------//


function agregarPlantel(){
   divResultado = document.getElementById("agregarModal");
  ajax = objetoAjax();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      //mostrar resultados en esta capa
      divResultado.innerHTML = ajax.responseText;
    }
  };
  ajax.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded;charset=utf-8"
  );
  ajax.send("op=4");
}

function plantel(id){
window.location.href=window.location.href+"?plantel="+id;

}

function regresar(){
  history.back();
}


function guardarPlantel() {
  const nombre = document.getElementById('nombre').value;
  const ubicacion = document.getElementById('ubicacion').value;
  const razon = document.getElementById('razon').value;
  const nomen = document.getElementById('nomen').value;

  if (!nombre || !ubicacion || !razon || !nomen) {
   
    Swal.fire({
      title: "Datos faltantes",
      text: "Por favor, complete todos los campos",
      icon: "warning"
    });
    return;
  }

  const ajax = new XMLHttpRequest();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
      if (ajax.readyState == 4) {
          if(ajax.responseText==1){
            Swal.fire({
              title: "Completado",
              text: "Plantel agregado correctamente",
              icon: "success"
            });

            $('#addProspectModal').modal('hide');

            setTimeout(() => {
              location.reload(true);
            }, 2000);

            
          }else{
            Swal.fire({
              title: "Error",
              text: "Algo anda mal",
              icon: "error"
            });
          }
      }
  };
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
  ajax.send("op=5&nombre=" + nombre + "&ubicacion=" + ubicacion+ "&razon=" + razon+ "&nomen=" + nomen);

}




function actualizarPlantel(id) {
  const nombre = document.getElementById('nombre').value;
  const ubicacion = document.getElementById('ubicacion').value;
  const razon = document.getElementById('razon').value;
  const nomen = document.getElementById('nomen').value;

  if (!nombre || !ubicacion || !razon || !nomen) {
   
    Swal.fire({
      title: "Datos faltantes",
      text: "Por favor, complete todos los campos",
      icon: "warning"
    });
    return;
  }

  let status=0;
  
  if ($('#status').is(":checked")) {
     status = 1;
  }
  else {
    status = 0;
  }

  const ajax = new XMLHttpRequest();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
      if (ajax.readyState == 4) {
          if(ajax.responseText==1){
            Swal.fire({
              title: "Datos actualizados",
              text: "Plantel actualizdo correctamente",
              icon: "success"
            });

            $('#addProspectModal').modal('hide');

            setTimeout(() => {
              location.reload(true);
            }, 2000);

            
          }else{
            Swal.fire({
              title: "Error",
              text: "Algo anda mal",
              icon: "error"
            });
          }
      }
  };
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
  ajax.send("op=6&nombre=" + nombre + "&ubicacion=" + ubicacion+ "&razon=" + razon+ "&nomen=" + nomen+ "&status=" + status+ "&id=" + id);

}

//-------------------------------------------  planes  -------------------------------------------------------

function planesPlantel(id){
  divResultado = document.getElementById("agregarModal");
  ajax = objetoAjax();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      //mostrar resultados en esta capa
      divResultado.innerHTML = ajax.responseText;

new DataTable('#tconceptos', {
        responsive: true,
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados"
        }
    });


    $("#tconceptos_wrapper").removeClass("form-inline");
    $("#tconceptos_wrapper").addClass("w-100");
      
    }
  };
  ajax.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded;charset=utf-8"
  );
  ajax.send("op=8&id="+id);
}

function agregarConcepto(id){
divResultado = document.getElementById("agregarModal");
  ajax = objetoAjax();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      //mostrar resultados en esta capa
      divResultado.innerHTML = ajax.responseText;      
    }
  };
  ajax.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded;charset=utf-8"
  );
  ajax.send("op=9&id="+id+"&tipo=1");
}


function guardarConcepto(plantel){

  const nombre = document.getElementById('nombre').value;
  const descuento = document.getElementById('descuento').value;
  const monto = document.getElementById('monto').value;
  const concurrencia = document.getElementById('concurrencia').value;

  if (!nombre || !monto ) {
   
    Swal.fire({
      title: "Datos faltantes",
      text: "Por favor, complete todos los campos",
      icon: "warning"
    });
    return;
  }

  const ajax = new XMLHttpRequest();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
      if (ajax.readyState == 4) {
          if(ajax.responseText==1){
            Swal.fire({
              title: "Completado",
              text: "Concepto agregado correctamente",
              icon: "success"
            });

            $('#addProspectModal').modal('hide');

             setTimeout(() => {
              location.reload(true);
            }, 2000);
          }else{
            Swal.fire({
              title: "Error",
              text: "Algo anda mal",
              icon: "error"
            });
          }
      }
  };
  ajax.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded;charset=utf-8"
  );
  ajax.send("op=16&id="+plantel+"&nombre="+nombre+"&descuento="+descuento+"&monto="+monto+"&concurrencia="+concurrencia);

}

function agregarPlan(plantel){
   divResultado = document.getElementById("agregarModal");
  ajax = objetoAjax();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      //mostrar resultados en esta capa
      divResultado.innerHTML = ajax.responseText;
    }
  };
  ajax.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded;charset=utf-8"
  );
  ajax.send("op=14&plantel=" + plantel);
}



function guardarPlan(plantel){
  
  const nombre = document.getElementById('nombre').value;
  const dia = document.getElementById('dia').value;
  const nivel = document.getElementById('nivel').value;
  const modalidad = document.getElementById('modalidad').value;

  if (!nombre || !dia || !nivel || !modalidad) {
   
    Swal.fire({
      title: "Datos faltantes",
      text: "Por favor, complete todos los campos",
      icon: "warning"
    });
    return;
  }



  if (dia>=32 || dia <=0) {
   
    Swal.fire({
      title: "Cambiar el dia",
      text: "No es un dia válido",
      icon: "warning"
    });
    return;
  }



  const checkboxes = document.querySelectorAll('input[name="concepto"]:checked');
      const conceptos = Array.from(checkboxes).map(checkbox => checkbox.value);
      

      if(conceptos.length==0){
        Swal.fire({
      title: "Datos faltantes",
      text: "Ingresa al menos un concepto",
      icon: "warning"
    });
    return;
    }

  const ajax = new XMLHttpRequest();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
      if (ajax.readyState == 4) {
          if(ajax.responseText==1){
            Swal.fire({
              title: "Completado",
              text: "Plan agregado correctamente",
              icon: "success"
            });

            $('#addProspectModal').modal('hide');

            setTimeout(() => {
              location.reload(true);
            }, 2000);

            
          }else{
            Swal.fire({
              title: "Error",
              text: "Algo anda mal",
              icon: "error"
            });
          }
      }
  };
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
  ajax.send("op=15&nombre=" + nombre + "&dia=" + dia+ "&nivel=" + nivel+ "&modalidad=" + modalidad+ "&plantel=" + plantel+ "&conceptos=" + conceptos.join("|"));
}


//---------------------------------------------USUARIOS--------------------------------------------//

function agregarUsuario() {
  divResultado = document.getElementById("agregarModal");
  ajax = objetoAjax();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      //mostrar resultados en esta capa
      divResultado.innerHTML = ajax.responseText;


        miFormulario = document.querySelector('#prospectForm');
        miFormulario.telefono.addEventListener('keypress', function (e){
          if (!soloNumeros(event)){
            e.preventDefault();
          }
        })

        //Solo permite introducir numeros.
        function soloNumeros(e){
            var key = e.charCode;
            return key >= 48 && key <= 57;
        }
    }
  };
  ajax.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded;charset=utf-8"
  );
  ajax.send("op=2");
}

function datos(id) {
  divResultado = document.getElementById("datosModal");
  ajax = objetoAjax();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      //mostrar resultados en esta capa
      divResultado.innerHTML = ajax.responseText;
    }
  };
  ajax.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded;charset=utf-8"
  );
  ajax.send("op=1&id="+id);
}


function soloNumeros(e){
    var key = e.charCode;
    return key >= 48 && key <= 57;
}



function guardarUsuario() {
  const nombre = document.getElementById('nombre').value;
  const apellidoPaterno = document.getElementById('apellidoPaterno').value;
  const apellidoMaterno = document.getElementById('apellidoMaterno').value;
  const rol = document.getElementById('rol').value;
  const campus = document.getElementById('campus').value;
  const usuario = document.getElementById('usuario').value;
  const telefono = document.getElementById('telefono').value;
  const correo = document.getElementById('correo').value;
  const comentarios = document.getElementById('comentarios').value;

  if (!nombre || !apellidoPaterno || !apellidoMaterno || !rol || !campus || !telefono || !correo ) {
   
    Swal.fire({
      title: "Datos faltantes",
      text: "Por favor, complete todos los campos",
      icon: "warning"
    });
    return;
}


  let p1=0;
  let p2=0;
  let p3=0;
  let p4=0;
  let p5=0;
  let p6=0;
  let p7=0;
  let p8=0;
  let p9=0;

  if ($('#cp1').is(":checked")) {
     p1 = 1;
  }
  else {
    p1 = 0;
  }

  if ($('#cp2').is(":checked")) {
    p2 = 1;
 }
 else {
   p2 = 0;
 }

 if ($('#cp3').is(":checked")) {
  p3 = 1;
}
else {
 p3 = 0;
}

if ($('#cp4').is(":checked")) {
  p4 = 1;
}
else {
 p4 = 0;
}

if ($('#cp5').is(":checked")) {
  p5 = 1;
}
else {
 p5 = 0;
}

if ($('#cp6').is(":checked")) {
  p6 = 1;
}
else {
 p6 = 0;
}

if ($('#cp7').is(":checked")) {
  p7 = 1;
}
else {
 p7 = 0;
}

if ($('#cp8').is(":checked")) {
  p8 = 1;
}
else {
 p8 = 0;
}

if ($('#cp9').is(":checked")) {
  p9 = 1;
}
else {
 p9 = 0;
}


  const ajax = new XMLHttpRequest();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
      if (ajax.readyState == 4) {
          if(ajax.responseText==1){
            Swal.fire({
              title: "Completado",
              text: "Usario agregado correctamente",
              icon: "success"
            });

            $('#addProspectModal').modal('hide');

             setTimeout(() => {
              location.reload(true);
            }, 2000);
          }else{
            Swal.fire({
              title: "Error",
              text: "Algo anda mal",
              icon: "error"
            });
          }


          
      }
  };
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
  ajax.send("op=3&nombre=" + nombre + "&apellidoPaterno=" + apellidoPaterno + "&apellidoMaterno=" + apellidoMaterno + 
            "&rol=" + rol + "&campus=" + campus + "&usuario=" + usuario + "&telefono=" + telefono + 
            "&correo=" + correo + "&comentarios=" + comentarios+ "&p1=" +p1+ "&p2=" +p2+ "&p3=" +p3+ "&p4=" +p4+ "&p5=" +p5+ "&p6=" +p6+ "&p7=" +p7+ "&p8=" +p8+ "&p9=" +p9);

}

function actualizarUsuario(id) {
  const nombre = document.getElementById('nombre').value;
  const apellidoPaterno = document.getElementById('apellidoPaterno').value;
  const apellidoMaterno = document.getElementById('apellidoMaterno').value;
  const rol = document.getElementById('rol').value;
  const campus = document.getElementById('campus').value;
  const usuario = document.getElementById('usuario').value;
  const password = document.getElementById('password').value;
  const telefono = document.getElementById('telefono').value;
  const correo = document.getElementById('correo').value;

  if (!nombre || !apellidoPaterno || !apellidoMaterno || !rol || !campus || !telefono || !correo ) {
   
    Swal.fire({
      title: "Datos faltantes",
      text: "Por favor, complete todos los campos",
      icon: "warning"
    });
    return;
}


  let p1=0;
  let p2=0;
  let p3=0;
  let p4=0;
  let p5=0;
  let p6=0;
  let p7=0;
  let p8=0;
  let p9=0;

  if ($('#p1').is(":checked")) {
     p1 = 1;
  }
  else {
    p1 = 0;
  }

  if ($('#p2').is(":checked")) {
    p2 = 1;
 }
 else {
   p2 = 0;
 }

 if ($('#p3').is(":checked")) {
  p3 = 1;
}
else {
 p3 = 0;
}

if ($('#p4').is(":checked")) {
  p4 = 1;
}
else {
 p4 = 0;
}

if ($('#p5').is(":checked")) {
  p5 = 1;
}
else {
 p5 = 0;
}

if ($('#p6').is(":checked")) {
  p6 = 1;
}
else {
 p6 = 0;
}

if ($('#p7').is(":checked")) {
  p7 = 1;
}
else {
 p7 = 0;
}

if ($('#p8').is(":checked")) {
  p8 = 1;
}
else {
 p8 = 0;
}

if ($('#p9').is(":checked")) {
  p9 = 1;
}
else {
 p9 = 0;
}


  const ajax = new XMLHttpRequest();
  ajax.open("POST", "funciones/admin.php", true);
  ajax.onreadystatechange = function () {
      if (ajax.readyState == 4 ) {
          if(ajax.responseText==1){
            Swal.fire({
              title: "Completado",
              text: "Usario agregado correctamente",
              icon: "success"
            });

            $('#addProspectModal').modal('hide');

             setTimeout(() => {
              location.reload(true);
            }, 2000);
          }else{
            Swal.fire({
              title: "Error",
              text: "Algo anda mal",
              icon: "error"
            });
          }


          
      }
  };
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
  ajax.send("op=7&nombre=" + nombre + "&apellidoPaterno=" + apellidoPaterno + "&apellidoMaterno=" + apellidoMaterno + 
            "&rol=" + rol + "&campus=" + campus + "&usuario=" + usuario + "&telefono=" + telefono + 
            "&correo=" + correo + "&password=" + password +"&p1=" +p1+ "&p2=" +p2+ "&p3=" +p3+ "&p4=" +p4+ "&p5=" +p5+ "&p6=" +p6+ "&p7=" +p7+ "&p8=" +p8+ "&p9=" +p9+ "&id=" +id);

}


