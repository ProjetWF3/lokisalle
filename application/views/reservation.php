<div id="titre">
	<div class="carre"></div>
	<?php 
		echo heading('Réservation', 1);
		echo heading('> en détail', 2);
	?>
</div>
<div id="salle">
	<div id="cadre">
		<img src="<?php echo base_url(); ?>assets/img/photo.png" width="166" height="166">
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
			<p>Sur 2 avis</p>
		</div>
		
		<div id="points-description">
			<p>Description</p>
			<p>Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum. Lorem upsum Lorem upsum.</p>
		</div>
	</div>

	<div id="salle-capacite">
		<p>Capacité :<span class="span-capacite"> 2</span></p>
		<p>Catégorie :<span class="span-categorie"> 1</span></p>
	</div>
	<div id="salle-panier">
		<a class="salle-panier_picto" href="panier.php"><img src="<?php echo base_url(); ?>assets/img/panier.png" width="22" height="25"></a>
		<input type="submit" href="panier.php" value="Ajouter au panier">
	</div>
</div>

<!--   2 BLOCS : INFORMATIONS & AVIS -->
<div id="infos_gauche">
	
	<div id="infos_titre">
		<div class="carre"></div>
		<?php 
			echo heading('informations comptémentaires', 1);
		?>
	</div>
	<div id="infos-container">
		<div id="infos-container_gauche">
			<?php 
				echo heading('adresse', 2);
			?>
			<ul>
				<li>Pays : <span class="infos-container-span">France</span></li>
				<li>Ville : <span class="infos-container-span">paris</span></li>
				<li>Adresse : <span class="infos-container-span">1 Avenue des Champs-Elysée</span></li>
				<li>Code postal : <span class="infos-container-span">75008</span></li>
				<li>Date d'arrivée :<span class="infos-container-span">22/05/2015</span></li>
				<li>Date de départ :<span class="infos-container-span">23/05/2015</span></li>
				<li>Prix : <span class="infos-container-span">120 €</li>
			</ul>
		</div>
		<div id="infos-container_droite">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.0039510459223!2d2.3669709722713255!3d48.87720122574424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e4d24f9ad17%3A0xa231db7a5a9dcb43!2s24+Rue+Lecluse%2C+75017+Paris!5e0!3m2!1sfr!2sfr!4v1432725906139" width="206" height="206" frameborder="0" style="border:0"></iframe>
			<a href="">Lien google</a>
		</div>
	</div>
</div>

<div id="avis_droite">	
	<div id="infos_titre">
		<div class="carre"></div>
		<?php 
			echo heading('avis', 1);
		?>
	</div>
	<div id="infos-container">
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
				<img src="<?php echo base_url(); ?>assets/img/guillemet_haut.png">
				<p>Je suis très content de cette salle, elle est grande, bien trop grande!</p>
				<img src="<?php echo base_url(); ?>assets/img/guillemet_bas.png">
			</div>
			<div id="commentaire-creer">
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
			</div>
		</div>
	</div>
</div>
	




<!--    AUTRES SUGGESTIONS   -->

<div id="autres-suggestions">
	<div id="autres-suggestions_titre">
		<div class="carre"></div>
		<?php 
			echo heading('autres suggestions', 1);
		?>
	</div>
	<div id="suggestions">
		<div id="suggestions_gauche">
			<a href="#"></a>
		</div>
		<div id="suggestions_milieu">
			<?php  for ($i=0; $i <3 ; $i++) {  ?>
			<div id="suggestions_offre">
				<img src="<?php echo base_url(); ?>assets/img/photo.png" width="80" height="80">
				<div id="suggestions_offre_texte">
					<p>   SALLE</p>
					<p>   Date: du 7 Déc au 8 Déc 2015</p>
					<p>   Personnes : 22</p>
					<p>   Prix : 200 €</p>
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
