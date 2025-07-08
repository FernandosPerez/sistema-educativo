<?php



include("include/conn.php");
$qry = $dbconn->prepare("SELECT * FROM registros WHERE usuario='30' and eco='ECO-0123' and dia='2025-03-24'");
        //$qry = $dbconn->prepare("SELECT * FROM registros WHERE usuario='" . $sesion[0] . "' and eco='" . $eco . "' and dia='2025-03-24'");
        $qry->execute();
        $rows = $qry->fetchAll(PDO::FETCH_ASSOC);

        $var1=$rows[0]["chequeos"];
        $var2=$rows[0]["latitud"];
        $var3=$rows[0]["longitud"];
        $var4=$rows[0]["isla"];

        $chequeos=explode("|",$var1);
        $lat=explode("|",$var2);
        $long=explode("|",$var3);
        $isla=explode("|",$var4);

        $arreglo = array();

        foreach($chequeos as $i =>$key) {
            array_push($arreglo,["hora" => $key ,"coords" =>["lat" => $lat[$i],"long" => $long[$i]], "nombre" => $isla[$i] ]);
        }
        $response= json_encode($arreglo, JSON_PRETTY_PRINT);
        echo $response;