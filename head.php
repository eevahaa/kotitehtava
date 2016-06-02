<?php 
session_start();
require_once('connections/dbConnection.php');
?>
<!DOCTYPE html>
<html ng-app="">
  <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="author" content="Eeva Haataja">
	<meta name="description" content="Elokuvien arvosteluun soveltuva lista">
    <title>Elokuva-arvostelut</title>
	<link rel="stylesheet" href="styles/stylesheet.css" type="text/css"> 
	<script src="angular.min.js" type="text/javascript"></script>
	
  </head>

