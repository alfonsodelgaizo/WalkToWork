<?php


$json = file_get_contents("http://dati.regione.campania.it/catalogo/resources/APL-AgenziaPerIlLavoro.json");
$decoded = json_decode($json, TRUE);

    //$cnt=count($decoded);

    $i=108;

        $nome= $decoded[$i]["PreProcessoNormalizzazione"];
        $comune= $decoded[$i]["Comune"];
        $provincia= $decoded[$i]["Provincia"];
        $indirizzo= $decoded[$i]["IndirizzoSedeOperativa"];
        $telefono= $decoded[$i]["Telefono"];
        $fax= $decoded[$i]["Fax"];
        $tipoEnte= $decoded[$i]["TipoEnte"];

        echo"<h1>$pre </h1>";
        echo"<h1>$comune </h1>";
        echo"<h1>$indirizzo </h1>";
        echo"<h1>$tipoEnte</h1>
            <br>";

       $URL="http://localhost:8400/load?nome=$nome&com=$comune&pro=$provincia&ind=$indirizzo&tel=$telefono&fax=$fax$&tipo=$tipoEnte";     
       header('Location: '.$URL);






    

?>