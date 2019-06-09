<?php

set_time_limit(180);


$html = file_get_contents("https://www.gazzettaufficiale.it/gazzetta/concorsi/caricaDettaglio?dataPubblicazioneGazzetta=2019-06-07&numeroGazzetta=45&elenco30giorni=true");

    //parse the html into a DOMDocument
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    $hrefs = $xpath->evaluate("//span[@class='emettitore']");
    $hrefs2 = $xpath->evaluate("//span[@class='data']");
    $hrefs3 = $xpath->evaluate("//span[@class='data']/../@href");
    $hrefs7 = $xpath->evaluate("//span[@class='estremi']");

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

       $intero=$hrefs2->length;

       echo "INTERO: $intero";

$i=0;



//$href = $hrefs->item(4);
//$url = $href->nodeValue;
//echo($url)

    while($i<$hrefs2->length){
    
    $href3 = $hrefs3->item($i);
    $url3 = $href3->nodeValue;
    $numero=substr($url3,168,2);
 
    $href2 = $hrefs2->item($i);
    $url2 = $href2->nodeValue;

    $href7 = $hrefs7->item(1);
    $url7 = $href7->nodeValue;

    $hrefs4 = $xpath->evaluate("//a[@href='$url3']");
    $href4 = $hrefs4->item(1);
    $url4 = $href4->nodeValue;

    $link="https://www.gazzettaufficiale.it".$url3;
       
        
    $html2 = file_get_contents("$link");

    //parse the html into a DOMDocument
    $dom2 = new DOMDocument();
    @$dom2->loadHTML($html2);
    $xpath2 = new DOMXPath($dom2);
        
       
    $hrefs5 = $xpath2->evaluate("//div[@id='testa_atto']/h1[@class='consultazione']");
    $href5 = $hrefs5->item(0);
    $url5 = $href5->nodeValue;

    //con trim tolgo gli spazi
    $nomeEnte= trim($url5);
    $tipologia= trim($url2);
    $descrizione = trim($url4);
    $pubblicazione = trim($url7);

    $nuovoNomeEnte=str_replace("'","\'",$nomeEnte);
    $nuovoDescrizione=str_replace("'","\'",$descrizione);
    $comune = "Enti Locali";
    $amministrazioniCentrali = "Amministrazioni Centrali"; 
    $entiPubbliciStatali = "Enti Pubblici Statali"; 
    $universita = "Universita ed altri istituti di Istruzione"; 
    $ospedali = "Aziende Sanitarie Locali ed altre Istituzioni Sanitarie"; 
    //Tra le tipologie prendiamo solo i Concorsi
     if(strstr($url2, "CONCORSO")){
       
        $scadenza=substr($url2,50,40); 
        $scadenzaDefinitiva=trim($scadenza);

         //definizione SEZIONE ENTI LOCALI
        if(strstr($url5, "COMUNE ") or strstr($url5, "COMUNI") or strstr ($url5, "PROVINCIA ")
        or strstr ($url5, "UNIONE ") or strstr ($url5, "REGIONE ") or strstr($url5, "CIRCONDARIO ")  ){
          if(strstr($url5, "PROVINCIA") and strstr($url5, "AZIENDA")){
        
          }else{
          $sql = "INSERT INTO fontegazzetta (tipologiaEnte, nomeEnte,tipologia,pubblicazione, scadenza,descrizione, link)  VALUES('$comune','$nuovoNomeEnte', '$tipologia', '$pubblicazione', '$scadenzaDefinitiva', '$nuovoDescrizione', '$link')";
           $result = $connessione->query($sql); 
        }
      }
        //definizione SEZIONE AMMINISTRAZIONI CENTRALI 
        if(strstr($url5, "MINISTERO") or strstr($url5, "COMANDO") or strstr($url5, "STATO") or strstr($url5, "ISTITUTO") ){
          if(strstr($url5, "ISTITUTO") and strstr($url5, "NAZIONALE")){
        
          }else{
          $sql = "INSERT INTO fontegazzetta (tipologiaEnte, nomeEnte,tipologia,pubblicazione,  scadenza, descrizione, link)  VALUES('$amministrazioniCentrali','$nuovoNomeEnte', '$tipologia','$pubblicazione', '$scadenzaDefinitiva', '$nuovoDescrizione', '$link')";
          $result = $connessione->query($sql); 
        }
        }
         //definizione SEZIONE ENTI PUBBLICI STATALI
        if(strstr($url5, "NAZIONALE")){
           if(strstr($url5, "NAZIONALE") and strstr($url5, "AZIENDA")){
        
          }else{
          $sql = "INSERT INTO fontegazzetta (tipologiaEnte, nomeEnte,tipologia,pubblicazione,  scadenza, descrizione, link)  VALUES('$entiPubbliciStatali','$nuovoNomeEnte', '$tipologia', '$pubblicazione', '$scadenzaDefinitiva', '$nuovoDescrizione', '$link')";
          $result = $connessione->query($sql); 
                }    
       }
        
        
         //definizione SEZIONE UNIVERSITA' ED ALTRI ISTITUTI DI ISTRUZIONE
       if(strstr($url5, "UNIVERSITA'") or strstr($url5, "SCUOLA") or strstr($url5, "POLITECNICO")){
          $sql = "INSERT INTO fontegazzetta (tipologiaEnte, nomeEnte,tipologia,pubblicazione,  scadenza, descrizione, link)  VALUES('$universita','$nuovoNomeEnte', '$tipologia','$pubblicazione',  '$scadenzaDefinitiva', '$nuovoDescrizione', '$link')";
          $result = $connessione->query($sql); 
        }


           //definizione SEZIONE AZIENDE SANITARIE LOCALI ED ALTRE ISTITUZIONI SANITARI
        if(strstr($url5, "OSPEDALIERA'") or strstr($url5, "OSPEDALIERO") or strstr($url5, "SANITARIA") 
        or strstr($url5, "CENTRO") or strstr($url5, "OSPITALIERI ") ){
          $sql = "INSERT INTO fontegazzetta (tipologiaEnte, nomeEnte, tipologia, pubblicazione,  scadenza, descrizione, link)  VALUES('$ospedali','$nuovoNomeEnte', '$tipologia', '$pubblicazione', '$scadenzaDefinitiva', '$nuovoDescrizione', '$link')";
          $result = $connessione->query($sql); 
        }
      }
               
     //manca il caso di istituto in amministrazioni centrali
        echo "
        <h1> $i </h1>
        <font face= \" Verdana \" size= \" 4 \" color= \"#ff7f50 \"> $url5 </font> 
        <br> 
        <br>
        <font face= \" Verdana \" size= \" 3 \" color= \"#20b2aa \"> $url2  </font>
        <br>
        <br>
        <font face= \" Verdana \" size= \" 2 \" color= \"#000080 \"> $url4  </font>
        <font face= \" Verdana \" size= \" 2 \" color= \"#000080 \"> $link  </font>
        <font face= \" Verdana \" size= \" 2 \" color= \"#000080 \"> $url7  </font>
        
        <br>
        <br>
    ";


    $i++;

    }
  
    


$connessione->close();

?>