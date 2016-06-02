
<?php 
include_once('head.php');
?>

  <body>
	<header>
	<h1>Elokuva-arvostelut</h1>	
	</header> 
	
	<div class="top-bar">
		<div class="top-bar-left">
			<ul class="menu">
				<li><a href="index.php">Elokuvat</a></li>
				<li><a href="search.php">Etsi kommentteja</a></li>
				
			</ul>
		</div>
	</div>

	<!-- Search -->
	<div class="row medium-8 large-7 columns">
		<div class="blog-post">
			
			<h2>Etsi arvosteluja käyttäjän mukaan</h2>
			
			<form name="search" action="search.php" method="post" class="section-container-class">
			<input type="search" name="authorsearch">
			<input type="submit"  name="Submit" value="Etsi" class="button [tiny small large]">
			</form>
			<?php include'sqlfuncs/reviewsearch.php'; ?>
		</div>
	</div>
			
  </body>
</html>