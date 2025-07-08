<?php
include("../include/conn.php");
//try{
switch($_REQUEST['op']){
	case 1:

        $stmt = $dbconn->prepare("SELECT * FROM usuarios WHERE id='".$_POST['id']."'");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $dbconn->prepare("SELECT * FROM planteles");
        $stmt->execute();
        $planteles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $dbconn->prepare("SELECT * FROM roles");
        $stmt->execute();
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $dbconn->prepare("SELECT * FROM permisos where usuario='".$_POST['id']."'");
        $stmt->execute();
        $permisos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $response=' <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">'.$rows[0]["nombre"].' '.$rows[0]["apellidoP"] .' '.$rows[0]["apellidoM"] .'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Parte superior -->
                                        <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" required value="'.$rows[0]["nombre"].'"> 
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="apellidoPaterno">Apellido Paterno</label>
                                                <input type="text" class="form-control" id="apellidoPaterno" required value="'.$rows[0]["apellidoP"].'">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="apellidoMaterno">Apellido Materno</label>
                                                <input type="text" class="form-control" id="apellidoMaterno" required value="'.$rows[0]["apellidoM"].'">
                                            </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="usuario">Usuario</label>
                                            <input type="text" class="form-control" id="usuario" required value="'.$rows[0]["cuenta"].'"> 
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="correo">Correo</label>
                                                <input type="text" class="form-control" id="correo" required value="'.$rows[0]["correo"].'">
                                            </div>
                                        </div>
                                        </div>


                                        <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono">Telefono</label>
                                            <input type="number" class="form-control" id="telefono" required value="'.$rows[0]["telefono"].'" max="10"> 
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Contraseña</label>
                                                <input type="text" class="form-control" id="password" required value="'.$rows[0]["password"].'">
                                            </div>
                                        </div>
                                        </div>

                                         <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" class="form-control" id="direccion" required value="'.$rows[0]["direccion"].'"> 
                                        </div>
                                        </div>
                                        </div>

                            <div class="row">
                                <!-- Columna izquierda para la imagen -->
                                <div class="col-md-6">
                                        <div class="pl-5 pt-4 ">
                                                <div class="pl-1" style="width:80%">';
                                                if($rows[0]["foto"]==""){
                                                $response = $response. '<img src="img/undraw_profile.svg" alt="Imagen" class="image-container rounded-circle ">';
                                                }else{
                                                    $response = $response. '<img src="img/undraw_profile.svg" alt="Imagen" class="image-container rounded-circle ">';
                                                }
                                                $response = $response. ' 
                                                </div>
                                        </div>
                                </div>
                                <!-- Columna derecha con 4 apartados -->
                                <div class="col-md-6">
                                    <form>
                                        <div class="form-group">
                                        <label for="campus">Campus</label>
                                         <select class="form-control" id="campus" >';

                                foreach($planteles as $row){
                                    if($row["id"]==$rows[0]["campus"]){
                                        $response=$response.' <option value="'.$row["id"].'" selected>'.$row["nombre"].'</option>';
                                    }else{
                                        $response=$response.' <option value="'.$row["id"].'">'.$row["nombre"].'</option>';
                                    }
                                    
                                }
                                   
                               $response=$response.' </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="rol">ROL</label>
                                            <select class="form-control" id="rol" >';

                                foreach($roles as $row){
                                    if($row["id"]==$rows[0]["rol"]){
                                        $response=$response.' <option value="'.$row["id"].'" selected>'.$row["rol"].'</option>';
                                    }else{
                                        $response=$response.' <option value="'.$row["id"].'">'.$row["rol"].'</option>';
                                    }
                                    
                                }
                                   
                               $response=$response.' </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Parte inferior con scroll y 10 cuadros -->
                            <div class="scrollable">
                            <div class="row">

                                 <div class="row m-4 container">
                        <div class="col-md-4">


                        <div class="custom-control custom-switch">';
                                    if($permisos[0]["chat"]==1){
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p1" checked">';
                                    }else{
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p1" ">';
                                    }
                               $response=$response.'
                        
                        <label class="custom-control-label" for="p1">Chat</label>
                        </div>
                        <div class="custom-control custom-switch">';
                                    if($permisos[0]["asist"]==1){
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p2" checked>';
                                    }else{
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p2">';
                                    }
                               $response=$response.'
                        <label class="custom-control-label" for="p2">Asistencia</label>
                        </div>
                        <div class="custom-control custom-switch">';
                                    if($permisos[0]["noticias"]==1){
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p3" checked>';
                                    }else{
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p3">';
                                    }
                               $response=$response.'
                        <label class="custom-control-label" for="p3">Noticias</label>
                        </div>
                        </div>
                                 <div class="col-md-4">
                        <div class="custom-control custom-switch">';
                                    if($permisos[0]["calendario"]==1){
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p4" checked>';
                                    }else{
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p4">';
                                    }
                               $response=$response.'
                        <label class="custom-control-label" for="p4">Calendario</label>
                        </div>
                        <div class="custom-control custom-switch">';
                                    if($permisos[0]["alertas"]==1){
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p5" checked>';
                                    }else{
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p5">';
                                    }
                               $response=$response.'
                        <label class="custom-control-label" for="p5">Alertas</label>
                        </div>
                        <div class="custom-control custom-switch">';
                                    if($permisos[0]["blog"]==1){
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p6" checked>';
                                    }else{
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p6">';
                                    }
                               $response=$response.'
                        <label class="custom-control-label" for="p6">Blog</label>
                        </div>
                        </div>
                            <div class="col-md-4">
                                <div class="custom-control custom-switch">';
                                    if($permisos[0]["reportes"]==1){
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p7" checked>';
                                    }else{
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p7">';
                                    }
                               $response=$response.'
                                <label class="custom-control-label" for="p7">Reportes</label>
                                </div>
                                <div class="custom-control custom-switch">';
                                    if($permisos[0]["tienda"]==1){
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p8" checked>';
                                    }else{
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p8">';
                                    }
                               $response=$response.'
                                <label class="custom-control-label" for="p8">Tienda</label>
                                </div>
                                <div class="custom-control custom-switch">';
                                    if($permisos[0]["notas"]==1){
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p9" checked>';
                                    }else{
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="p9">';
                                    }
                               $response=$response.'
                                <label class="custom-control-label" for="p9">Notas</label>
                                </div>
                            </div>
                        </div>


                            </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" onclick="actualizarUsuario('.$rows[0]["id"] .')">Guardar Cambios</button>
                        </div>';
                        echo $response;
        break;

        case 2:

        $stmt = $dbconn->prepare("SELECT * FROM roles");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt2 = $dbconn->prepare("SELECT * FROM planteles where status=1");
        $stmt2->execute();
        $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            $response='
                    <div class="modal-header">
                            <h5 class="modal-title" id="addProspectModalLabel">Agregar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <!-- Formulario de Prospecto -->
                        <form id="prospectForm" autocomplete="off" >
                            <div class="row">
                        <!-- Primera Fila: Nombre, Apellido Paterno, Apellido Materno -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" required> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellidoPaterno">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellidoPaterno" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellidoMaterno">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellidoMaterno" required>
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Segunda Fila: Nivel (select), Modalidad (select), Ciclo -->
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="rol">Rol</label>
                                <select class="form-control" id="rol" required>';

                                foreach($rows as $row){
                                    $response=$response.' <option value="'.$row["id"].'">'.$row["rol"].'</option>';
                                }

                                    
                                   
                               $response=$response.' </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="campus">Campus</label>
                                <select class="form-control" id="campus" required>';

                                foreach($rows2 as $row){
                                    $response=$response.' <option value="'.$row["id"].'">'.$row["nombre"].'</option>';
                                }

                                    
                                   
                               $response=$response.' </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="usuario">Usuario</label>
                                            <input type="text" class="form-control" id="usuario" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Tercera Fila: Teléfono, Correo Electrónico -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input type="text" class="form-control" id="telefono" maxlength="10">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="correo">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="correo" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Cuarta Fila: Comentarios -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="comentarios">Dirección</label>
                                            <textarea class="form-control" id="comentarios" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row m-4 container">
                        <div class="col-md-4">
                            <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="cp1">
                            <label class="custom-control-label" for="cp1">Chat</label>
                            </div>
                            <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="cp2">
                            <label class="custom-control-label" for="cp2">Asistencia</label>
                            </div>
                            <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="cp3">
                            <label class="custom-control-label" for="cp3">Noticias</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="cp4">
                            <label class="custom-control-label" for="cp4">Calendario</label>
                            </div>
                            <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="cp5">
                            <label class="custom-control-label" for="cp5">Alertas</label>
                            </div>
                            <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="cp6">
                            <label class="custom-control-label" for="cp6">Blog</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="cp7">
                            <label class="custom-control-label" for="cp7">Reportes</label>
                            </div>
                            <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="cp8">
                            <label class="custom-control-label" for="cp8">Tienda</label>
                            </div>
                            <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="p9">
                            <label class="custom-control-label" for="p9">Notas</label>
                            </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="saveProspectBtn" onclick="guardarUsuario()">Agregar usuario</button>
                        </div>';
                        echo $response;
        break;

        case 3:
            $nombre=$_POST["nombre"];
            $apellidoPaterno=$_POST["apellidoPaterno"];
            $apellidoMaterno=$_POST["apellidoMaterno"];
            $rol=$_POST["rol"];
            $campus=$_POST["campus"];
            $usuario=$_POST["usuario"];
            $telefono=$_POST["telefono"];
            $correo=$_POST["correo"];
            $direccion=$_POST["direccion"];

            $chat=$_POST["p1"];
            $asistencia=$_POST["p2"];
            $noticias=$_POST["p3"];

            $calendario=$_POST["p4"];
            $alertas=$_POST["p5"];-
            $blog=$_POST["p6"];

            $reportes=$_POST["p7"];
            $tienda=$_POST["p8"];
            $notas=$_POST["p9"];

            try{
               
                $query = "INSERT into usuarios (nombre ,apellidoP, apellidoM, cuenta, correo,password, telefono,campus,status,rol,direccion) VALUES
                ('".$nombre."','".$apellidoPaterno."','".$apellidoMaterno."','".$usuario."','".$correo."',1234,'".$telefono."','".$campus."',1,'".$rol."','".$direccion."')";
                    $exc_query = $dbconn->prepare($query);
                    $exc_query->execute();

                        $query = "SELECT * from usuarios order by id desc limit 1 ";
                        $exc_query = $dbconn->prepare($query);
                        $exc_query->execute();
                        $cont = $exc_query->fetchAll(PDO::FETCH_ASSOC);

                        $query = "INSERT into permisos (usuario,chat,asist,noticias,calendario,alertas,blog,reportes,tienda,notas)
                        values ('".$cont[0]["id"]."','".$chat."','".$asistencia."','".$noticias."','".$calendario."','".$alertas."','".$blog."','".$reportes."','".$tienda."','".$notas."')";
                            $exc_query = $dbconn->prepare($query);
                            $exc_query->execute();

                    echo $response = 1;
            } catch (Error $e) {
                echo $response = 0;
            }

        break;

        case 4:

        $response='
                    <div class="modal-header">
                            <h5 class="modal-title" id="addProspectModalLabel">Agregar Plantel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <!-- Formulario de Prospecto -->
                        <form id="prospectForm" autocomplete="off" >
                            <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ubicacion">Ubicación</label>
                                                <input type="text" class="form-control" id="ubicacion" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="razon">Razón social</label>
                                                <input type="text" class="form-control" id="razon" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nomen">Nomenclatura</label>
                                                <input type="text" class="form-control" id="nomen" required>
                                            </div>
                                        </div>
                             </div>
                        
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="saveProspectBtn" onclick="guardarPlantel()">Agregar plantel</button>
                        </div>';
                        echo $response;
        break;    


        case 5:
            $nombre=strtoupper($_POST["nombre"]);
            $ubicacion=strtoupper($_POST["ubicacion"]);
            $razon=strtoupper($_POST["razon"]);
            $nomen=strtoupper($_POST["nomen"]);

            try{
                $query = "INSERT planteles VALUES ('','".$nombre."','".$ubicacion."','".$razon."','".$nomen."','1')";
                    $exc_query = $dbconn->prepare($query);
                    $exc_query->execute();
                    echo $response = 1;
            } catch (Error $e) {
                
                //file_put_contents('../include/log.txt', print_r("error ---------------".$e, true), FILE_APPEND);
                echo $response = 0;
            }
 
        break;

        case 6:
            $id=$_POST["id"];
            $nombre=strtoupper($_POST["nombre"]);
            $ubicacion=strtoupper($_POST["ubicacion"]);
            $razon=strtoupper($_POST["razon"]);
            $nomen=strtoupper($_POST["nomen"]);
            $status=$_POST["status"];

            try{
               $query = "UPDATE planteles SET nombre = '".$nombre."', ubicacion = '".$ubicacion."',  razon_social = '".$razon."', nomenclatura = '".$nomen."', status = '".$status."'  WHERE id = '".$id."'" ; 
				$consulta = $dbconn->prepare($query);
				$consulta->execute();                
                echo $response = 1;
            } catch (Error $e) {
                //file_put_contents('../include/log.txt', print_r("error ---------------".$e, true), FILE_APPEND);
                echo $response = 0;
            }
 
        break;

         case 7:
            $id=$_POST["id"];

            $nombre=$_POST["nombre"];
            $apellidoPaterno=$_POST["apellidoPaterno"];
            $apellidoMaterno=$_POST["apellidoMaterno"];
            $rol=$_POST["rol"];
            $campus=$_POST["campus"];
            $usuario=$_POST["usuario"];
            $password=$_POST["password"];
            $telefono=$_POST["telefono"];
            $correo=$_POST["correo"];
            $direccion=$_POST["direccion"];

            $chat=$_POST["p1"];
            $asistencia=$_POST["p2"];
            $noticias=$_POST["p3"];

            $calendario=$_POST["p4"];
            $alertas=$_POST["p5"];-
            $blog=$_POST["p6"];

            $reportes=$_POST["p7"];
            $tienda=$_POST["p8"];
            $notas=$_POST["p9"];

            try{
                            $query = "UPDATE usuarios set nombre= '".$nombre."',apellidoP= '".$apellidoPaterno."',apellidoM= '".$apellidoMaterno."',cuenta= '".$usuario."',correo= '".$correo."',password= '".$password."',telefono= '".$telefono."',campus= '".$campus."',rol= '".$rol."',direccion= '".$direccion."' WHERE id='".$id."'";
                            $exc_query = $dbconn->prepare($query);
                            $exc_query->execute();

                            $query = "UPDATE permisos set chat= '".$chat."',asist= '".$asistencia."',noticias= '".$noticias."',calendario= '".$calendario."',alertas= '".$alertas."',blog= '".$blog."',reportes= '".$reportes."',tienda= '".$tienda."',notas= '".$notas."' WHERE usuario='".$id."'";
                            $exc_query = $dbconn->prepare($query);
                            $exc_query->execute();

                    echo $response = 1;
            } catch (Error $e) {
                echo $response = 0;
            }

        break;

        case 8:

        $id=$_POST["id"];
        $stmt = $dbconn->prepare("SELECT c.id as idconcepto,c.nombre as concepto,c.monto,c.descuento,c.status,p.nombre as plan,p.fecha_limite,p.status,p.alumnos FROM plan_pagos p LEFT JOIN plan_pagos_conceptos c ON c.plan=p.id where p.plantel='".$id."'");
                    $stmt->execute();
                    $conceptos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $response='
                    <div class="modal-header">
                            <h5 class="modal-title m-0 font-weight-bold text-primary" id="addProspectModalLabel" >Plan de pago: '.$conceptos[0]["plan"].'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <!-- Formulario de Prospecto -->
                        <form id="prospectForm" autocomplete="off" >
                         <div class="container-fluid">
                                <table id="tconceptos" class="table table-striped nowrap table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Monto</th>
                                            <th>Descuento</th>
                                            <th>Status</th>
                                            <th><i class="fa-solid fa-trash-can"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    foreach ($conceptos as $row) {
                                          $response=$response.'<tr>
                                                <td>'.$row["idconcepto"].'</td>
                                                <td>'.$row["concepto"].'</td>
                                                <td>'.$row["monto"].'</td>
                                                <td>'.$row["descuento"].'</td>
                                                <td><div class="custom-control custom-switch">';
                                    if($row["status"]==1){
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="status" checked>';
                                    }else{
                                        $response=$response.'<input type="checkbox" class="custom-control-input" id="status">';
                                    }
                               $response=$response.'
                        </div></td>
                                                <td><i class="fa-solid fa-trash-can" style="color: #ea6c6c;"></i></td>
                                            </tr>';
                                        }
                                    $response=$response.'
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" id="saveProspectBtn" onclick="agregarConcepto('.$id.')">Administrar concepto</button>
                            <button type="button" class="btn btn-primary" id="saveProspectBtn" onclick="guardarConceptosPlantel()">Guardar cambios</button>
                        </div>';
                        echo $response;
        break;   
        
         case 9: 
             $stmt = $dbconn->prepare("SELECT * from concurrencia");
                    $stmt->execute();
                    $concurrencia = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt = $dbconn->prepare("SELECT * from descuentos");
                    $stmt->execute();
                    $descuentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                     $id=$_POST["id"];
        
            $response='
                    <div class="modal-header">
                            <h5 class="modal-title" id="addProspectModalLabel">Agregar Plantel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <!-- Formulario de Prospecto -->
                        <form id="prospectForm" autocomplete="off" >
                            <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                        <label for="descuento">Descuento</label>
                                         <select class="form-control" id="descuento" >';

                                foreach($descuentos as $row){
                                        $response=$response.' <option value="'.$row["id"].'">'.$row["descuento"].'</option>';
                                }
                               $response=$response.' </select>
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="monto">Monto</label>
                                                <input type="number" class="form-control" id="monto" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <label for="concurrencia">Concurrencia</label>
                                         <select class="form-control" id="concurrencia" >';

                                foreach($concurrencia as $row){
                                        $response=$response.' <option value="'.$row["id"].'">'.$row["nombre"].'</option>';
                                }
                               $response=$response.' </select>
                                        </div>
                                        </div>
                             </div>
                        
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="saveProspectBtn" onclick="guardarConcepto('.$id.')">Agregar concepto</button>
                        </div>';
                        echo $response;
       
        break;

        case 10:

        $response='
                    <div class="modal-header">
                            <h5 class="modal-title" id="addProspectModalLabel">Agregar Nivel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <!-- Formulario de Prospecto -->
                        <form id="prospectForm" autocomplete="off" >
                            <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" required> 
                                            </div>
                                        </div>
                             </div>
                        
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="saveProspectBtn" onclick="guardarNivel()">Agregar Nivel</button>
                        </div>';
                        echo $response;
        break;

        
        case 11:
            $nombre=strtoupper($_POST["nombre"]);

            try{
                $query = "INSERT niveles VALUES ('','".$nombre."','1')";
                    $exc_query = $dbconn->prepare($query);
                    $exc_query->execute();
                    echo $response = 1;
            } catch (Error $e) {
                
                //file_put_contents('../include/log.txt', print_r("error ---------------".$e, true), FILE_APPEND);
                echo $response = 0;
            }
 
        break;

        case 12:

        $response='
                    <div class="modal-header">
                            <h5 class="modal-title" id="addProspectModalLabel">Agregar Modalidad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form id="prospectForm" autocomplete="off" >
                            <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" required> 
                                            </div>
                                        </div>
                             </div>
                        
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="saveProspectBtn" onclick="guardarModalidad()">Agregar Modalidad</button>
                        </div>';
                        echo $response;
        break;

        case 13:
            $nombre=strtoupper($_POST["nombre"]);

            try{
                $query = "INSERT modalidades VALUES ('','".$nombre."','1')";
                    $exc_query = $dbconn->prepare($query);
                    $exc_query->execute();
                    echo $response = 1;
            } catch (Error $e) {
                
                //file_put_contents('../include/log.txt', print_r("error ---------------".$e, true), FILE_APPEND);
                echo $response = 0;
            }
 
        break;

        case 14:
 
                    $id=$_POST["plantel"];

                    $stmt = $dbconn->prepare("SELECT * FROM niveles where status=1");
                    $stmt->execute();
                    $niveles = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $stmt = $dbconn->prepare("SELECT * FROM modalidades where status=1");
                    $stmt->execute();
                    $modalidades = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $stmt = $dbconn->prepare("SELECT * FROM conceptos where status=1 and plantel='".$id."'");
                    $stmt->execute();
                    $conceptos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        $response='
                    <div class="modal-header">
                            <h5 class="modal-title" id="addProspectModalLabel">Creacion de plan de pagos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="dia">Dia de pago</label>
                                                <input type="number" class="form-control" id="dia" required min="1" max="31">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nivel">Nivel</label>
                                                <select class="form-control" id="nivel" required>';

                                foreach($niveles as $row){
                                    $response=$response.' <option value="'.$row["id"].'">'.$row["nombre"].'</option>';
                                }

                                    
                                   
                               $response=$response.' </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="modalidad">Modalidad</label>
                                                <select class="form-control" id="modalidad" required>';

                                foreach($modalidades as $row){
                                    $response=$response.' <option value="'.$row["id"].'">'.$row["nombre"].'</option>';
                                }

                                    
                                   
                               $response=$response.' </select>
                                            </div>
                                        </div>
                             </div>



                              <div class="row m-2">
                                    <table id="tcont" class="table table-striped table-hover nowrap" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">Concepto</th>
                                            <th style="text-align:center">Monto</th>
                                            <th style="text-align:center">Descuento</th>
                                            <th style="text-align:center">Agregar</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        foreach ($conceptos as $row) {
                                            $response=$response.'<tr>
                                                <td style="text-align:center">'.$row["nombre"].'</td>
                                                <td style="text-align:center">'.$row["monto"].'</td>
                                                <td style="text-align:center">'.$row["descuento"].'</td>
                                                <td style="text-align:center">
                                                <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch'.$row["id"].'" name="concepto" value="'.$row["id"].'">
                                                <label class="custom-control-label" for="customSwitch'.$row["id"].'"></label>
                                                </div>
                                                </td>
                                            </tr>';
                                        } 

                                        $response=$response.'
                                    </tbody>
                                    </table>
                             </div>
                        
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="saveProspectBtn" onclick="guardarPlan('.$id.')">Crear plan</button>
                        </div>';
                        echo $response;
        break;    



        case 15:
            $nombre=strtoupper($_POST["nombre"]);
            $plantel=$_POST["plantel"];
            $dia=$_POST["dia"];
            $nivel=$_POST["nivel"];
            $modalidad=$_POST["modalidad"];
            $conceptos=$_POST["conceptos"];

            try{
                    $exc_query = $dbconn->prepare("INSERT plan_pagos VALUES ('','".$nombre."','".$plantel."','".$dia."','".$nivel."','".$modalidad."','1')");
                    $exc_query->execute();


                    $exc_query = $dbconn->prepare("select id from plan_pagos order by id desc limit 1");
                    $exc_query->execute();
                    $plan = $exc_query->fetchAll(PDO::FETCH_ASSOC);

                    $concepto = explode("|",$conceptos);

                    foreach($concepto as $concept){

                        $exc_query = $dbconn->prepare("INSERT plan_pagos_conceptos VALUES ('','".$plan[0]["id"]."','".$concept."','".$plantel."')");
                        $exc_query->execute();
                    }



                    echo $response = 1;
            } catch (Error $e) {
                
                //file_put_contents('../include/log.txt', print_r("error ---------------".$e, true), FILE_APPEND);
                echo $response = 0;
            }
 
        break;
        case 16:
            $plantel=$_POST["id"];
            $nombre=$_POST["nombre"];
            $descuento=$_POST["descuento"];
            $monto=$_POST["monto"];
            $concurrencia=$_POST["concurrencia"];

            try{
                $query = "INSERT conceptos VALUES ('','".$plantel."','".$nombre."','".$descuento."','".$monto."','".$concurrencia."','1')";
                    $exc_query = $dbconn->prepare($query);
                    $exc_query->execute();
                    echo $response = 1;
            } catch (Error $e) {
                
                //file_put_contents('../include/log.txt', print_r("error ---------------".$e, true), FILE_APPEND);
                echo $response = 0;
            }
            break;

    }

/*
     }catch(Error $error){
        
	file_put_contents('../include/log.txt', print_r("error ------".$error."---------", true), FILE_APPEND);
	
     }  */