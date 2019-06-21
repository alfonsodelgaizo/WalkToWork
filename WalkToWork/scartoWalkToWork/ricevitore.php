<?php

$lavoro= $_POST["lavoro"];
$citta= $_POST["citta"];


 
$x=10;
$k=0;


while($x <= 70) {

$urlCostruito='https://it.indeed.com/jobs?q=&l='.$citta.'&start='.$x ;
	
$html = file_get_contents($urlCostruito);

//parse the html into a DOMDocument
$dom = new DOMDocument();
@$dom->loadHTML($html);
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("//div[@class='title']");
$hrefs2 = $xpath->evaluate("//span[@class='company']");
$hrefs3 = $xpath->evaluate("//div[@class='summary']");
$hrefs4 = $xpath->evaluate("//span[@class='location']");
//$hrefs5 = $xpath->evaluate("//div[@class='title']//a/@href");
$hrefs5 = $xpath->evaluate("//div[@style='display: none']/@id");






//$href = $hrefs->item(4);
//$url = $href->nodeValue;
//echo($url)

for ($i=0;$i < $hrefs->length; $i++) {
    $k++;
    $href = $hrefs->item($i);
    $url = $href->nodeValue;

    $href2 = $hrefs2->item($i);
    $url2 = $href2->nodeValue;

    $href3 = $hrefs3->item($i);
    $url3 = $href3->nodeValue;

    $href4 = $hrefs4->item($i);
    $url4 = $href4->nodeValue;


    $href5 = $hrefs5->item($i);
    $url5 = $href5->nodeValue;

    $codice=tagliaCodice($url5);

    $codice2=$codice;

    $codice="pj_".$codice;

    $hrefs6 = $xpath->evaluate("//div[@id='$codice']/@data-empn");
    $href6 = $hrefs6->item(0);
    $url6 = $href6->nodeValue;

    $linkFinale='https://it.indeed.com/jobs?q&l='.$citta.'&start='.$x.'&advn='.$url6.'&vjk='.$codice2 ;






    echo "<h1> $k </h1>
          <br> Des: $url  </br>  
          <br> Compagnia: $url2 </br>
          <br> Summary: $url3 </br>
          <br> Location: $url4 </br>
          <br> VJK $codice </br>
          <h1> ADV : $url6 </h1>
          <h1> LinkFinale : $linkFinale </h1>

         ";
//SONO RIUSCITO A TROVARE LA SOLUZIONE PER ESTRAPOLARE IL CODICE vjk CHE MI SERVIRA' PER 
//OTTENERE TRAMITE SCRAPING L'ALTRO CODICE NUMERICO CHIAMATO "advn" PER POTER CREARE 
//IL LINK PER VISUALIZZARE L'ANNUNCIO DI LAVORO. OTTIMO LAVORO ALFONSO !!!!!!! 
}

$x=$x+10;

}



function tagliaCodice($stringa) {
    $bool=1;
    $appoggio="";
    for($i=0;$i<strlen($stringa);$i++){
      if($bool==0) $appoggio=$appoggio.$stringa[$i];
      if($stringa[$i]==="_") $bool=0;
  }
  echo "<h1> DOJO $appoggio $bool</h1>";
  return $appoggio;
  }
 
 
?>