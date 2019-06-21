<?php

$lavoro= $_POST["lavoro"];
$citta= $_POST["citta"];


 
$x=10;
$k=0;

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="img/walk1.png" type="image/png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>WalkToWalk</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<style>
body {margin:0;}

.nav-prova {

  position: fixed;
  top: 0;
  width: 100%;
}

</style>




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


<div class="nav-prova">

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">

<div class="navbar-header">

<!-- Collapse nav button -->
<div class="nav-collapse">
	<span></span>
</div>
<!-- /Collapse nav button -->
</div>


    <ul class="navbar-nav mr-auto">
	
		<li class="nav-item active">
		<a class="navbar-brand" href="#">
    <img src="./img/walk1.png" width="40" height="40" alt="">
	    </a>
			</li>

      <li class="nav-item active">
        <a class="nav-link" href="./index2.html">Home <span class="sr-only">(current)</span></a>
			</li>
			
      <li class="nav-item">
        <a class="nav-link" href="#">  </a>
      </li>

      <li class="nav-item">
        <a class="nav-link disabled" href="#">Bandi</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Cosa Cerchi?" aria-label="Search">
			<input class="form-control mr-sm-2" type="search" placeholder="Luogo" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
	</div>
	
</nav>

</div>

<br>
<br>
<br>






<div style="display:none;" id="myDiv">
<table class="table table-striped table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><h3 style="color:white;">#</h3></th>
      <th scope="col"><h3 style="color:white;">Azienda</h3></th>
      <th scope="col"><h3 style="color:white;">Luogo</h3></th>
      <th scope="col"><h3 style="color:white;">Descrizione</h3></th>
      <th scope="col"><h3 style="color:white;">Link</h3></th>

    </tr>
  </thead>
  <tbody>

<?php


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

    } else {

      //altrimenti prende il nodo
     $url6 = $href6->nodeValue;

    }

    $linkFinale='https://it.indeed.com/jobs?q&l='.$citta.'&start='.$x.'&advn='.$url6.'&vjk='.$codice2 ;


    echo  "      
          <tr>
          <th scope=\"row\">$k</th>
          <td><h5>$url2</h5></td>
          <td><h5>$url4</h5></td>
          <td><h5>$url3</h5></td>
          <td> <a href=\" $linkFinale \"> <i class=\"fa fa-external-link\" style=\" font-size:23px; color:#1ac6ff\"></i> </a> </td>

          </tr>
    
          ";


        //  <td> <img src=\"./img/unisa.png\"  border=3 height=100 width=100></img> </td>


          
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
  return $appoggio;
  }
 
 
?>

      </tbody>
       </table>
       </div>


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
						<p style="color:white;"> Copyright © 2019. All Rights Reserved. Designed by Alfonso Del Gaizo & Rosa Ferraioli</p>
					</div>
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
  <!-- /Footer -->
  
  <!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  
</body>
</html>
