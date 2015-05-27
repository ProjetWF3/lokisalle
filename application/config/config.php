<?php
// chemin de base du site
define("BASE_URL", "http://localhost/lokisalle/");

//On définit la connection selon le serveur où le script est executé.
$pathURL = $_SERVER['HTTP_HOST'];

if($pathURL == "127.0.0.1" || $pathURL == "localhost") {

  // Paramètres connexion base locale
  $host = "localhost"; // adresse
  $user = "root"; // vide ou "root" en local
  $pass = ""; // vide ou root(pour les mac) en local
  $bdd = "lokisalle"; // nom de la BDD

  // connexion
  @mysql_connect($host,$user,$pass) or die('Impossible de se connecter &agrave; '.$host.'<br />'.mysql_error());
  @mysql_select_db($bdd) or die('Impossible de s&eacute;lectionner la BDD : '.$bdd.'<br />'.mysql_error());

} else { //Infos BDD du site distant (Attention : modifier juste si besoin ;)

  // Paramètres connexion à la basse de donnees
  $host = ""; // adresse selon hebergeur
  $user = ""; // login hebergeur
  $pass = ""; // mot de passe hebergeur
  $bdd = ""; // nom de la BD selon hebergeur

  // connexion
  @mysql_connect($host,$user,$pass) or die('Impossible de se connecter &agrave; '.$host.'<br />'.mysql_error());
  @mysql_select_db($bdd) or die('Impossible de s&eacute;lectionner la BDD : '.$bdd.'<br />'.mysql_error());

}
?>