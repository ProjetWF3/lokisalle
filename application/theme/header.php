<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lokisalle</title>
		<?php echo link_tag('assets/css/bootstrap.min.css'); ?>
		<?php echo link_tag('assets/css/bootstrap-theme.min.css'); ?>
		<?php echo link_tag('assets/css/base.css'); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<header id="header">
			<div id="header-banniere">
				<a href="<?php echo site_url(); ?>" id="logo">Lokisalle</a>
			</div>
			<div class="container">
				<nav id="header-menu">
					<ul class="clearfix">
						<li><a href="<?php echo site_url(); ?>" class="active">Accueil</a></li>
						<li><a href="<?php echo base_url('page/reservation'); ?>">Réservation</a></li>
						<li><a href="<?php echo base_url('page/recherche'); ?>">Recherche</a></li>
						<li><a href="<?php echo base_url('page/connexion'); ?>">Se connecter</a></li>
						<li><a href="">Nouveau compte</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<main id="main" class="container">
			