<?php

$valoreMediaPiemonte = query("Piemonte");

$valoreMediaLombardia = query("Lombardia");

$valoreMediaCampania = query("Campania");

$valoreMediaTrentino = query("Trentino-Alto Adige");

$valoreMediaVeneto = query("Veneto");

$valoreMediaFriuli = query("Friuli-Venezia Giulia");

$valoreMediaLiguria = query("Liguria");

$valoreMediaEmilia = query("Emilia-Romagna");

$valoreMediaToscana = query("Toscana");

$valoreMediaUmbria = query("Umbria");

$valoreMediaLazio = query("Lazio");

$valoreMediaMarche = query("Marche");

$valoreMediaAbruzzo = query("Abruzzo");

$valoreMediaMolise = query("Molise");

$valoreMediaPuglia = query("Puglia");

$valoreMediaBasilicata = query("Basilicata");

$valoreMediaCalabria = query("Calabria");

$valoreMediaSicilia = query("Sicilia");

$valoreMediaSardegna = query("Sardegna");


function query($regione) {
    $connessione = connessione();
    $sql = "SELECT SUM(percentualedisoccupazione) from datasetdisoccupazione where regione = '$regione'";
    $result = $connessione->query($sql);
    if ($result->num_rows >0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {  
        $somma = $row["SUM(percentualedisoccupazione)"];            
        $media = $somma/19;
       }
    } else {
        echo "0 results";
	}
	return $media;
	
	$connessione->close();
}

function connessione(){

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
    }

      return $connessione;
}


?> 

<!DOCTYPE html>
<html lang="en">

<head>
 <!--Load the AJAX API-->
 <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
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

                            
						<p> <h4>Media di disoccupazione dal 1995 al 2013 Regioni Italiane</h4></p> 
						<canvas id="myChart" width="1200" height="850"></canvas>
						<!-- inizio grafico -->
                                        <script>
    var myChart = new Chart(document.getElementById('myChart'), {
    type: 'bar',
    data: {
        labels: ['Piemonte', 'Lombardia', 'Trentino-Alto Adige', 'Veneto', 'Friuli Venezia Giulia', 'Liguria', 
        'Emilia-Romagna' , 'Toscana' , 'Umbria', 'Lazio', 'Marche' , 'Abruzzo', 'Molise', 'Campania', 'Puglia',
        'Basilicata', 'Calabria', 'Sicilia', 'Sardegna'],
        datasets: [{
            label: 'Percentuale',
            data: [<?php echo $valoreMediaPiemonte ?>, <?php echo $valoreMediaLombardia ?>, <?php echo $valoreMediaTrentino ?>, 
            <?php echo $valoreMediaVeneto?>, <?php echo $valoreMediaFriuli?> , <?php echo $valoreMediaLiguria?>, 
            <?php echo $valoreMediaEmilia?>, <?php echo $valoreMediaToscana?>,  <?php echo $valoreMediaUmbria ?>, <?php echo $valoreMediaLazio ?>, 
            <?php echo $valoreMediaMarche?>,  <?php echo $valoreMediaAbruzzo?> , <?php echo $valoreMediaMolise?> , <?php echo $valoreMediaCampania?>,
            <?php echo $valoreMediaPuglia?>,<?php echo $valoreMediaBasilicata?>, <?php echo $valoreMediaCalabria?>, <?php echo $valoreMediaSicilia ?>,
            <?php echo $valoreMediaSardegna?>, 0, 65],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255,87,106,0.2)',
                'rgba(19,15,255,0.2)',
                'rgba(0,255,157,0.2)',
                'rgba(255,28,28,0.2)',
                'rgba(215, 44, 238, 0.5)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(13,255,57,0.2)',
                'rgba(255,48,48,0.5)',
                'rgba(69,91,255,0.5)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255,162,31,0.5)',
                'rgba(153, 102, 255, 0.2)'

            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,87,106,1)',
                'rgba(0,255,157,1)',
                'rgba(255,28,28,0.2)',
                'rgba(215, 44, 238, 0.2)',
                'rgba(215, 44, 238, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(13,255,57,1)',
                'rgba(255,48,48, 1)',
                'rgba(69,91,255,1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255,162,31,1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
		

    }
});
</script>

	
</table>

						</div>
						<!-- /blog comments -->

					</div>
				</main>
				<!-- /Main -->

			
	

		

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