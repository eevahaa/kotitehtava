<!--Form for giving reviews-->
<form name="reviewForm" action="index.php" method="post" class="section-container-class" >
		<input type="hidden" name="movieid" id="hiddenField" value="<?php echo $movieid ?>" />
		Arvosana: <select name="stars" required >
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select> 
	<br/>
		Nimi: <input type="text" name="name" required>
	<br/>
		Arvostelu: <textarea name="review" rows="6" cols="50"ng-model="commentcount" ng-trim="false" maxlength="250" required></textarea>
		<span>{{250 - commentcount.length}} merkkiä jäljellä</span>
	<br/>					 
		<input name="Submit" type="submit" value="Lähetä arvostelu" ng-disabled="reviewForm.$invalid" class="button ">
	 
</form> 
	<?php include ("sqlfuncs/reviewsubmit.php");?>