<?php


ini_set('error_reporting', E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 0); // disabilita la visualizzazione degli errori a schermo.
ini_set('log_errors', 0); // disabilita il log degli errori.

$lavoro= $_POST["lavoro"];
$citta= $_POST["citta"];

set_time_limit(180);

 
$x=10;
$k=0;

	require_once('phpCache.php');
	$cache = new PhpCache(20,'cache/');
	$cache->start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="icon" href="img/walk1.png" type="image/png">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>WalktoWork</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />


      
    <style>
        #over img {
        margin-left: auto;
        margin-right: auto;
         display: block;
        }   
   </style>

</head>

<body onload="myFunction()">
<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>



<div class="text-center" id="loader" >
  <div id="preloader">
		<div class="preloader">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>

      <br>
      <br>
      <br>
      <h2> CARICAMENTO ANNUNCI IN CORSO </h2>

      <br>
      <br>
      <br>

      <img src="./img/walk1.png"  width="200" height="250">
		</div>
	</div>

</div>


</div>

	<!-- Header -->
	<header>

		<!-- Nav -->
		<nav id="nav" class="navbar">
			<div class="container">

				<div class="navbar-header">
					

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="index3.html#home">Home</a></li>
					<li><a href="index3.html#service">Servizi</a></li>
					<li><a href="index3.html#team">Team</a></li>
					<li><a href="index3.html#contact">Contatti</a></li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		 <!-- /Nav -->


     <div  id="over" class="header-wrapper sm-padding  bg-grey ">
					<img class="js-tilt" src="./img/walk1.png" width="300" height="350" alt="IMG" data-tilt>
				</div>
    <!-- /header wrapper -->
    

  
	</header>
	<!-- /Header -->

	<!-- Blog -->
	<div id="blog" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Main -->
				<main id="main" class="col-md-9">
					<div class="blog">
					
							<!-- blog comments -->
                            <div class="blog-comments">


                           <?php


