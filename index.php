<?php 
session_start();
require_once('yhteydet/dbyhteys.php');
?>
<!DOCTYPE html>
<html ng-app="movieList">
  <head>
    <meta charset="UTF-8">
	<meta name="author" content="Eeva Haataja">
	<meta name="description" content="Elokuvien arvosteluun soveltuva lista">
    <title>Elokuva-arvostelut</title>
	<link rel="stylesheet" href="cleansheet.css" type="text/css">
	<link rel="stylesheet" href="stylesheet.css" type="text/css">
	<script src="angular.min.js" type="text/javascript"></script>
	<script src="app.js" type="text/javascript"></script>

  </head>
  <body>

	<header>
	<h1>Elokuva-arvostelut</h1>	
	</header> 
	<!-- Movie items -->
	<div class="row">
	<?php  
			$sql='SELECT * FROM wmovie;';  
			$STH = $DBH->query($sql);  
			$STH->setFetchMode(PDO::FETCH_ASSOC); while($row = $STH->fetch()) {  ?>
			
				<?php $movieid = $row['MOVIEID']; ?>
				
				<h2><?php echo  $row['NAME']; ?></h2>
                <h5>Ohjaaja: <?php echo  $row['DIRECTOR']; ?></h5>
                <h5>Julkaisu vuosi: <?php echo  $row['YEAR']; ?></h5>
				<h5>Genre: <?php echo  $row['GENRE']; ?></h5>
				<p>Kuvaus: <?php echo  $row['DESCRIPTION']; ?> </p>
			
				<!-- Reviews -->
				<button ng-click="showme<?php echo $movieid?>=true">Show</button>
				<button ng-click="showme<?php echo $movieid?>=false">Hide</button> 
			  
				<div class="wrapper">
					<div ng-show="showme<?php echo $movieid?>"><?php include 'review.php'; ?></div>
				</div>
				
				
	<?php }?> 
         

			<!--
			TODO: 
				- annan mahdollisuus antaa itse arvostelu
				- order in final version by rating
			-->
	</div>
		
			
  </body>
</html>