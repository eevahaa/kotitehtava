<div class="rew">
	
	<?php  
		$sql2='SELECT * FROM wreview WHERE wreview.MOVIE=' . $movieid . ' ;';  
		$STH2 = $DBH->query($sql2);  
		$STH2->setFetchMode(PDO::FETCH_ASSOC); while($rew = $STH2->fetch()) {  ?> 
		
		<!--TODO; jos tyhjää ei näytetä-->
				<h4>Kommentit</h4>
								<p><?php echo  $rew['STARS']; ?></h5>	
								<p><?php echo  $rew['COMMENT']; ?></p>
								<p> - <?php echo  $rew['AUTHOR']; ?>,  kirjoitettu: <?php echo  $rew['DAY']; ?> </p> 
			
	<?php }?> 
 </div>