while($x <= 30) {

	$cittaSpazi=str_replace(" ", "+", $citta);
	$cittaApostrofi=str_replace("'", "%27", $cittaSpazi);
	$lavoroPlus=str_replace(" ", "+", $lavoro);



 $urlCostruito='https://it.indeed.com/offerte-lavoro?q='.$lavoroPlus.'&l='.$cittaApostrofi.'&start='.$x ;
	
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
$hrefs7 = $xpath->evaluate("//span[@class='company']/a/@href");







//$href = $hrefs->item(4);
//$url = $href->nodeValue;
//echo($url)

for ($i=0;$i < $hrefs->length; $i++) {
    $k++;
    $href = $hrefs->item($i);
    $url = $href->nodeValue;
		
		$href2 = $hrefs2->item($i);

		if(empty($href2)){
 
			//non fare niente perchè la lista è vuota
	
			} else {
	
				//altrimenti prende il nodo
				$url2 = $href2->nodeValue;
	
			}

    $href3 = $hrefs3->item($i);
    $url3 = $href3->nodeValue;

    $href4 = $hrefs4->item($i);
    if(empty($href4)){
 
      //non fare niente perchè la lista è vuota
  
      } else {
  
        //altrimenti prende il nodo
       $url4 = $href4->nodeValue;
  
      }


    $href5 = $hrefs5->item($i);
    $url5 = $href5->nodeValue;

    $codice=tagliaCodice($url5);

    $codice2=$codice;

    $codice="pj_".$codice;

    $hrefs6 = $xpath->evaluate("//div[@id='$codice']/@data-empn");
    $href6 = $hrefs6->item(0);

    if(empty($href6)){
 
		//non fare niente perchè la lista è vuota
		$linkFinale='https://it.indeed.com/jobs?q&l='.$citta.'&start='.$x.'&vjk='.$codice2 ;


    } else {

      //altrimenti prende il nodo
		 $url6 = $href6->nodeValue;
		 $linkFinale='https://it.indeed.com/jobs?q&l='.$citta.'&start='.$x.'&advn='.$url6.'&vjk='.$codice2 ;

    }


		 $azienda=trim($url2);
		 $azienda2=str_replace(" ","-",$azienda);


		//href7 = $hrefs7->item($i);
		//$recensione = $href7->nodeValue;
		$url_recensione="https://it.indeed.com/cmp/".$azienda2."/reviews";		

		                                     
        echo "
        <div class=\"media\">
        <div class=\"media-left\">
        <img class=\"media-object\" src=\"./img/penna.png\" alt=\"\" width=\"40\" height=\"40\">
        </div>
            <div class=\"media-body\">";
            echo("<h4 class=\"media-heading\">$url2 
            <span class=\"time\">
            </span></h4>
            ");
    
    
           echo"
           <p>CITTA: $url4 </p>
           <p>DESCRIZIONE : $url3 </p>
           <a href=\" $linkFinale \"> <i class=\"fa fa-external-link\" style=\" font-size:23px; color:#1ac6ff\"></i> </a> 
           <a href=\"homeRecensioni.php?urlRecensione=$url_recensione&nomeAzienda=$azienda \">  <i class=\"fa fa-star-o\" style=\" font-size:23px; color:#1ac6ff\"></i> </a> 
           ";
           

           echo"</div>
           </div>
        ";

        //  <td> <img src=\"./img/unisa.png\"  border=3 height=100 width=100></img> </td>


          
}

$x=$x+10;

}  //FINE While con conseguente fine dello scrape degli annunci di indeed


//------ INCOMINCIO LO SCRAPE DI JOOBYDOO ---------------------------------------------------------

$numeropagina=1;

for ($numeropagina=1; $numeropagina <= 2; $numeropagina++){ 
$link = "https://www.jobbydoo.it/?j=$lavoro&l=$citta&p=$numeropagina&ref=p";


$html = file_get_contents($link);

   //parse the html into a DOMDocument
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    
    $hrefs = $xpath->evaluate("//div[@class='res-item-job']");
    $hrefs1 = $xpath->evaluate("//a[@class='res-link-job']/ @href");

    $hrefs2 = $xpath->evaluate("//div[@class='res-item-data res-item-top']");
    $hrefs3 = $xpath->evaluate("//div[@class='res-item-data res-item-desc']");
    
    for ($i=0;$i < $hrefs->length; $i++) {

			$k++;

        //TITOLO
        $href1 = $hrefs->item($i);
        $url = $href1->nodeValue;    


        //url della pagina 
        $href2 = $hrefs1->item($i);
        $url1 = $href2->nodeValue;    

        //$html2 = file_get_contents("$url1");
        //parse the html into a DOMDocument
     
       // $dom2 = new DOMDocument();
        //@$dom2->loadHTML($html2);
       // $xpath2 = new DOMXPath($dom2);


       // $bottone = $xpath2->evaluate("//input[@id='res-apply-button']/@data-href");


        //url dell'annuncio 
       // $href5 = $bottone->item(0);
       // $link = $href5->nodeValue; 
        


        //azienda        
        $href3 = $hrefs2->item($i);
        $url2 = $href3->nodeValue;    
       
        $azienda3=tagliaCodice2($url2);

        //descrizione
        $href4 = $hrefs3->item($i);
				$descrizione = $href4->nodeValue; 
				
				//Trasforma la prima lettera della citta in input da Minuscola a Maiuscola
				$cittaModificata=ucfirst($citta);


				$azienda4=trim($azienda3);
			    $azienda5=str_replace(" ","-",$azienda4);


				//href7 = $hrefs7->item($i);
				//$recensione = $href7->nodeValue;
		  	    $url_recensione="https://it.indeed.com/cmp/".$azienda5."/reviews";	
			
				

                echo "
                <div class=\"media\">
                <div class=\"media-left\">
                <img class=\"media-object\" src=\"./img/penna.png\" alt=\"\" width=\"40\" height=\"40\">
                </div>
                    <div class=\"media-body\">";
                    echo("<h4 class=\"media-heading\">$azienda3 
                    <span class=\"time\">
                    </span></h4>
                    ");
            
            
                   echo"
                   <p>CITTA: $cittaModificata </p>
                   <p> DESCRZIONE: $descrizione <p>
                   <a href=\" $url1 \"> <i class=\"fa fa-external-link\" style=\" font-size:23px; color:#1ac6ff\"></i> </a> 
                   <a href=\"homeRecensioni.php?urlRecensione=$url_recensione&nomeAzienda=$azienda4 \"> <i class=\"fa fa-star-o	\" style=\" font-size:23px; color:#1ac6ff\"></i> </a> 
                   ";
                   
            
                   echo"</div>
                    </div>
                 ";

    }
   

}





//-------- FINE SCRAPE JOBBYDOO



function tagliaCodice($stringa) {
    $bool=1;
    $appoggio="";
    for($i=0;$i<strlen($stringa);$i++){
      if($bool==0) $appoggio=$appoggio.$stringa[$i];
      if($stringa[$i]==="_") $bool=0;
  }
  return $appoggio;
	}
	
	

function tagliaCodice2($stringa) {
  $bool=0;
  $appoggio="";
  for($i=0;$i<strlen($stringa);$i++){
  if($stringa[$i]==="-") $bool=1;
  if($bool==0) $appoggio=$appoggio.$stringa[$i];
}
return $appoggio;
}
 
$cache->stop();
?>

      </tbody>
       </table>
       </div>



						</div>
						<!-- /blog comments -->

						
					</div>
				</main>
				<!-- /Main -->


				<!-- Aside -->
				<aside id="aside" class="col-md-3">
                        
		
					

				</aside>
				<!-- /Aside -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Blog -->
<!-- Footer -->
<footer id="footer" class="sm-padding bg-dark">

<!-- Container -->
<div class="container">
		<img class="img-responsive center-block" src="img/walk1.png" alt="logo" height="90" width="90">

	<!-- Row -->
	<div class="row">

		<div class="col-lg-12">

			
			<!-- footer copyright -->
			<div class="footer-copyright">
				<p>Copyright © 2019. All Rights Reserved. Designed by Alfonso Del Gaizo & Rosa Ferraioli</p>
			</div>
			<!-- /footer copyright -->

		</div>

	</div>
	<!-- /Row -->

</div>
<!-- /Container -->

</footer>
<!-- /Footer -->


	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->



	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  

  <script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

</body>

</html>
