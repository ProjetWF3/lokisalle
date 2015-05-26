<div id="carre-recherche"></div>
<?php echo heading("Page $nom_page", 1, 'id="titre-recherche"'); ?>
<form id="formulaire-recherche">
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
	<input type="text" id="pseudo" placeholder="Ex : Paris">
	<input type="submit" value="">
</form>
<div id="resultats-nombre">6 résultats</div>
<div id="resultats-affichage">
<?php for ($i=0; $i <6 ; $i++) { 	
?>
	<div class="offres-recherche">
		<div class="cadre-recherche">
			<img src="<?php echo base_url(); ?>assets/img/photo.png" width="110" height="110">
			<div class="infos">
				<ul class="infos-details">
					<li>Date : 00 / 00 / 2015</li>
					<li>Lieu : Paris</li>
					<li>Prix : 398 $</li>
					<li>Nbre de personnes : 25</li>
				</ul>
				<p> > Fiche detaillée:</p>
				<div class="panier">
					<div class="panier-img"><img src="<?php echo base_url(); ?>assets/img/panier.png" alt="panier"></div>
					<input type="submit" class="ajout-panier" value="Ajouter au panier">
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</div>

