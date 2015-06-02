<?php 
session_start();

creationPanier(); // execution de notre fonction qui fabrique des Arrays à l'interieur de session
//debug($_SESSION);
//SESSION UTILISEUR
$_SESSION['utilisateur'] = array();
$_SESSION['utilisateur']['id_membre']= 2;
$_SESSION['utilisateur']['prenom']= 'xavier';
$_SESSION['panier']['id_produit'] = array('salle cézanne');
$_SESSION['panier']['montant'] = array(100);
$_SESSION['panier']['id_membre'] = array(2);
$_SESSION['panier']['id_produit'] = array(1);
$_SESSION['panier']['id_salle'] = array(2);
$_SESSION['panier']['photo'] = array('paris-opera.jpg');
$_SESSION['panier']['ville'] = array('paris');
$_SESSION['panier']['capacite'] = array(10);
$_SESSION['panier']['date_arrivee'] = array('01/06/2015');
$_SESSION['panier']['date_depart'] = array('02/06/2015');

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

function userConnected() {
  if(!empty($_SESSION['utilisateur'])) {
    return true;
  } else {
    return false;
  }
}


 // permet de créer un fichier de session qui contiendra tout ce que l'on va écrire dans le tableau $_SESSION. session_start() créé le fichier s'il n'existe pas, et y fait appel s'il existe déjà (càd s'il a été crée dans une autre page)
//var_dump($_SESSION);
  //fichier de configuration
  $pathConf = "./application/config/config.php";
  if(file_exists($pathConf)) include_once($pathConf);

  // on inclut le header
  include_once("./application/theme/header.php"); 
var_dump($_SESSION);



/////////////     VIDER PANIER      //////////////////////
if(!empty($_GET['action']) && $_GET['action'] == 'vider_panier') {
  unset($_SESSION['panier']);
  $panierVide = true; // variable de controle pour l'affichage de mon panier plus bas 
}

