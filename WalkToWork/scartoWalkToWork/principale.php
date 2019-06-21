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

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
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
					<li><a href="index.html#home">Home</a></li>
					<li><a href="index.html#about">About</a></li>
					<li><a href="index.html#portfolio">Portfolio</a></li>
					<li><a href="index.html#service">Services</a></li>
					<li><a href="index.html#pricing">Prices</a></li>
					<li><a href="index.html#team">Team</a></li>
					<li class="has-dropdown"><a>Blog</a>
						<ul class="dropdown">
							<li><a href="#">blog post</a></li>
						</ul>
					</li>
					<li><a href="index.html#contact">Contact</a></li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- header wrapper -->
		<div class="header-wrapper sm-padding bg-grey">
			<div class="container">
				<h2>Blog Page</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item"><a href="index.html#blog">Blog</a></li>
					<li class="breadcrumb-item active">Single Post</li>
				</ul>
			</div>
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
							<h3 class="title">RISULTATI RICERCA :      "<?= $lavoro?>"                  "<?= $citta?>"    </h3>
                            
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

 $urlCostruito='https://it.indeed.com/offerte-lavoro?q='.$lavoro.'&l='.$citta.'&start='.$x ;
	
$html = file_get_contents($urlCostruito);

//parse the html into a DOMDocument
$dom = new DOMDocument();
@$dom->loadHTML($html);
$xpath = new DOMXPath($dom);
//$hrefs = $xpath->evaluate("//div[@class='title']");
//$hrefs2 = $xpath->evaluate("//span[@class='company']");
//$hrefs3 = $xpath->evaluate("//div[@class='summary']");
//$hrefs4 = $xpath->evaluate("//span[@class='location']");
//$hrefs5 = $xpath->evaluate("//div[@class='title']//a/@href");
//$hrefs5 = $xpath->evaluate("//div[@style='display: none']/@id");
//$hrefs7 = $xpath->evaluate("//span[@class='company']/a/@href");




//$href = $hrefs->item(4);
//$url = $href->nodeValue;
//echo($url)

for ($i=0;$i < $hrefs->length; $i++) {
    $k++;

    //TITOLO ANNUNCIO
    //$hrefs = $xpath->evaluate("//div[@class='title'][$i]");
   // $href = $hrefs->item(0);
  //  $url = $href->nodeValue;

   //COMPAGNIA
    $hrefs2 = $xpath->evaluate("(//span[@class='company'])[$i]");
    $href2 = $hrefs2->item(0);
	if(empty($href2)){
       //non fare niente perchè la lista è vuota
	} else {
	   //altrimenti prende il nodo
	   $url2 = $href2->nodeValue;
              }

    //LOCATION
    $hrefs4 = $xpath->evaluate("//span[@class='location'][$i]");
    $href4 = $hrefs4->item(0);
    if(empty($href4)){
      //non fare niente perchè la lista è vuota
      } else {
        //altrimenti prende il nodo
       $url4 = $href4->nodeValue;
  
      }
              
    //DESCRIZIONE ANNUNCIO
    $hrefs3 = $xpath->evaluate("//div[@class='summary'][$i]");
    $href3 = $hrefs3->item(0);
    $url3 = $href3->nodeValue;
    
    

    $hrefs5 = $xpath->evaluate("//div[@style='display: none']/@id");
    $href5 = $hrefs5->item(0);
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

		//href7 = $hrefs7->item($i);
		//$recensione = $href7->nodeValue;
	//	$url_recensione="https://it.indeed.com".$recensione;
		

		echo  "      
          <tr>
          <th scope=\"row\">$k</th>
          <td><h4>$url2</h4></td>
          <td><h4>$url4</h4></td>
          <td><h3>$url3</h3></td>
          <td> <a href=\" $linkFinale \"> <i class=\"fa fa-external-link\" style=\" font-size:23px; color:#1ac6ff\"></i> </a> </td>
          <td> <i class=\"fa fa-star-o	\" style=\" font-size:23px; color:#1ac6ff\"></i>  </td>
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



						</div>
						<!-- /blog comments -->

						
					</div>
				</main>
				<!-- /Main -->


				<!-- Aside -->
				<aside id="aside" class="col-md-3">

					<!-- Search -->
					<div class="widget">
						<div class="widget-search">
							<input class="search-input" type="text" placeholder="search">
							<button class="search-btn" type="button"><i class="fa fa-search"></i></button>
						</div>
					</div>
					<!-- /Search -->

					<!-- Category -->
					<div class="widget">
						<h3 class="title">Category</h3>
						<div class="widget-category">
							<a href="#">Web Design<span>(7)</span></a>
							<a href="#">Marketing<span>(142)</span></a>
							<a href="#">Web Development<span>(74)</span></a>
							<a href="#">Branding<span>(60)</span></a>
							<a href="#">Photography<span>(5)</span></a>
						</div>
					</div>
					<!-- /Category -->


					

					

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

</body>

</html>
