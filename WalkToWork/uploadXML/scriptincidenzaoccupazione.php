<?php
set_time_limit(180);


$xmlDoc = new DOMDocument();
$xmlDoc->load("incidenzaoccupazione.xml");
$xpath = new DOMXPath($xmlDoc);
$hrefs = $xpath->evaluate("//anno");
$hrefs1 = $xpath->evaluate("//regione");

$hrefs2 = $xpath->evaluate("//percentuale_della_differenza_fra_tasso_occupazione_maschile_e_femminile");


    //inizializzaizone DB
    // nome di host
    $host = "localhost:3306";
    // username dell'utente in connessione
    $user = "root";
    // password dell'utente
      
    $password = "password";
    
    $dbname = "walktowork";
    
    // stringa di connessione al DBMS
    $connessione = new mysqli($host, $user, $password,$dbname);

    // verifica su eventuali errori di connessione
    if ($connessione->connect_errno) {
        echo "Connessione FALL: ". $connessione->connect_error . ".";
        exit();
    }else{
         echo "Database creato correttamente.";
       }

for ($i=0;$i < $hrefs->length; $i++) {

    $href1 = $hrefs->item($i);
    $url = $href1->nodeValue;    
     

    $href2 = $hrefs1->item($i);
    $url2 = $href2->nodeValue;
     
    $href2 = $hrefs2->item($i);
    $url3 = $href2->nodeValue;
    
    $regione =  trim($url2);
         
    $nomecorto = substr($regione, 1);
    $rest = substr($nomecorto, 0, -1);

    $sql = "INSERT INTO datasetoccupazione (anno, regione,percentualeoccupazione)  VALUES('$url','$rest', '$url3')";
    $result = $connessione->query($sql);  

         echo "
         <h1> $i </h1>
         <font face= \" Verdana \" size= \" 4 \" color= \"#ff7f50 \"> $url </font> 
         <br> 
         <br>
         <font face= \" Verdana \" size= \" 3 \" color= \"#20b2aa \"> $rest  </font>
         <br>
         <br>
         <font face= \" Verdana \" size= \" 2 \" color= \"#000080 \"> $url3  </font>
         <h4> ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- </h4>

         <br>
         <br>
     ";
   }


   $connessione->close();


?>