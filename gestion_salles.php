<?php
$pathConf = "./application/config/config.php";
if(file_exists($pathConf)) include_once($pathConf);

// on inclut le header
include_once("./application/theme/header.php"); 

if( !empty($_GET['action']) && ($_GET['action'] == 'ajouter' || ($_GET['action'] == 'modifier')) ) {

  if(!empty($_GET['id_salle']) && is_numeric($_GET['id_salle'])) {
  $resultat = recupInfosSalle($_GET['id_salle']);
  if($resultat) {
      extract($resultat); 
    }
  }
 
  $id_salle = !empty($id_salle) ? $id_salle : '';
  $reference = !empty($reference) ? $reference : '';
  $titre = !empty($titre) ? $titre : '';
  $categorie = !empty($categorie) ? $categorie : '';
  $description = !empty($description) ? $description : '';
  $pays = !empty($pays) ? $pays : '';
  $cp = !empty($cp) ? $cp : '';
  $adresse = !empty($adresse) ? $adresse : '';
  $ville = !empty($ville) ? $ville : '';
  $categorie = !empty($categorie) ? $categorie : '';
  $capacite = !empty($capacite) ? $capacite : '';
  $cheminPhoto = !empty($photo) ? RACINE_SITE . $photo : '';
  $affichagePhoto = !empty($cheminPhoto) ? '<input type="hidden" name="photo" value="'.$photo.'"><img width="50"src="'.$cheminPhoto.'">' : ''; 

  $bouton = ucfirst($_GET['action']);

  $contenu = 'formulaire_ajout_modif.php'; }
   else {
    $contenu = 'tableau_des_salles.php';
  }

$affichageActif = (empty($_GET['action']) || $_GET['action'] != 'ajouter') ? 'active' : '';
$ajoutActif = (!empty($_GET['action']) && $_GET['action'] == 'ajouter') ? 'active' : '';

//------ affichage ------------------ //
$pageCourante = 'Gestion Boutique';
include_once('../header.php');
?>

<div class="content container-fluid">
  <?php if(!empty($msg)) echo $msg; ?>
  <ul style="margin: 10px 0;" class="nav nav-tabs">
  <li role="presentation" class="<?php echo $affichageActif; ?>"><a href="?action=affichage">Afficher les salles</a></li>
  <li role="presentation" class="<?php echo $ajoutActif; ?>"><a href="?action=ajouter">Ajouter salles</a></li>
</ul>
  
  
  
  <?php include($contenu); ?>

</div>