<?php
//$recensione=$_REQUEST['urlRecensione'];

$html = file_get_contents("https://it.indeed.com/cmp/Adecco/reviews");
//parse the html into a DOMDocument
$dom = new DOMDocument();
@$dom->loadHTML($html);
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("//div[@class='cmp-review-title']/span [1]");
$hrefs2 = $xpath->evaluate("//span[@class='cmp-review-text']");

$hrefs3 = $xpath->evaluate("//div[@id='cmp-header-logo']/img/@src");
$href3 = $hrefs3->item(0);




if(empty($href3->nodeValue)){

  //non fare niente perchè la lista è vuota
  //altrimenti prende il nodo


  } else {
    
    $url3 = $href3->nodeValue;               
    echo "<img src=\"$url3\">";

  }

  $hrefs5 = $xpath->evaluate("//div[@class='cmp-ratingNumber']");
 

 for ($i=0;$i < $hrefs->length; $i++) {


   $href = $hrefs->item($i);
   $url = $href->nodeValue;

   $href2 = $hrefs2->item($i);
   $url2 = $href2->nodeValue;
   
   $href5 = $hrefs5->item($i);
   $url5 = $href5->nodeValue;
  
   if($url5==5){
     echo("<h1> STELLE 5 </h1>");
   }


   echo "<h2> TITOLO: $url </h2>
        <h1> DESCRIZIONE $url2 </h1>
";

 }

?>