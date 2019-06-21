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
          <li><a href="occupazione.php"><i class="fa fa-line-chart" style="font-size:20px"></i></a></li>
					<li><a href="disoccupazione.php"><i class="fa fa-sort-amount-desc" style="font-size:20px"></i></a></li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
        <!-- /Nav -->
        
        <?php
        
            $recensione=$_REQUEST['urlRecensione'];
            $azienda=$_REQUEST['nomeAzienda'];

            $html = file_get_contents("$recensione");
            
            //parse the html into a DOMDocument
            $dom = new DOMDocument();
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);
        

            $hrefs3 = $xpath->evaluate("//div[@id='cmp-header-logo']/img/@src");
            $href3 = $hrefs3->item(0);

            if(empty($href3->nodeValue)){

  
                echo "  
                    
                <div  id=\"over\" class=\"header-wrapper sm-padding bg-grey\">

                <img src=\"./img/walk1.png\" width=\"190\" height=\"220\">
                    
                </div>     
                
                ";         
              
                } else {
                
                $url3=$href3->nodeValue;
                
                 echo "  
                    
                    <div  id=\"over\" class=\"header-wrapper sm-padding bg-grey\">

                    <img src=\"$url3\" width=\"190\" height=\"190\">
                        
                    </div>
          
                      ";

              
                }

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
							<h3 class="title">RECENSIONI</h3>

                            
                         <?php
                           //SCRAPING RECENSIONI INDEED 

                            $hrefs = $xpath->evaluate("//div[@class='cmp-review-title']/span [1]");
                            $hrefs2 = $xpath->evaluate("//span[@class='cmp-review-text']");

                            $hrefs5 = $xpath->evaluate("//div[@class='cmp-ratingNumber']");


                          

                            for ($i=0;$i < $hrefs->length; $i++) {


                                    $href = $hrefs->item($i);
                                    $url = $href->nodeValue;

                                    $href2 = $hrefs2->item($i);
                                    $url2 = $href2->nodeValue;

                                    $href5 = $hrefs5->item($i);
                                    $url5 = $href5->nodeValue;

                                    echo "
                                    <div class=\"media\">
                                    <div class=\"media-left\">
                                   <img class=\"media-object\" src=\"./img/user2.png\" alt=\"\" width=\"70\" height=\"70\">";
                                      
                                    echo "</div>
                                        <div class=\"media-body\">";
                                        
                                        
                                      //echo "<h4 class=\"media-heading\">$url <span class=\"time\">2 min ago</span></h4>";
                           
                                      if($url5==1){
                                        echo("<h4 class=\"media-heading\">$url <span class=\"time\">
                                         <span class=\"fa fa-star checked\"></span>
                                         <span class=\"fa fa-star\"></span>
                                         <span class=\"fa fa-star\"></span>
                                         <span class=\"fa fa-star\"></span>
                                         <span class=\"fa fa-star\"></span>
                                         </span></h4>
                                         ");
                                       }
                                     if($url5==2){
                                        echo("<h4 class=\"media-heading\">$url <span class=\"time\">
                                         <span class=\"fa fa-star checked\"></span>
                                         <span class=\"fa fa-star checked\"></span>
                                         <span class=\"fa fa-star\"></span>
                                         <span class=\"fa fa-star\"></span>
                                         <span class=\"fa fa-star\"></span>
                                         </span></h4>
                                         ");
                                       }
                                     if($url5==3){
                                        echo("<h4 class=\"media-heading\">$url <span class=\"time\">
                                         <span class=\"fa fa-star checked\"></span>
                                         <span class=\"fa fa-star checked\"></span>
                                         <span class=\"fa fa-star checked\"></span>
                                         <span class=\"fa fa-star\"></span>
                                         <span class=\"fa fa-star\"></span>
                                         </span></h4>
                                         ");
                                       }
                                       if($url5==4){
                                        echo("<h4 class=\"media-heading\">$url <span class=\"time\">
                                         <span class=\"fa fa-star checked\"></span>
                                         <span class=\"fa fa-star checked\"></span>
                                         <span class=\"fa fa-star checked\"></span>
                                         <span class=\"fa fa-star checked\"></span>
                                         <span class=\"fa fa-star\"></span>
                                         </span></h4>
                                         ");
                                       }
                                      if($url5==5){
                                       echo("<h4 class=\"media-heading\">$url <span class=\"time\">
                                        <span class=\"fa fa-star checked\"></span>
                                        <span class=\"fa fa-star checked\"></span>
                                        <span class=\"fa fa-star checked\"></span>
                                        <span class=\"fa fa-star checked\"></span>
                                        <span class=\"fa fa-star checked\"></span>
                                        </span></h4>
                                        ");
                                      }
  
                                        
                                    echo"<p>$url2</p>
							    	  </div>
							        </div>
                                    ";

                                    } //FINE for

                            

                            ?>

                            <?php
                            // SCRAPE RECENSIONI TRUSTPILOT
                            $parolaAzienda=tagliaCodice("$azienda");


                            $html = file_get_contents("https://it.trustpilot.com/search?query=$parolaAzienda");

                            $linkQuery=" ";

                                //parse the html into a DOMDocument
                                $dom = new DOMDocument();
                                @$dom->loadHTML($html);
                                $xpath = new DOMXPath($dom);
                                $hrefs = $xpath->evaluate("//a[@class='search-result-heading']/@href");


                                for ($i=0;$i < $hrefs->length; $i++) {

                                $href = $hrefs->item($i);
                                $url = $href->nodeValue;

                                if (strpos($url, '.it') !== false) {
                                    $linkQuery="https://it.trustpilot.com".$url;
                                }

                                }

                               
                               if($linkQuery==" "){

                              
                                } else  //inizio else se abbiamo trovato un link con estensione .it
                              
                               {

                                $html2 = file_get_contents("$linkQuery");

                                //parse the html into a DOMDocument
                                $dom2 = new DOMDocument();
                                @$dom2->loadHTML($html2);
                                $xpath2 = new DOMXPath($dom2);

                                $hrefs2 = $xpath2->evaluate("//h2[@class='review-content__title']/a");

                                $hrefs3 = $xpath2->evaluate("//p[@class='review-content__text']");

                                $hrefs7 = $xpath2->evaluate("//div[@class='review-content-header']/div[1]/@class");



                                for ($i=0;$i < $hrefs2->length; $i++) {

                                        $href2 = $hrefs2->item($i);
                                        $titolo = $href2->nodeValue;

                                        $href3 = $hrefs3->item($i);
                                        $descrizione = $href3->nodeValue;

                                        $href7= $hrefs7->item($i);
                                        $stelle = $href7->nodeValue;

                                        
                                                                                
                                        echo "
                                        <div class=\"media\">
                                        <div class=\"media-left\">
                                        <img class=\"media-object\" src=\"./img/user.png\" alt=\"\" width=\"70\" height=\"70\">
                                          </div>
                                            <div class=\"media-body\">";

                                            if (strpos($stelle, 'star-rating-1') !== false) {
                                                echo("<h4 class=\"media-heading\">$titolo <span class=\"time\">
                                                <span class=\"fa fa-star checked\"></span>
                                                <span class=\"fa fa-star\"></span>
                                                <span class=\"fa fa-star\"></span>
                                                <span class=\"fa fa-star\"></span>
                                                <span class=\"fa fa-star\"></span>
                                                </span></h4>
                                                ");
                                                }

                                            if (strpos($stelle, 'star-rating-2') !== false) {
                                                echo("<h4 class=\"media-heading\">$titolo <span class=\"time\">
                                                <span class=\"fa fa-star checked\"></span>
                                                <span class=\"fa fa-star checked\"></span>
                                                <span class=\"fa fa-star\"></span>
                                                <span class=\"fa fa-star\"></span>
                                                <span class=\"fa fa-star\"></span>
                                                </span></h4>
                                                ");
                                                }

                                            if (strpos($stelle, 'star-rating-3') !== false) {
                                                echo("<h4 class=\"media-heading\">$titolo <span class=\"time\">
                                                <span class=\"fa fa-star checked\"></span>
                                                <span class=\"fa fa-star checked\"></span>
                                                <span class=\"fa fa-star checked\"></span>
                                                <span class=\"fa fa-star\"></span>
                                                <span class=\"fa fa-star\"></span>
                                                </span></h4>
                                                ");
                                                }
                                        
                                            if (strpos($stelle, 'star-rating-4') !== false) {
                                                echo("<h4 class=\"media-heading\">$titolo <span class=\"time\">
                                                <span class=\"fa fa-star checked\"></span>
                                                <span class=\"fa fa-star checked\"></span>
                                                <span class=\"fa fa-star checked\"></span>
                                                <span class=\"fa fa-star checked\"></span>
                                                <span class=\"fa fa-star\"></span>
                                                </span></h4>
                                                ");
                                                }
                                        
                                        
                                            if (strpos($stelle, 'star-rating-5') !== false) {
                                            echo("<h4 class=\"media-heading\">$titolo <span class=\"time\">
                                            <span class=\"fa fa-star checked\"></span>
                                            <span class=\"fa fa-star checked\"></span>
                                            <span class=\"fa fa-star checked\"></span>
                                            <span class=\"fa fa-star checked\"></span>
                                            <span class=\"fa fa-star checked\"></span>
                                            </span></h4>
                                            ");
                                            }

                                           
                                         echo"<p>$descrizione</p>
                                         </div>
                                         </div>
                                        ";

                                        }

                                    } //fine else $linkQuery

                            function tagliaCodice($stringa) {
                                $bool=0;
                                $appoggio="";
                                for($i=0;$i<strlen($stringa);$i++){
                                if($bool==0) $appoggio=$appoggio.$stringa[$i];
                                if($stringa[$i]===" ") $bool=1;
                            }
                            return $appoggio;
                            }

                         //FINE SCRAPE E VISUALIZZAZIONE RECENSIONI TRUSTPILOT   
                            
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