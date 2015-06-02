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
$_SESSION['utilisateur'] = array();
$_SESSION['utilisateur']['id_membre']= 2;
$_SESSION['utilisateur']['prenom']= 'xavier';
$_SESSION['panier']['montant'] = array(100, 120, 130);
$_SESSION['panier']['id_membre'] = array(2, 2, 2);
$_SESSION['panier']['id_produit'] = array(1, 2, 3);
$_SESSION['panier']['titre'] = array('monet', 'cezanne', 'matisse');
$_SESSION['panier']['photo'] = array('paris-opera.jpg', 'paris-opera.jpg', 'paris-opera.jpg');
$_SESSION['panier']['ville'] = array('paris', 'paris', 'paris');
$_SESSION['panier']['capacite'] = array(10, 20, 30);
$_SESSION['panier']['date_arrivee'] = array('01/06/2015', '07/23/2015', '02/17/2015');
$_SESSION['panier']['date_depart'] = array('02/06/2015', '07/24/2015', '02/18/2015');

echo '<pre>';
print_r($_SESSION);
echo '</pre>';


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
  if(!empty($_GET['action']) && ($_GET['action'] == 'suppr')) {
  retirerProduitDuPanier($_GET['id_produit_panier']);
  }


// AJOUTER PRODUIT DANS PANIER
  if(isset($_POST['ajoutPanier'])) { // si j'ai cliqué sur le bouton "ajoutPanier" qui se toruve dans la fiche article
  $produitAjoute =  recupInfosProduit($_POST['id_produit']); // je recupère les informations en BDD de l'article qui vient de fiche_article.php
  ajouterProduitDansPanier($commandeAjoute['titre'], $commandeAjoute['id_produit'], $_POST['capacite'], $commandeAjoute['prix']);
  }
}
echo '<pre>';
print_r($_SESSION);
echo '</pre>';



/*/*********************************************************************
 *****************            FONCTIONS               ****************
 *********************************************************************/

/*   DEJA SUR FONCTIONS.PHP

function creationPanier(){
  if(!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
    $_SESSION['panier']['id_produit'] = array();
    $_SESSION['panier']['montant'] = array();
    $_SESSION['panier']['id_membre'] = array();
    $_SESSION['panier']['id_commande'] = array();
    $_SESSION['panier']['id_salle'] = array();
    $_SESSION['panier']['photo'] = array();
    $_SESSION['panier']['ville'] = array();
    $_SESSION['panier']['capacite'] = array();
    $_SESSION['panier']['date_arrivee'] = array();
    $_SESSION['panier']['date_depart'] = array();
  }
}


function recupInfosProduit($id_produit) {
  global $db;
  $infosProduit = $db->prepare("SELECT produit.id_produit, salle.photo, salle.ville, salle.capacite, produit.date_arrivee, produit.date_depart, produit.prix
                                FROM produit, salle 
                                WHERE produit. id_salle = salle.id_salle
                              ");
  $id_produit = intval($id_produit);
  $infosProduit->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
  $infosProduit->execute();
  if($infosProduit->rowCount() == 1) {
    $resultat = $infosProduit->fetch(PDO::FETCH_ASSOC);
  } 
  else {
    $resultat = false;
  }

  return $resultat;
  }


// AJOUTER ARTICLE DANS PANIER
function ajouterProduitDansPanier($id_produit, $montant, $id_membre, $id_commande, $id_salle, $photo, $ville, $capacite, $date_arrivee, $date_depart){
  // array_search va me retourner la clé associé à la valeur que je recherche.
  $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);
  if($position_produit !== false) { // si la position est zero, nous risquons de ne pas rentrer dans la condition car zero correspond à false. En mettant une différence stricte de false, la condition recherche un false explicite
    $_SESSION['panier']['montant'][$position_produit] += $montant; // 

  } 
  else {
    $_SESSION['panier'] = array();
    $_SESSION['panier']['id_produit'] = array();
    $_SESSION['panier']['montant'] = array();
    $_SESSION['panier']['id_membre'] = array();
    $_SESSION['panier']['id_commande'] = array();
    $_SESSION['panier']['id_salle'] = array();
    $_SESSION['panier']['photo'] = array();
    $_SESSION['panier']['ville'] = array();
    $_SESSION['panier']['capacite'] = array();
    $_SESSION['panier']['date_arrivee'] = array();
    $_SESSION['panier']['date_depart'] = array();
  }
}
*/

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
