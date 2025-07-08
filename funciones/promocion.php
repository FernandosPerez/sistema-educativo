<?php
include("../include/conn.php");
switch($_REQUEST['op']){ 
	case 1:
            $response='
                    <div class="modal-header">
                            <h5 class="modal-title" id="addProspectModalLabel">Agregar prospecto</h5>
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
                                <label for="nombre">Nombres</label>
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
                                <label for="nivel">Nivel</label>
                                <select class="form-control" id="nivel" required>
                                    <option value="Prepa">Prepa</option>
                                    <option value="Uni">Uni</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modalidad">Modalidad</label>
                                <select class="form-control" id="modalidad" required>
                                    <option value="Escolar">Escolar</option>
                                    <option value="Sabatino">Sabatino</option>
                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ciclo">Ciclo</label>
                                            <input type="text" class="form-control" id="ciclo" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Tercera Fila: Teléfono, Correo Electrónico -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input type="number" class="form-control" id="telefono" required>
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
                                            <label for="comentarios">Comentarios</label>
                                            <textarea class="form-control" id="comentarios" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="saveProspectBtn" onclick="guardarPropsecto()">Guardar Prospecto</button>
                        </div>';
                        echo $response;
        break;

        case 2:
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
    }