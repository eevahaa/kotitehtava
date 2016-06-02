<?php 
/*
Handles the search and gets the reviews from wanted author.
If there are no reviews for searched name it will give out 'No results'
*/
if (isset($_POST['Submit'])){

	$search = $_POST['authorsearch'];
	
	$sqlauthor='SELECT * FROM wreview WHERE wreview.AUTHOR ="' . $search . '";';  
	$STHA = $DBH->query($sqlauthor);  
	$STHA->setFetchMode(PDO::FETCH_ASSOC); 
	if($STHA->rowCount() > 0) {
		while($reviews = $STHA->fetch()) {  
		
			$movieid = $reviews['MOVIE'];
			$date = strtotime($reviews['DAY']);	
				
			$sqlmovie='SELECT * FROM wmovie WHERE wmovie.MOVIEID = ' . $movieid . ';';  
			$STHM = $DBH->query($sqlmovie);  
			$STHM->setFetchMode(PDO::FETCH_ASSOC); while($movie = $STHM->fetch()) {  ?>
				
				<div class="reviewBox">
					<h4><?php echo  $movie['NAME']; ?></h4>
				<?php } ?>
					
					<p>Arvosana: <?php echo  $reviews['STARS']; ?></h5>	
					<p><?php echo  $reviews['COMMENT']; ?></p>
					<p> - <?php echo  $reviews['AUTHOR']; ?>,  kirjoitettu: <?php echo  date('d.m.Y',$date); ?>  </p> 
				</div>
	<?php	 }
	}else{ ?>
			<h4>Ei tuloksia</h4>
	<?php }

	}?> 

	 