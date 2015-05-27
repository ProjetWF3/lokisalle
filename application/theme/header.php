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
						<li><a href="<?php echo BASE_URL; ?>" class = "active">Accueil</a></li>
						<li><a href="?page=reservation">Réservation</a></li>
						<li><a href="">Recherche</a></li>
						<li><a href="">Se connecter</a></li>
						<li><a href="">Nouveau compte</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<main id="main" class="container">
			