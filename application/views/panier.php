<div id="panier_titre">
	<h1 class="h1 titre">Panier</h1>
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
    		<td>N°2</td>
    		<td>Baron</td>
    		<td><img src=""></td>
    		<td>Paris</td>
    		<td>
          <select>
            <option value="volvo">1</option>
            <option value="saab">2</option>
            <option value="opel">3</option>
            <option value="audi">4</option>
          </select>
        </td>
    		<td>27/05/2015</td>
    		<td>30/05/2015</td>
    		<td><a href=""><span class="glyphicon glyphicon-trash" aria-label="Left Align"></span></a></td>
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

	<div id="conditions_gauche">
    <small>2</small>
  	<p>J’accepte les conditions générales de vente <a>(voir)</a></p>
    <input type="checkbox"></input>
    <p>Utiliser un code promo :</p>
    <input type="text"></input>
  </div>

  <div id="conditions_droite">
    <input type="submit" value="PAYER"></input>
  </div>

  <div id="conditions_texte">
    <p>Tous nos articles sont calculés avec le taux de TVA à 19,6%</p>
    <p>Règlement: Par Chèque uniquement</p>
    <p>Nous attendons votre règlement par chèque à l'adresse suivante:</p>
    <p>Ma boutique ‐ 1 Rue Boswellia, 75000 Paris, France</p>
  </div>
</div>
	





