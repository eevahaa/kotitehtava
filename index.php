<?php 
include_once('head.php');
?>

  <body>

	<header>
	<h1>Elokuva-arvostelut</h1>	
	</header> 
	
	<div class="top-bar">
		<div class="top-bar-left">
			<ul class="menu">
				<li><a href="index.php">Elokuvat</a></li>
				<li><a href="search.php">Etsi kommentteja</a></li>
				
			</ul>
		</div>
	</div>
	
	<!-- Movie items -->
	<div class="row medium-8 large-7 columns">
		<div class="movieItems">
		<?php 
			include'sqlfuncs/movies.php';
				
				for($i = 0; $i < $movieCount; $i++){ 
				
					$movieid = $movies[$i][MOVIEID];?>		
					
					<h2><?php print_r ($movies[$i][NAME]); ?></h2>
					<h5>Ohjaaja: <?php print_r ($movies[$i][DIRECTOR]); ?></h5>
					<h5>Julkaisu vuosi: <?php print_r ($movies[$i][YEAR]); ?></h5>
					<h5>Genre: <?php print_r ($movies[$i][GENRE]); ?></h5>
					
					<?php include 'sqlfuncs/stars.php'; 	?><!-- counting stars -->
					<h5>Arvosana: <?php echo $result ;?> / 5 </h5>
					
					<div class="descriptionBox">
						<h4>Kuvaus</h4>
						<p> <?php print_r ($movies[$i][DESCRIPTION]);?> </p>
					</div>
					
				<!-- Reviews -->
				<button class="button" ng-click="reviews<?php echo $movieid?>=true">Näytä arvostelut ( <?php echo $reviews ; ?> )</button>
				<div class="wrapper">
					<div ng-show="reviews<?php echo $movieid?>">
						<h4>Arvostelut</h4>
						
							<?php include 'sqlfuncs/reviews.php'; ?>
						
						<button class="button secondary" ng-click="reviews<?php echo $movieid?>=false">Piilota arvostelut</button> 
					</div>
				</div>
				
				<!-- Review form -->
				<button class="button" ng-click="showform<?php echo $movieid?>=true">Arvostele itse!</button>
				<div ng-show="showform<?php echo $movieid?>"> 
					<?php include'reviewform.php'; ?>
					<button class="button secondary" ng-click="showform<?php echo $movieid?>=false">Peruuta</button>
				 </div> 
				<hr>
			<?php
				} //movieitems' for loop ends ?>	
	
		</div>
	
	</div>
			
  </body>
</html>