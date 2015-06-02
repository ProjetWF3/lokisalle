<?php

/****************** Initialisation des variables *******************/
session_start();
$msg = '';


/****************** On définit la connection selon le serveur où le script est executé. *******************/
$pathURL = $_SERVER['HTTP_HOST'];

if($pathURL == "127.0.0.1" || $pathURL == "localhost") {

  define("BASE_URL", "http://localhost/lokisalle/"); // chemin de base du site

  define('HOST', 'localhost');
  define('USER', 'root');
  define('PASS', '');
  define('DB', 'lokisalle');

  try {

      global $db;

      $db_options = array(
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
          PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      );

      $db = new PDO('mysql:host='.HOST.';dbname='.DB.'', USER, PASS, $db_options);

  } catch (Exception $e) {
      exit('MySQL Connect Error >> '.$e->getMessage());
  }

} else { //Infos BDD du site distant (Attention : modifier juste si besoin ;)

  define("BASE_URL", "http://lenomdemonsite.fr"); // chemin de base du site

  define('HOST', '');
  define('USER', '');
  define('PASS', '');
  define('DB', '');

  try {

      global $db;

      $db_options = array(
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
          PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      );

      $db = new PDO('mysql:host='.HOST.';dbname='.DB.'', USER, PASS, $db_options);

  } catch (Exception $e) {
      exit('MySQL Connect Error >> '.$e->getMessage());
  }

}

/****************** Appel des fonctions *******************/
$pathFunction = "./application/libraries/fonctions.php");
if(file_exists($pathFunction)) include_once($pathFunctions); 
?>