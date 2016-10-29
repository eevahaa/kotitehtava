<?php
//Connection to the database, used PDO
$host='mysql.metropolia.fi'; 
$dbname='example';
$user='example';
$pass='8759823fjfjjfj';


//Creating a new DBH-object
try {
	 $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	 $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 $DBH->query("SET NAMES utf8;");
}catch(PDOException $e) {
	 echo "Could not connect to database.";
	 file_put_contents('../../loki/PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}
$mysqli = new mysqli($host, $dbname, $pass, $dbname);
?>