/////////////     PAYER      //////////////////////
if(!empty($_GET['action']) && $_GET['action'] == 'payer') {

  for($i=0; $i < count($_SESSION['panier']['id_produit']); $i++) { // ce code va s'éxécuter pour chaque article
    $resultat = recupInfosProduit($_SESSION['panier']['id_produit'][$i]);
    // debug($_SESSION['panier']['titre'][$i] . ' stock :' . $resultat['stock']); // je prend le stock de chaque article
    if($_SESSION['panier']['quantite'][$i] > $resultat['stock']) {
      // je rentre ici si la quantité est supérieur au stock
      if($resultat['stock'] > 0) {
        // je reajuste la quantité par rapport au stock
      $msg .= '<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> La quantité de l\'article '.$_SESSION['panier']['titre'][$i].' est supérieur au stock, nous avon réduit en conséquence, veuillez vérifier vos achats</p>';
      $_SESSION['panier']['quantite'][$i] = $resultat['stock'];
      } else { // sinon je retire l'article
        $msg .= '<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Rupture l\'article '.$_SESSION['panier']['titre'][$i].' on le retire</p>';
        retirerProduitDuPanier($_SESSION['panier']['id_produit'][$i]);
      }
    $erreur = true;
    }

  } // fin de la boucle for pour chaque article

// je sors de ma boucle pour enregistrer le total dansla commande

  if(!isset($erreur)) {
  $commande = $pdo->prepare("INSERT INTO produit(id_produit, montant, id_membre, date)
    VALUES(:id_produit, :montant, :id_membre, NOW())");

    if(userConnected()) {
      $produit->execute(array(
        ':id_membre' => $_SESSION['utilisateur']['id_membre'],
        ':montant' => calculMontantTotal() * 1.196
        ));


      // INSERT "TABLEAU COMMANDE" 
      $detailCommande = $bd->prepare("INSERT INTO details_commande(id_details_commande, id_commande, id_produit) VALUES(".$bd->lastInsertId().", :id_commande, :montant, :id_membre )");

      for($i=0; $i < count($_SESSION['panier']['id_details_commande']); $i++) { 
        $detailCommande->execute(array(
          ':id_commande' => $_SESSION['panier']['id_commande'][$i],
          ':montant' => $_SESSION['panier']['id_produit'][$i]
          ));

      /*// INSERT "TABLEAU DETAIL COMMANDE"

      $detailCommande = $pdo->prepare("INSERT INTO commande(id_commande, montant, id_membre) VALUES(".$pdo->lastInsertId().", :id_commande, :montant, :id_membre )");

      for($i=0; $i < count($_SESSION['panier']['id_produit']); $i++) { 
        $detailCommande->execute(array(
          ':id_commande' => $_SESSION['panier']['id_commande'][$i],
          ':montant' => $_SESSION['panier']['montant'][$i],
          ':id_membre' => $_SESSION['panier']['id_membre'][$i]
          ));

      // INSERT "TABLEAU COMMANDE"

      $detailCommande = $pdo->prepare("INSERT INTO commande(id_commande, montant, id_membre) VALUES(".$pdo->lastInsertId().", :id_commande, :montant, :id_membre )");

      for($i=0; $i < count($_SESSION['panier']['id_produit']); $i++) { 
        $detailCommande->execute(array(
          ':id_commande' => $_SESSION['panier']['id_commande'][$i],
          ':montant' => $_SESSION['panier']['montant'][$i],
          ':id_membre' => $_SESSION['panier']['id_membre'][$i]
          ));*/






       }
    } // fin du if user connected
    else {
      $msg .= '<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> connecte toi !</p>';
    }
  }
}

if(!empty($_GET['action']) && ($_GET['action'] == 'suppr')) {
  retirerCommandeDuPanier($_GET['id_produit_panier']);
}

if(isset($_POST['ajoutPanier'])) { // si j'ai cliqué sur le bouton "ajoutPanier" qui se toruve dans la fiche article
  $produitAjoute =  recupInfosProduit($_POST['id_produit']); // je recupère les informations en BDD de l'article qui vient de fiche_article.php
  ajouterProduitDansPanier($commandeAjoute['titre'], $commandeAjoute['id_produit'], $_POST['quantite'], $commandeAjoute['prix']);
}
//debug($_SESSION);



/*********************************************************************
 *****************            FONCTIONS               ****************
 *********************************************************************/
/*define('TVA', 1.196);

function PrixTTC($prix) {
  $prix = $prix *TVA;
  return $prix;
}
echo '<hr>';
echo PrixTTC(100);
echo '<hr>';
*/

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


function ajouterProduitDansPanier($id_produit, $montant, $id_membre, $id_commande){
  // array_search va me retourner la clé associé à la valeur que je recherche.
  $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);
  if($position_produit !== false) { // si la position est zero, nous risquons de ne pas rentrer dans la condition car zero correspond à false. En mettant une différence stricte de false, la condition recherche un false explicite
    $_SESSION['panier']['montant'][$position_produit] += $montant; // 

  } else {
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
function retirerCommandeDuPanier($id_a_suppr) {
  $position_produit = array_search($id_a_suppr, $_SESSION['panier']['id_produit']);
  if($position_produit !== false) { 
    array_splice($_SESSION['panier']['id_produit'], $position_produit, 1); // array_splice permet de supprimer un element du tableau et de réorganiser le tableau en recommançant à partir de 0 (exemple si je supprime l'index 0, alors je tire la valeur de l'index 1 pour qu'elle se retrouve à 0. Etc...)
    array_splice($_SESSION['panier']['montant'], $position_produit, 1);
    array_splice($_SESSION['panier']['id_membre'], $position_produit, 1);
    array_splice($_SESSION['panier']['id_commande'], $position_produit, 1);
    array_splice($_SESSION['panier']['id_salle'], $position_produit, 1);
    array_splice($_SESSION['panier']['photo'], $position_produit, 1);
    array_splice($_SESSION['panier']['ville'], $position_produit, 1);
    array_splice($_SESSION['panier']['capacite'], $position_produit, 1);
    array_splice($_SESSION['panier']['date_arrivee'], $position_produit, 1);
    array_splice($_SESSION['panier']['date_depart'], $position_produit, 1);
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
    		<td><?php  echo $_SESSION['panier']['id_salle'][$i] ?></td>
    		<td><img src="<?php  echo getCover($_SESSION['panier']['photo'][$i])   ?>"></td>
    		<td><?php  echo $_SESSION['panier']['ville'][$i] ?></td>
    		<td><?php echo $_SESSION['panier']['capacite'][$i] ?></td>
    		<td><?php  echo $_SESSION['panier']['date_arrivee'][$i] ?></td>
    		<td><?php  echo $_SESSION['panier']['date_depart'][$i] ?></td>
    		<td><a href="?action=suppr&id_article_panier=<?php echo $_SESSION['panier']['id_produit'][$i]; ?>"><span class="glyphicon glyphicon-trash" aria-label="Left Align"></span></a></td>
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
  			<td id="resultat" colspan="2"><?php echo calculMontantTotal() * 1.196 . ' € TTC'; ?></td>
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
    <input type="submit" value="PAYER"></input>
  </div>

  <div id="conditions_texte">
    <p>Tous nos articles sont calculés avec le taux de TVA à 19,6%</p>
    <p>Règlement: Par Chèque uniquement</p>
    <p>Nous attendons votre règlement par chèque à l'adresse suivante:</p>
    <p>Ma boutique ‐ 1 Rue Boswellia, 75000 Paris, France</p>
  </div>
</div>
<?php 
  // on inclut le footer
  include_once("./application/theme/footer.php"); 
?>
