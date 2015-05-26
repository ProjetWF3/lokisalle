<div id="titre">
	<div class="carre"></div>
	<?php 
		echo heading('Réservation', 1);
		echo heading('> en détail', 2);
	?>
</div>
<div id="salle">
	<div id="cadre">
		<img src="<?php echo base_url(); ?>assets/img/photo.png" width="166" height="166"></img>
	</div>
	<div id="points">
		<?php 
			echo heading('Salle <span>Cézanne</span>', 1);
		?>
		<div id="points-ronds">
			<a href=""></a>
			<a href=""></a>
			<a href=""></a>
			<a href=""></a>
			<a href=""></a>
		</div>
		<p>Sur 2 avis</p>
		<div id="points-description">
			<p>Description</p>
			<p>Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum.</p>
		</div>
	</div>
	<div id="salle-capacite">
		<p>Capacité :<span class="span-capacite"> 2</span></p>
		<p>Catégorie :<span class="span-categorie"> 1</span></p>
	</div>
</div>

<!--   2 TITRES : INFORMATIONS & AVIS -->
<div id="informations_avis">
	<div id="informations">
		<div class="carre"></div>
		<?php 
			echo heading('informations comptémentaires', 1);
		?>
	</div>
	<div id="avis">
		<div class="carre"></div>
		<?php 
			echo heading('avis', 1);
		?>
	</div>

	<!--   2 CONTAINERS: GAUCHE ET DROITE -->
	<div id="informations-container">
		<div id="informations-container-gauche">
			<?php 
				echo heading('adresse', 2);
			?>
			<ul>
				<li>Pays : <span class="informations-container-span">France</span></li>
				<li>Ville : <span class="informations-container-span">paris</span></li>
				<li>Adresse : <span class="informations-container-span">1 Avenue des Champs-Elysée</span></li>
				<li>Code postal : <span class="informations-container-span">75008</span></li>
				<li>Date d'arrivée :<span class="informations-container-span">22/05/2015</span></li>
				<li>Date de départ :<span class="informations-container-span">23/05/2015</span></li>
				<li>Prix : <span class="informations-container-span">120 €</li>
			</ul>
		</div>
		<div id="informations-container-droite">
			<img src="<?php echo base_url(); ?>assets/img/googlemap.png">
			<a href="">Lien google</a>
		</div>
	</div>
	<div id="informations-commentaires"></div>
</div>