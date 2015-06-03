<?php
//------------------- FONCTIONS MEMBRES --------------------------- //
function userConnected() {
	if(!empty($_SESSION['utilisateur'])) {
		return true;
	} else {
		return false;
	}
}


function userAdmin() {
	if(userConnected() && $_SESSION['utilisateur']['statut'] == 1) {
		return true;
	} else {
		return false;
	}
}

function logout() {  
  unset($_SESSION['utilisateur']);
  header("Location: connexion.php");
  exit();  
}

//------------------- FONCTIONS DIVERS --------------------------- //
function checkExtensionPhoto() {
	$extension = strRchr($_FILES['photo']['name'], '.'); // strRchr() trouve le dernier caractère indiqué, et donne la chaine de caractère à partir de ce qu'on lui a indiqué (ici un point) 
	//debug($extension);
	$extension = strToLower($extension); // passage en minuscule 
	$extension = subStr($extension, 1); // on enlève le point
	$tabExtensionsValide = array('jpg', 'jpeg', 'png', 'gif');
	$verifExtension = in_array($extension, $tabExtensionsValide); // nous verifions si l'extension est présente dans notre tableau $tabExtensionValide 
	return $verifExtension; // nous retournons TRUE ou FALSE (true si l'extension est présente dans notre tableau, false si elle n'est pas présente )

}



/*********************************************************************
 *****************            PANIER                  ****************
 *********************************************************************/

// CREATION PANIER
function creationPanier(){
  if(!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
    $_SESSION['panier']['id_produit'] = array();
    $_SESSION['panier']['montant'] = array();
    $_SESSION['panier']['id_membre'] = array();
    $_SESSION['panier']['id_commande'] = array();
    $_SESSION['panier']['titre'] = array();
    $_SESSION['panier']['photo'] = array();
    $_SESSION['panier']['ville'] = array();
    $_SESSION['panier']['capacite'] = array();
    $_SESSION['panier']['date_arrivee'] = array();
    $_SESSION['panier']['date_depart'] = array();
  }
}

// RECUPRER INFOS PRODUIT
function recupInfosProduit($id_produit) {
  global $db;
  $infosProduit = $db->prepare("SELECT produit.id_produit, salle.titre, salle.photo, salle.ville, salle.capacite, produit.date_arrivee, produit.date_depart, produit.prix
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
function ajouterProduitDansPanier($id_produit, $montant, $id_membre, $id_commande, $titre, $photo, $ville, $capacite, $date_arrivee, $date_depart){
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
    $_SESSION['panier']['titre'] = array();
    $_SESSION['panier']['photo'] = array();
    $_SESSION['panier']['ville'] = array();
    $_SESSION['panier']['capacite'] = array();
    $_SESSION['panier']['date_arrivee'] = array();
    $_SESSION['panier']['date_depart'] = array();
  }
}


/*function getCover($id, $cheminPhoto, $nomPhoto) {
  global $db;
  $photo = $db->prepare("SELECT photo FROM salle WHERE id_salle = :id");
  $photo->bindValue(':id',$id,PDO::PARAM_INT);
  $photo->execute();
  $photo_results = $photo->fetch();
  if ($photo_results['photo'] != '') {
    return $cheminPhoto . $nomPhoto;
  } else {
    return $cheminPhoto . "salle_0.jpg";
  }  
}*/