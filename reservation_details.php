<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	// on inclut le header
	include_once("./application/theme/header.php");
	
	unset($_SESSION['panier']);
	// AJOUT PANIER
	if(!empty($_GET['id_produit']) && is_numeric($_GET['id_produit'])) {
	$_GET['id_produit'] = intval($_GET['id_produit']);
	$affichageProduit =  recupInfosProduit($_GET['id_produit']);
	/*debug($affichageProduit);*/
	}
	/*//////////////// Partie dediee au traitement du GET recupéré //////////////////////
	$idproduit = !empty($_GET['id_produit']) ? $_GET['id_produit'] : '';
	$query = $db->prepare('SELECT * FROM produit WHERE id_produit = :idproduit');	
	$query->bindValue(':idproduit', $idproduit, PDO::PARAM_INT);
	$query->execute();
	$produit = $query->fetch();*/
?>
<div id="page-reservation-details">
	<div id="titre">
		<h1 class="h1 titre">Réservation <small>> <a href="reservation.php">Toutes nos offres</a> > en détail</small></h1>
	</div>


		<div id="salle" class="clearfix">
			<form method="post" action="panier.php" >
			<div class="left">
				<img name="photo" src="<?php  echo BASE_URL . 'covers/'. $affichageProduit['photo']?>" width="166" height="166">
				<p name="capacite">Capacité :<span class="span-capacite"><?= $affichageProduit['capacite'] ?></span></p>
				<p name="categorie">Catégorie :<span class="span-categorie"><?= $affichageProduit['categorie'] ?></span></p>
			</div>
			<div class="right">
				<h2 name="titre" class="left">Salle <span><?= $affichageProduit['titre'] ?></span></h2>
				<div id="points-ronds">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
				<p class="left">Sur 2 avis</p>
				<div id="points-description">
					<p>Description</p>
					<p name="decription" ><?= $affichageProduit['description'] ?></p>
				</div>
			</div>
			<div id="salle-panier" class="panier">
				<div class="panier-img"></div>
				<input type="hidden" name="id_produit" value="<?= $affichageProduit['id_produit'] ?>">
				<input name="ajoutPanier" type="submit" class="ajout-panier" value="Ajouter au panier">
			</div>
			</form>
		</div>


		<div class="clearfix">
			<!--   2 BLOCS : INFORMATIONS & AVIS -->
			<div id="infos_gauche">		
				<h1 class="h1 titre">Informations comptémentaires</h1>
				<div class="infos-container">
					<div id="infos-container_gauche">
						<h2>adresse</h2>
						<ul>
							<li name="pays">Pays : <span class="infos-container-span"><?= strtoupper($affichageProduit['pays']) ?></span></li>
							<li name="ville">Ville : <span class="infos-container-span" id="ville-maps" data-ville="<?= $affichageProduit['ville'] ?>"><?= $affichageProduit['ville'] ?></span></li>
							<li name="adresse">Adresse : <span class="infos-container-span" id="adresse-maps" data-adress="<?= $affichageProduit['adresse'] ?>"><?= $affichageProduit['adresse'] ?></span></li>
							<li name="cp">Code postal : <span class="infos-container-span" id="cp-maps" data-cp="<?= $affichageProduit['cp'] ?>"><?= $affichageProduit['cp'] ?></span></li>
							<li name="date_arrivee">Date d'arrivée : <span class="infos-container-span">22/05/2015</span></li>
							<li name="date_depart">Date de départ : <span class="infos-container-span">23/05/2015</span></li>
							<li name="prix">Prix : <span class="infos-container-span">120 €</li>
						</ul>
					</div>
					<div id="infos-container_droite">
						<div id="map-canvas"></div>
					</div>
				</div>
			</div>

			<div id="avis_droite">	
				<h1 class="h1 titre">Avis</h1>
				<div class="infos-container">
					<div id="avis-commentaires">
						<p>David Beckham, le 10/05/15</p>
						<div id="points-ronds2">
							<a href=""></a>
							<a href=""></a>
							<a href=""></a>
							<a href=""></a>
							<a href=""></a>
						</div>
						<div id="informations-commentaires_first">
							<img src="<?php echo BASE_URL; ?>assets/img/guillemet_haut.png">
							<p>Je suis très content de cette salle, elle est grande, bien trop grande!</p>
							<img src="<?php echo BASE_URL; ?>assets/img/guillemet_bas.png">
						</div>
						<div id="commentaire-creer">
							<form>
							<p>Jean-Baptiste</p>
							<textarea placeholder="Ajoutez un commentaire"></textarea>
							<p>Note</p>
							<div id="points-ronds2">
								<a href=""></a>
								<a href=""></a>
								<a href=""></a>
								<a href=""></a>
								<a href=""></a>
							</div>
							
							<input type="submit" value="SOUMETTRE">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>



	<!--    AUTRES SUGGESTIONS   -->
	<div id="autres-suggestions">
		<h1 class="h1 titre">Autres salles</h1>
		<div id="suggestions" class="infos-container">
			<div id="suggestions_gauche">
				<a href="#"></a>
			</div>
			<div id="suggestions_milieu">
				<?php  for ($i=0; $i <3 ; $i++) {  ?>
				<div id="suggestions_offre">
					<img src="<?php echo BASE_URL; ?>assets/img/photo.png" width="80" height="80">
					<div id="suggestions_offre_texte">
						<p>SALLE</p>
						<p>Date: du 7 Déc au 8 Déc 2015</p>
						<p>Personnes : 22</p>
						<p>Prix : 200 €</p>
						<a href="#">   >Voir en détails</a> 
					</div>
				</div>
				<?php }?>
			</div>
			<div id="suggestions_droite">
				<a href="#"></a>
			</div>
		</div>	
	</div>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>