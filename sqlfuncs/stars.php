<?php
//counts the rating of the movie based on reviews	
		$stars = 0;
		$reviews = 0;
		
		$sqlStar='SELECT * FROM wreview WHERE wreview.MOVIE=' . $movieid . ' ;';  
		$STHS = $DBH->query($sqlStar);  
		$STHS->setFetchMode(PDO::FETCH_ASSOC); 
		if($STHS->rowCount() > 0) {
			while($star = $STHS->fetch()) { 
				$stars = $stars + $star['STARS'];
				$reviews++;
			}
		
			$average= $stars / $reviews;
			$result = number_format((float)$average, 1, '.', ' '); 
			
		} else {
			$result = 0; //if no reviews
		}
		
?> 
		
		
			