<div id="carre-recherche"></div>
<?php echo heading("Bienvenue sur la page $nom_page", 1, 'id="titre-recherche"'); ?>
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
<div id="resultats">6 résultats</div>