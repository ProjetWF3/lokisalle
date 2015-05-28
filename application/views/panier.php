<div id="panier_titre">
	<h1 class="titre">Panier</h1>
</div>
	<div id="panier_valider">
	<span class="panier_titre_rond"><small>1</small></span>
	<p>Veillez valider votre panier</p>
</div>
<div id="tableau_panier">
	<table class="table table-hover">
		<tr>
    		<th>produit</th>
    		<th>Salle</th>
    		<th>Photo</th>
    		<th>Ville</th>
    		<th>Capacité</th>
    		<th>Date d'arrivée</th>
    		<th>Date de départ</th>
    		<th>Retirer</th>
    		<th>Prix HT</th>
    		<th>TVA</th>
  		</tr>
  		<?php  for ($i=0; $i <10 ; $i++) { ?>
  		<tr>
    		<td>2</td>
    		<td>Baron</td>
    		<td>image1</td>
    		<td>Paris</td>
    		<td>3</td>
    		<td>27/05/2015</td>
    		<td>30/05/2015</td>
    		<td><input type="checkbox"></td>
    		<td>500 €</td>
    		<td>19.6%</td>
  		</tr>
 		<?php } ?>
  		<tr id="total">
  			<td id="prix_total" colspan="8">Prix Total TTC :</td>
  			<td id="resultat" colspan="2">12 700€</td>
		</tr>
	</table>
</div>
<div id="conditions">
	<span class="panier_titre_rond"><small>2</small></span>
	<p>J’accepte les conditions générales de vente (voir)</p>
</div>
	





