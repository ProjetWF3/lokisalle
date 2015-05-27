<?php
//Securité
if (!defined("SECU")) {
	die ("Vous n&#39;avez pas la permission pour afficher cette page");
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lokisalle</title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'assets/css/bootstrap.min.css'; ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'assets/css/bootstrap-theme.min.css'; ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'assets/css/base.css'; ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<header id="header">
			<div id="header-banniere">
				<a href="<?php echo BASE_URL; ?>" id="logo">Lokisalle</a>
			</div>
			<div class="container">
				<nav id="header-menu">
					<ul class="clearfix">
						<?php

							// on stocke les liens et noms du menu dans un tableau
							$liens = array(
								array("link" => "", "name" => "Accueil"),
								array("link" => "reservation", "name" => "Réservation"),
								array("link" => "recherche", "name" => "Recherche"),
								array("link" => "connexion", "name" => "Se connecter"),
								array("link" => "inscription", "name" => "Nouveau compte"),
							);

							// on les affiche dans une boucle
							foreach ($liens as $lien):

								$active = (isset($_GET['page']) && $_GET['page'] == $lien['link']) || (!isset($_GET['page']) && $lien['link'] == "") ? ' class="active"' : "";
								$urlLien = ($lien['link'] != "") ? BASE_URL . "page/" . $lien['link'] : BASE_URL;
							?>
								<li><a href="<?php echo $urlLien; ?>"<?php echo $active; ?>><?php echo $lien['name']; ?></a></li>

							<?php 
							endforeach; 
							?>
					</ul>
				</nav>
			</div>
		</header>