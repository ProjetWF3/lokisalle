<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	// on inclut le header
	include_once("./application/theme/header.php"); 
?>
<div id="page-accueil">
	<div id="contenu">
		<h1 class="h1"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Bienvenue sur la page d'accueil</h1>
		<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
		<p>Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du "De Finibus Bonorum et Malorum" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l'éthique. Les premières lignes du Lorem Ipsum, "Lorem ipsum dolor sit amet.", proviennent de la section 1.10.32</p>
	</div>
	<div id="sidebar" class="encadrement">
		<h2 class="h2 titre">Nos 3 dernieres offres</h2>
		<div class="offres">
			<div class="cadre">
				<img src="<?php echo BASE_URL; ?>assets/img/photo.png" width="110" height="110">
			</div>
			<div class="infos">
				<ul class="infos-details">
					<li><img src="<?php echo BASE_URL; ?>assets/img/calendrier.png" alt="calendrier">  Date:</li>
					<li><img src="<?php echo BASE_URL; ?>assets/img/lieu.png" alt="lieu">   Lieu:</li>
					<li><img src="<?php echo BASE_URL; ?>assets/img/prix.png" alt="prix">  Prix:</li>
					<li><img src="<?php echo BASE_URL; ?>assets/img/nbrepersonnes.png" alt="nbrepersonnes">  Nbre de personnes:</li>
				</ul>
				<p> > Fiche detaillée:</p>
				<div class="panier">
					<div class="panier-img"></div>
					<input type="submit" class="ajout-panier" value="Ajouter au panier">
				</div>
			</div>	
		</div>
		<div class="offres">
			<div class="cadre">
				<img src="<?php echo BASE_URL; ?>assets/img/photo.png" width="110" height="110">
			</div>
			<div class="infos">
				<ul class="infos-details">
					<li><img src="<?php echo BASE_URL; ?>assets/img/calendrier.png" alt="calendrier">  Date:</li>
					<li><img src="<?php echo BASE_URL; ?>assets/img/lieu.png" alt="lieu">  Lieu:</li>
					<li><img src="<?php echo BASE_URL; ?>assets/img/prix.png" alt="prix">  Prix:</li>
					<li><img src="<?php echo BASE_URL; ?>assets/img/nbrepersonnes.png" alt="nbrepersonnes">  Nbre de personnes:</li>
				</ul>
				<p> > Fiche detaillée:</p>
				<div class="panier">
					<div class="panier-img"></div>
					<input type="submit" class="ajout-panier" value="Ajouter au panier">
				</div>
			</div>	
		</div>
		<div class="offres">
			<div class="cadre">
					<img src="<?php echo BASE_URL; ?>assets/img/photo.png" width="110" height="110">
			</div>
			<div class="infos">
				<ul class="infos-details">
					<li><img src="<?php echo BASE_URL; ?>assets/img/calendrier.png" alt="calendrier">  Date:</li>
					<li><img src="<?php echo BASE_URL; ?>assets/img/lieu.png" alt="lieu">  Lieu:</li>
					<li><img src="<?php echo BASE_URL; ?>assets/img/prix.png" alt="prix">  Prix:</li>
					<li><img src="<?php echo BASE_URL; ?>assets/img/nbrepersonnes.png" alt="nbrepersonnes">  Nbre de personnes:</li>
				</ul>
				<span><p> > Fiche detaillée:</p></span>
				<div class="panier">
					<div class="panier-img"></div>
					<input type="submit" class="ajout-panier" value="Ajouter au panier">
				</div>
			</div>	
		</div>
	</div>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>