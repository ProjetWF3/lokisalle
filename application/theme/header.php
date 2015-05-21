<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/base.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<header id="header">
			<div id="header-banniere">
				<a href="<?php echo site_url(); ?>" id="logo">Lokisalle</a>
			</div>
			<nav id="header-menu">
				<ul>
					<li><a>Accueil</a></li>
					<li><a>Réservation</a></li>
					<li><a>Recherche</a></li>
					<li><a>Se connecter</a></li>
					<li><a>Nouveau compte</a></li>
				</ul>
			</nav>
		</header>
		<main id="main" class="container">
			<?php var_dump(base_url()); ?>
