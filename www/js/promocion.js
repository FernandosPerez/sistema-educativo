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
    ajax.open("POST", "funciones/promocion.php", true);
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

function agregarProspecto(id) {
  divResultado = document.getElementById("agregarModal");
  ajax = objetoAjax();
  ajax.open("POST", "funciones/promocion.php", true);
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
  ajax.send("op=1");
}

function datos(id) {
  divResultado = document.getElementById("datosModal");
  ajax = objetoAjax();
  ajax.open("POST", "funciones/promocion.php", true);
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



function guardarProspecto() {
  const nombre = document.getElementById('nombre').value;
  const apellidoPaterno = document.getElementById('apellidoPaterno').value;
  const apellidoMaterno = document.getElementById('apellidoMaterno').value;
  const nivel = document.getElementById('nivel').value;
  const modalidad = document.getElementById('modalidad').value;
  const ciclo = document.getElementById('ciclo').value;
  const telefono = document.getElementById('telefono').value;
  const correo = document.getElementById('correo').value;
  const comentarios = document.getElementById('comentarios').value;

  if (!nombre || !apellidoPaterno || !apellidoMaterno || !nivel || !modalidad || !ciclo || !telefono || !correo || !comentarios) {
      Swal.fire({
      title: "Datos faltantes",
      text: "Por favor, complete todos los campos",
      icon: "warning"
    });
      return;
  }

  const ajax = new XMLHttpRequest();
  ajax.open("POST", "funciones/promocion.php", true);
  ajax.onreadystatechange = function () {
      if (ajax.readyState == 4 && ajax.status == 200) {
          alert("Prospecto guardado correctamente.");
          $('#addProspectModal').modal('hide');
          document.getElementById('prospectForm').reset(); 
      }
  };
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
  ajax.send("op=2&nombre=" + nombre + "&apellidoPaterno=" + apellidoPaterno + "&apellidoMaterno=" + apellidoMaterno + 
            "&nivel=" + nivel + "&modalidad=" + modalidad + "&ciclo=" + ciclo + "&telefono=" + telefono + 
            "&correo=" + correo + "&comentarios=" + comentarios);
}


