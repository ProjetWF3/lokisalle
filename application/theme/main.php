<?php
//Securité !
if (!defined("SECU")){
	die("Vous n&#39;avez pas la permission pour afficher cette page");
}

 //Affichage du contenu par page demandé
$string = "../views/".$page.".php";

if(file_exists($string)) {
	include_once($string);
}
?>