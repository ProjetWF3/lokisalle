<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	// on inclut le header
	include_once("./application/theme/header.php"); 
?>
<div id="page-mentions">
	<h1 class="h1 titre">Mentions légales</h1>
	<div id="mentions">
		<p>
		Le directeur de publication du site est Monsieur IMAGINAIRE. Le présent site dénommé "Lokisalle" est un site fictif, 
		il est réalisé dans le cadre d'une formation à WebForce3 à la date du : ../../.....  
		Site réalisé par : Nom+Prenom
		<br>
		Sité hébergé par : Domaine  
		</p>	
	</div>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>