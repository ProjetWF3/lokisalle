<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	// on inclut le header
	include_once("./application/theme/header.php"); 
?>
<div id="page-newsletter">
	<h1 class="h1 titre">Newsletter</h1>
	<div id="newsletter">
		<div id="liens">	
			Je souhaite m’abonner à la newsletter et recevoir les actualités de LOKISALLE. 
		</div>
		<a href="">>> S'inscrire à la newsletter</a>								
	</div>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>