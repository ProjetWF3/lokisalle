<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	//****** requete pour affiche toutes les offres *****//

	
	/*$query = $db->prepare("
		SELECT date_format(p.date_arrivee, '%d/%m/%Y %h:%i') as date_arrivee, date_format(p.date_depart, '%d/%m/%Y %h:%i') as date_depart, p.prix, p.id_produit, s.titre, s.capacite, s.photo, s.ville 
		FROM produit p INNER JOIN salle s ON p.id_salle = s.id_salle 
		ORDER BY p.id_salle DESC LIMIT 3");	
	$query->execute();
	$produits = $query->fetchAll();
	$count_results = $query->rowCount();*/

	$query = $db->prepare("SELECT * FROM salle WHERE 1");	
	$query->execute();
	$produits = $query->fetchAll();
	$count_results = $query->rowCount();
	

	// on inclut le header
	include_once("./application/theme/header.php");	
?>
<div id="page-reservation">
	<div id="titre">
		<h1 class="h1 titre clearfix">
			<span class="left">Réservation <small>> Toutes nos offres</small></span>
			<span class="right results">
				<?php 
					if (!empty($produits)){ 
						echo $count_results . " résultat" . (($count_results > 1) ? "s" : ""); 
					}
				?>
			</span>
		</h1>
	</div>
	<div class="encadrement-central">
		
		<?php			

			foreach($produits as $key => $produit): ?>
								
				<div class="offres left">
					<div class="cadre">
						<img src="<?php echo BASE_URL; ?>assets/img/photo.png" width="110" height="110">
					</div>
					<div class="infos">
						<ul class="infos-details">
							<li class="offres-sprite offres-date">Date: </li>
							<li class="offres-sprite offres-lieu">Lieu: <?= $produit['ville'] ?></li>
							<li class="offres-sprite offres-prix">Prix: </li>
							<li class="offres-sprite offres-personnes">Nb de pers: <?= $produit['capacite'] ?></li>
							<li><a href="reservation_details.php?id_salle=<?= $produit['id_salle'] ?>"> > Fiche detaillée</a></li>
						</ul>
						<div class="panier">
							<div class="panier-img"></div>
							<input name="ajoutPanier" type="submit" class="ajout-panier" value="Ajouter au panier">
						</div>
					</div>	
				</div>
			
		<?php 
			endforeach; 
		?>	

	</div>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>