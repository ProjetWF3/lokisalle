<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	// on inclut le header
	include_once("./application/theme/header.php");

	$query = $db->prepare('	SELECT * FROM salle');
	$query->execute();
	$search_results = $query->fetchAll();
	$count_results = $query->rowCount();
?>
<div id="page-reservation">
	<div id="titre">
		<h1 class="h1 titre clearfix"><span class="left">Réservation <small>> Toutes nos offres</small></span><span class="right results"><?php if (!empty($search_results)){ echo $count_results . " résultat" . (($count_results > 1) ? "s" : ""); } ?></span></h1>
	</div>
	<div class="encadrement-central">

		<?php foreach($search_results as $key => $salle): ?>

			<div class="offres left">
				<div class="cadre">
					<img src="<?php echo BASE_URL; ?>assets/img/photo.png" width="110" height="110">
				</div>
				<div class="infos">
					<ul class="infos-details">
						<li class="offres-sprite offres-date">Date: </li>
						<li class="offres-sprite offres-lieu">Lieu: <?= $salle['ville'] ?></li>
						<li class="offres-sprite offres-prix">Prix: </li>
						<li class="offres-sprite offres-personnes">Nb de pers: <?= $salle['capacite'] ?></li>
					</ul>
					<p><a href="reservation_details.php?id_salle=<?= $salle['id_salle'] ?>"> > Fiche detaillée</a></p>
					<div class="panier">
						<div class="panier-img"></div>
						<input type="submit" class="ajout-panier" value="Ajouter au panier">
					</div>
				</div>	
			</div>
			
		<?php endforeach; ?>					

	</div>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>