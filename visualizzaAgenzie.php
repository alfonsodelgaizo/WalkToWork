<?php

//$codiceIstituto= $_GET["codiceIstituto"];
//echo $codiceIstituto;

//$json_url = "http://localhost:8502/valutazioni?codiceIstituto=$codiceIstituto";
//$json = file_get_contents($json_url);
//$decoded = json_decode($json, TRUE);

//$cnt=count($decoded['result']);
//echo $cnt;

//for($i=0;$i<$cnt;$i++){

//echo "<pre>";
//echo $decoded['result'][$i]["motivazionePunteggioScuola"]."<br/>";
//echo $decoded['result'][$i]["punteggioScuola"]."<br/>";
//echo $decoded['result'][$i]["codiceCriterio"]."<br/>";
//echo $decoded['result'][$i]["codiceIstituto"]."<br/>";


//echo "</pre>";
//}
//?>


<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="img/walk1.png" type="image/png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  

	<title>infoSchool</title>

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
    
      
    <style>
        #over img {
        margin-left: auto;
        margin-right: auto;
         display: block;
        }
        
        .checked {
			  color: orange;
			}

            .suff {
			  color: #9ACD32;
			}

            .bad {
			  color: #DC143C;
			}
            
   </style>

</head>
<body>

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
       <div  id="over" class="header-wrapper sm-padding bg-grey">
       <img src="./img/walk1.png" width="300" height="350">	
       </div>  
        
        <?php
        
       $prov= $_POST["provincia"];
     //   $nomeIstituto= $_GET["nomeIstituto"];
    
            //echo "<img src=\"$url3\">";

        ?>

	
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
                            // SCRAPE RECENSIONI TRUSTPILOT
                           
                               

$json_url = "http://localhost:8500/sendAgenzie?provincia=$prov";
$json = file_get_contents($json_url);
$decoded = json_decode($json, TRUE);

$cnt=count($decoded['result']);

echo"<h3 class=\"title\"> RISULTATI ($cnt)</h3>";


for($i=0;$i<$cnt;$i++){
    $nomeAgenzia= $decoded['result'][$i]["nomeAgenzia"];
    $comune= $decoded['result'][$i]["comune"];
    $indirizzo = $decoded['result'][$i]["indirizzo"];
    $telefono= $decoded['result'][$i]["telefono"];
    $fax= $decoded['result'][$i]["fax"];
    $tipoEnte= $decoded['result'][$i]["tipoEnte"];


                                         
    echo "
    <div class=\"media\">
    <div class=\"media-left\">
    <img class=\"media-object\" src=\"./img/penna.png\" alt=\"\" width=\"40\" height=\"40\">
    </div>
        <div class=\"media-body\">";
        echo("<h4 class=\"media-heading\">$nomeAgenzia 
        <span class=\"time\">
        </span></h4>
        ");


       echo"
       <p>COMUNE : $comune - $indirizzo </p>
       <p>TELEFONO :  $telefono  - FAX : $fax</p>
       <p style=\"color: #3399FF;\"> TIPO ENTE : $tipoEnte </p>
       ";
       

       echo"</div>
        </div>
     ";



//echo "<pre>";
//echo $decoded['result'][$i]["denominazioneIstituto"]."<br/>";
//echo "</pre>";
}
                        
                                        

                            
                         ?>

			

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
					
						</div>
					</div>
					<!-- /Search -->

					<!-- Category -->
                    <div class="widget">
						<h3 class="title">SERVIZI ONLINE UTILI</h3>
						<div class="widget-category">
                            <a href="https://www.booking.com/index.it.html">Hotel<span class="fa fa-bed"></span></a>
                            <a href="https://www.tripadvisor.it/">Ristoranti<span class="fa fa-cutlery"></span></a>
							<a href="https://www.trenitalia.com/">Treni<span class="fa fa-train"></span></a>
							<a href="https://www.google.com/maps">Mappe<span class="fa fa-globe"></span></a>
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

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->




	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

    </body>

    </html>