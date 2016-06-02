<?php 
/*Handles the submitted form and inserts it to the database*/
if (isset($_POST['Submit'])){
 
	$test = array (
	stars=>$_POST['stars'],
	review=>$_POST['review'],
	name=>$_POST['name'],
	);
	
	foreach ($test as $arvo) {
		if (empty($arvo)){ 
			die("Muista täyttää kaikki tarvittavat tiedot! <br>");
		}
		}
		
	$movieid = $_POST['movieid'];
	$stars = $_POST['stars'];
	$review = $_POST['review'];
	$name = $_POST['name'];
	$date = date('Y-m-d');

	//prepare database
	$servername='mysql.metropolia.fi'; 
	$username='eevaih';
	$dbname='eevaih';
	$password='q4mXWrzG7fXR4VH21E3s';
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sqlInsert =  "INSERT INTO wreview VALUES ( '". $movieid . "', '". $name . "','". $review . "', '". $stars . "', '" . $date . "')";
		$conn->exec($sqlInsert);
		
		echo "Arvostelu on tallennettu!";
		header("location:index.php"); //reload index so the inserted review shows
		}
	catch(PDOException $e)
		{
		//echo $sql . "<br>" . $e->getMessage();
		}

	$conn = null;

} else {  
		//nothing
} 

?>