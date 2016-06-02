<?php 
//Fetches movies from database in name order

	$sql='SELECT * FROM wmovie ORDER BY name ASC;';  
			$STH = $DBH->query($sql);  
			$STH->setFetchMode(PDO::FETCH_ASSOC); 
			while($row = $STH->fetch()) {  
				$movies[] = $row;
			}	
	$movieCount=count($movies);
	
?>		