<!-- Loads reviews for exact movie from the database-->

<div class="reviews">
	
	<?php  
		$sqlReviews='SELECT * FROM wreview WHERE wreview.MOVIE=' . $movieid . ' ;';  
		$STHR = $DBH->query($sqlReviews);  
		$STHR->setFetchMode(PDO::FETCH_ASSOC); 
		if($STHR->rowCount() > 0) {
			while($rew = $STHR->fetch()) {  
			$date = strtotime($rew['DAY']);	?> 
	
			<div class="reviewBox">
				<p>Arvosana: <?php echo  $rew['STARS']; ?></h5>	
				<p><?php echo $rew['COMMENT']; ?></p>
				<p> - <?php echo  $rew['AUTHOR']; ?>,  
				kirjoitettu: <?php echo  date('d.m.Y',$date); ?> </p> 
			</div>			
				
		<?php }
	
		}else{?>
			<div class="reviewBox">
				<p>Ei arvosteluja</p>
			</div>	
	<?php }	
		?> 
 </div>