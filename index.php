<?php
//Securité
define("SECU", "true");

//fichier de configuration
$pathConf = "./application/config/config.php";
if(file_exists($pathConf)) include_once($pathConf);

//Les pages à afficher
if (isset($_GET["page"])){
	$page = $_GET["page"];
} else {
	$page = ""; // page accueil par defaut
}

//Entêtes de la page (metas etc)...
include_once("./application/theme/header.php");

//Milieu de la page (les div du contenu etc)...
include_once("./application/theme/main.php");

//Pied de la page (copyright, validateurs, etc)...
include_once("./application/theme/footer.php");
?>
