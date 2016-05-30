<?php 
if (isset($_POST['Submit']))
{

$testi = array (
stars=>$_POST['stars'],
review=>$_POST['review'],
name=>$_POST['name'],
);
foreach ($testi as $arvo) //taulukku läpi
{
if (empty($arvo)) //jos kaikkia kohtia ei täytetä
{ //paluu
die("Muista täyttää kaikki tarvittavat tiedot! <br>");
}
}

$movieid = $_POST['movieid'];
$stars = $_POST['stars'];
$review = $_POST['review'];
$name = $_POST['name'];
$date = date('Y-m-d');


$servername='mysql.metropolia.fi'; //voi myös laittaa 'localhost'
$username='eevaih';
$dbname='eevaih';
$password='852Asd';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql3 =  "INSERT INTO wreview VALUES ( '". $movieid . "', '". $name . "','". $review . "', '". $stars . "', '" . $date . "')";
	$conn->exec($sql3);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

$to = "eeva.haataja@metropolia.fi"; 
$from = "nettisivut"; 
$subject = "Yhteydenotto nettisivujen kautta."; 
//mitÃ¤ tulee meiliin
$message = "Yhteydenotto nettisivuilta: " . "\n\n".
	   "Nimi: " . $name . "\n".
	   "movie: " . $movieid . "\n".
	   "stars: " . $stars . "\n".	
	   "date: " . $date . "\n".
	   "Viesti: " . "\n".
	   $review . "\n\n\n";


//otsikko
$headers = "From: $from"; 

// meilin lÃ¤hetys ok niin viesti ruutuun
$ok = @mail($to, $subject, $message, $headers); 
if ($ok) {
echo "<p>Yhteydenottonne on lÃ¤htenyt sÃ¤hkÃ¶postilla eteenpÃ¤in. Kiitos!</p> \n";

}

} else {  
echo "Virhe!";
} 

?>