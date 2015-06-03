<?php 

 // permet de créer un fichier de session qui contiendra tout ce que l'on va écrire dans le tableau $_SESSION. session_start() créé le fichier s'il n'existe pas, et y fait appel s'il existe déjà (càd s'il a été crée dans une autre page)
//var_dump($_SESSION);
  //fichier de configuration
  $pathConf = "./application/config/config.php";
  if(file_exists($pathConf)) include_once($pathConf);

  // on inclut le header
  include_once("./application/theme/header.php"); 


// CREATION PANIER
creationPanier(); // execution de notre fonction qui fabrique des Arrays à l'interieur de session
if(!empty($_POST['ajoutPanier'])) {

  //ajouterProduitDansPanier()
}
/*echo '<pre>';
print_r($_POST);
print_r($_SESSION);
echo '</pre>';*/


/////////////     PAYER      //////////////////////
if(!empty($_GET['action']) && $_GET['action'] == 'payer') {

  for($i=0; $i < count($_SESSION['panier']['id_produit']); $i++) { // ce code va s'éxécuter pour chaque article
    $resultat = recupInfosProduit($_SESSION['panier']['id_produit'][$i]);
  } // fin de la boucle for pour chaque article
$commande = $db->prepare("INSERT INTO commande(montant, id_membre, date)
                      VALUES(:montant, :id_membre, NOW())");
$commande->execute(array(
      ':id_membre' => $_SESSION['utilisateur']['id_membre'],
      ':montant' => calculMontantTotal() * 1.2
      ));



// INSERT "TABLEAU DETAILS COMMANDE DANS BDD " 
$detailCommande = $db->prepare("INSERT INTO details_commande(id_commande, id_produit) VALUES(".$db->lastInsertId().", :id_produit )");

for($i=0; $i < count($_SESSION['panier']['id_produit']); $i++) { 
$detailCommande->execute(array(
':id_produit' => $_SESSION['panier']['id_produit'][$i]
));
}


// SUPPRESSION PRODUIT DU PANIER
  if(!empty($_POST['action']) && ($_POST['action'] == 'suppr')) {
  retirerProduitDuPanier($_GET['id_produit_panier']);
  }


// AJOUTER PRODUIT DANS PANIER
  if(!empty($_POST['ajoutPanier'])) { // si j'ai cliqué sur le bouton "ajoutPanier" qui se toruve dans la fiche article
  $produitAjoute =  recupInfosProduit($_POST['id_produit']); // je recupère les informations en BDD de l'article qui vient de fiche_article.php
  ajouterProduitDansPanier(
    $produitAjoute['montant'], $produitAjoute['id_membre'], $produitAjoute['id_produit'], $produitAjoute['titre'], $produitAjoute['photo'], $produitAjoute['ville'], $produitAjoute['capacite'], $produitAjoute['date_arrivee'], $produitAjoute['date_depart']);
  }
}



/*/*********************************************************************
 *****************            FONCTIONS               ****************
 *********************************************************************/


function retirerProduitDuPanier($id_a_suppr) {
  $position_produit = array_search($id_a_suppr, $_SESSION['panier']['id_produit']);
  if($position_produit !== false) { 
    array_splice($_SESSION['panier']['id_produit'], $position_produit, 1); // array_splice permet de supprimer un element du tableau et de réorganiser le tableau en recommançant à partir de 0 (exemple si je supprime l'index 0, alors je tire la valeur de l'index 1 pour qu'elle se retrouve à 0. Etc...)
    array_splice($_SESSION['panier']['montant'], $position_produit, 1);
    array_splice($_SESSION['panier']['id_membre'], $position_produit, 1);
    array_splice($_SESSION['panier']['photo'], $position_produit, 1);
    array_splice($_SESSION['panier']['ville'], $position_produit, 1);
    array_splice($_SESSION['panier']['capacite'], $position_produit, 1);
    array_splice($_SESSION['panier']['date_arrivee'], $position_produit, 1);
    array_splice($_SESSION['panier']['date_depart'], $position_produit, 1);
    array_splice($_SESSION['panier']['montant'], $position_produit, 1);
  }
}


function calculMontantTotal() {
  $total = 0;
  for($i=0; $i < count($_SESSION['panier']['id_produit']); $i++) {
    $total += $_SESSION['panier']['id_produit'][$i] * $_SESSION['panier']['montant'][$i]; 
  }
  return $total;
}


/*******        RECUPERATION PHOTOS        *******/
function getCover($photo) {

  $cover = 'covers/'.$photo;

  if (file_exists($cover)) {
    return $cover;
  }
  return 'covers/cover.png';
}



?>




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
  		
      <?php if (empty($panierVide)) :
             for($i=0; $i<count($_SESSION['panier']['id_produit']); $i++) : ?>
      <tr>
    		<td><?php  echo $_SESSION['panier']['id_produit'][$i] ?></td>
    		<td><?php  echo $_SESSION['panier']['titre'][$i] ?></td>
    		<td><img src="<?php  echo getCover($_SESSION['panier']['photo'][$i])   ?>"></td>
    		<td><?php  echo $_SESSION['panier']['ville'][$i] ?></td>
    		<td><?php echo $_SESSION['panier']['capacite'][$i] ?></td>
    		<td><?php  echo $_SESSION['panier']['date_arrivee'][$i] ?></td>
    		<td><?php  echo $_SESSION['panier']['date_depart'][$i] ?></td>
    		<td><a href="?action=suppr&id_produit_panier=<?php echo $_SESSION['panier']['id_produit'][$i]; ?>"><span class="glyphicon glyphicon-trash" aria-label="Left Align"></span></a></td>
    		<td><?php  echo $_SESSION['panier']['montant'][$i] . ' €' ?></td>
    		<td>19.6%</td>
  		</tr>
      <?php endfor; ?>
        <!-- <tr colspan="10">
        <td>total : <?php //echo calculMontantTotal() * 1.196 . ' € TTC'; ?></td>
        </tr> -->
      <?php else : ?>
        <tr col="10">
          <td>Votre panier est vide</td>
        </tr>
      <?php endif; ?>

  		<tr id="total">
  			<td id="prix_total" colspan="8">Prix Total TTC :</td>
  			<td id="resultat" colspan="2"><?php echo calculMontantTotal() * 1.2 . ' € TTC'; ?></td>
		</tr>
	</table>
</div>
<div id="conditions" class="clearfix">

  <div id="conditions_gauche">

    <div id="conditions_rond">
      <small>2</small>
    </div>

    <p class="conditions_p1">J’accepte les conditions générales de vente <a>(voir)</a></p>
    <input type="checkbox"></input>
    <p class="conditions_p2">Utiliser un code promo :</p>
    <input type="text"></input>
  </div>

  <div id="conditions_droite">
    <a class="payer" href="?action=payer">Payer</a>
  </div>

  <div id="conditions_texte">
    <p>Tous nos articles sont calculés avec le taux de TVA à 20%</p>
    <p>Règlement: Par Chèque uniquement</p>
    <p>Nous attendons votre règlement par chèque à l'adresse suivante:</p>
    <p>Ma boutique ‐ 1 Rue Boswellia, 75000 Paris, France</p>
  </div>
</div>
<?php 
  // on inclut le footer
  include_once("./application/theme/footer.php"); 
?>
