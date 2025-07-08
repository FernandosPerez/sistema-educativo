<?php
include("error.php");
include("conn.php");

date_default_timezone_set("America/Mexico_City");
switch($_POST["op"]){
    case 1:

        $usuario=$_POST["usr"];
        $pass=$_POST["pass"];
        $qry = $dbconn->prepare("SELECT * FROM usuarios WHERE (cuenta = '".$usuario."' or correo='".$usuario."') and password= '".$pass."'");
        $qry->execute();
        $rowals = $qry->fetchAll(PDO::FETCH_ASSOC);

        if($qry->rowCount()!=0){
            
           $_SESSION["usuario"]=$rowals[0]['id']."|".$rowals[0]['rol']."|0|".$rowals[0]['nombre']." ".$rowals[0]['apellidoP'];
           //echo $_SESSION['usuario'];
           echo "1";
        }else{
            echo "0";
        }
          break;

          
    case 2:
        session_destroy();
        echo "1";
        break;

    }