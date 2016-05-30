<?php 
session_start();
require_once('yhteydet/dbyhteys.php');
?>
<!DOCTYPE html>
<html ng-app="movieList">
  <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="author" content="Eeva Haataja">
	<meta name="description" content="Elokuvien arvosteluun soveltuva lista">
    <title>Elokuva-arvostelut</title>
	<link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
	<!--<link rel="stylesheet" href="cleansheet.css" type="text/css">
	<link rel="stylesheet" href="stylesheet.css" type="text/css"> -->
	<script src="angular.min.js" type="text/javascript"></script>
	<script src="app.js" type="text/javascript"></script>

  </head>
  <body>
  
<!--
			TODO: 
				- hoida tähditys kuntoon (wmovie tauluun tähdet ja kommentit muokataan)
				- tarkista muuttujien nimet yhtenäisiksi
				- tee hakusivu jossa voi hakea kommentoijaa
				- muuta salasanaa mysqlään
				- order in final version by rating
-->
  
  
  
	<header>
	<h1>Elokuva-arvostelut</h1>	
	</header> 
	<div class="top-bar">
		<div class="top-bar-left">
			<ul class="menu">
				<li class="menu-text">Elokuva-arvostelut</li>
				<li><a href="#">Etsi kommentteja</a></li>
				
			</ul>
		</div>
	</div>
	<div class="callout large primary">
		<div class="row column text-center">
			<h1>Elokuva-arvostelut</h1>
			<h2 class="subheader">Eevan suosikit, jätä kommentti.</h2>
		</div>
	</div>
	<!-- Movie items -->
	<div class="row medium-8 large-7 columns">
<div class="blog-post">
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
				<h4>Kuvaus</h4>
				<p> <?php echo  $row['DESCRIPTION']; ?> </p>
			
				<!-- Reviews -->
				<form name="comment" action="reviewsubmit.php" method="post" class="section-container-class" >
				<input type="hidden" name="movieid" id="hiddenField" value="<?php echo $movieid ?>" />
				Tähdet: <select name="stars">
				  <option value="1">1</option>
				  <option value="2">2</option>
				  <option value="3">3</option>
				  <option value="4">4</option>
				  <option value="5">5</option>
				</select> 
				<br/>
					Nimi: <input type="text" name="name">
				<br/>
					Kommentti: <textarea name="review" rows="6" cols="50"></textarea>
				</br>					 
				<input name="Submit" type="submit" value="Lähetä kommentti" class="button [tiny small large]">
				 </form> 
				<button ng-click="showme<?php echo $movieid?>=true">Näytä kommentit</button>
		
				<div class="wrapper">
				
					<div ng-show="showme<?php echo $movieid?>"><?php include 'review.php'; ?>
					<button ng-click="showme<?php echo $movieid?>=false">Piilota kommentit</button> 
					</div>
				</div>
				<hr>
				
	<?php }?> 
         

			
	</div>
		</div>
		</div>
			
  </body>
</html>