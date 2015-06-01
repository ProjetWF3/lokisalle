<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	// on inclut le header
	include_once("./application/theme/header.php"); 


	//////////////// Partie dediee au traitement de la recherche //////////////////////
	$motclef = !empty($_GET['motclef']) ? $_GET['motclef'] : '';

	if (!empty($_GET)) {

		if (!empty($motclef)) {

			$query = $db->prepare(
				'	SELECT pays, ville, cp, titre, capacite, categorie FROM salle
					WHERE pays LIKE :motclef 
					OR ville LIKE :motclef
					OR cp LIKE :motclef
					OR titre LIKE :motclef
					OR capacite LIKE :motclef
					OR categorie LIKE :motclef
				');
			$query->bindValue(':motclef', '%'.$motclef.'%', PDO::PARAM_STR);
			$query->execute();
			$search_results = $query->fetchAll();
			$count_results = $query->rowCount();

		}

	}
?>
<div id="page-recherche">
	<h1 class="h1 titre">Recherche</h1>

	<div class="search">
		<form id="formulaire-recherche" action="recherche.php" method="GET">
			<label id="mois-label" class="label-recherche">mois</label>
			<select id="mois-select" class="champs">
				<option value="janvier">janvier</option>
				<option value="février">fevrier</option>
				<option value="mars">mars</option>
				<option value="avril">avril</option>
				<option value="mai">mai</option>
				<option value="juin">juin</option>
				<option value="juillet">juillet</option>
				<option value="aout">août</option>
				<option value="septembre">septembre</option>
				<option value="octobre">octobre</option>
				<option value="novembre">novembre</option>
				<option value="décembre">décembre</option>
			</select>
			<label id="annee" class="label-recherche">année</label>
			<select id="annee-select" class="champs">
				<option value="janvier">2015</option>
				<option value="février">2016</option>
				<option value="mars">2017</option>
				<option value="avril">2018</option>
				<option value="mai">2019</option>
				<option value="juin">2020</option>
			</select>
			<label id="motclef" class="label-recherche">mot clef</label>
			<input type="text" id="motclef" name="motclef" placeholder="Ex : Paris">
			<input type="submit" value="">
		</form>
		<div id="resultats-nombre"><?php if (!empty($search_results)){ echo $count_results . " résultat" . (($count_results > 1) ? "s" : ""); } ?></div>
	</div>
	
	<?php 
		if (!empty($_GET)): ?>

			<?php if (!empty($search_results)): ?>

			<div class="encadrement-central">
				<div class="search-results list-group">
					
					<?php foreach($search_results as $key => $salle): ?>

						<div class="offres-recherche">
							<div class="cadre-recherche">
								<img src="<?php echo BASE_URL; ?>assets/img/photo.png" width="110" height="110">
								<div class="infos">
									<ul class="infos-details">
										<li>Date : 00 / 00 / 2015</li>
										<li>Lieu : <?= $salle['ville'] ?></li>
										<li>Prix : 398 $</li>
										<li>Nbre de personnes : <?= $salle['capacite'] ?></li>
									</ul>
									<p><a href="#"> > Fiche detaillée</a></p>
									<form class="panier" action="panier.php?id_salle=<?= $salle['id_salle']; ?>" method="GET">
										<div class="panier-img"></div>
										<input type="submit" class="ajout-panier" value="Ajouter au panier">
									</form>
								</div>
							</div>
						</div>
						
					<?php endforeach; ?>
					
				</div>
			</div>

			<?php else: ?>

				<h3 class="h3">Aucun résultat pour la recherche.</h3>

			<?php endif; ?>

	<?php
		endif;
	?>

	<?php //for ($i=0; $i <6 ; $i++) { 	
	?>
		<!-- <div class="offres-recherche">
			<div class="cadre-recherche">
				<img src="<?php echo BASE_URL; ?>assets/img/photo.png" width="110" height="110">
				<div class="infos">
					<ul class="infos-details">
						<li>Date : 00 / 00 / 2015</li>
						<li>Lieu : Paris</li>
						<li>Prix : 398 $</li>
						<li>Nbre de personnes : 25</li>
					</ul>
					<p> > Fiche detaillée:</p>
					<div class="panier">
						<div class="panier-img"></div>
						<input type="submit" class="ajout-panier" value="Ajouter au panier">
					</div>
				</div>
			</div>
		</div> -->
	<?php //} ?>


</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>