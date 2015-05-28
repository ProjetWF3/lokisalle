<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	// on inclut le header
	include_once("./application/theme/header.php"); 

$msg = '';
$inscription = $db->prepare("INSERT INTO membre (prenom, nom, ville, cp, adresse, email, pseudo, mdp, sexe)
			VALUES (:prenom, :nom, :ville, :cp, :adresse, :email, :pseudo, :mdp, :sexe)");
if(!empty($_POST)) {
	if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['ville']) && !empty($_POST['cp']) && !empty($_POST['adresse']) && !empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['sexe'])) {
		$inscription->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
		$inscription->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
		$inscription->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
		$inscription->bindValue(':cp', $_POST['cp'], PDO::PARAM_INT);
		$inscription->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
		$inscription->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
		$inscription->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
		$inscription->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
		$inscription->bindValue(':sexe', $_POST['sexe'], PDO::PARAM_STR);
		$inscription->execute();
		} else { 
			$msg .= '<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Erreur : </span>Veuillez remplir tous les champs !</p>';
		}	
}
echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<pre>';
print_r($inscription);
echo '</pre>';  	

?>
<div id="page-inscription">
	<h1 class="h1 titre">Inscription</h1>
	<form id="formulaire-inscription" class="clearfix encadrement-central" method="post" action="inscription.php">
		<div class="form-moitie">
			<div class="form-group">
				<label id="label-pseudo" class="label-inscription">pseudo</label>
				<input type="text" name="pseudo" class="form-control" id="pseudo">
			</div>
			<div class="form-group">
				<label id="label-mot-de-passe" class="label-inscription">mot de passe</label>
				<input type="text" name="mdp" class="form-control" id="mot-de-passe">
			</div>
			<div class="form-group">
				<label id="label-nom" class="label-inscription">nom</label>
				<input type="text" name="nom" class="form-control" id="nom">
			</div>
			<div class="form-group">
				<label id="label-prenom" class="label-inscription">prenom</label>
				<input type="text" name="prenom" class="form-control" id="prenom">
			</div>
			<div class="form-group">
				<label id="label-email" class="label-inscription">email</label>
				<input type="email" name="email" class="form-control" id="email">
			</div>
		</div>
		<div class="form-moitie">
			<div class="form-group">
				<div>
					<span class="label-inscription">sexe</span>
					<label class="label-sexe" for="homme">homme <input class="form-radio" id="homme" type="radio" name="sexe" value="h" <?php echo (!empty($_POST['sexe']) && $_POST['sexe'] === 'm') ? 'checked="checked"' : ''; ?>></label>
					<label class="label-sexe" for="femme">homme <input class="form-radio" id="femme" type="radio" name="sexe" value="f" <?php echo (!empty($_POST['sexe']) && $_POST['sexe'] === 'f') ? 'checked="checked"' : ''; ?>></label>
				</div>
			</div>
			<div class="form-group">
				<label id="label-ville" class="label-inscription">ville</label>
				<input type="text" name="ville" class="form-control" id="ville">
			</div>
			<div class="form-group">
				<label id="label-cp" class="label-inscription">code postal</label>
				<input type="text" name="cp" class="form-control" id="cp">
			</div>
			<div class="form-group">
				<label id="label-adresse" class="label-inscription">adresse</label>
				<textarea class="form-control" name="adresse"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-default" value="OK">
				<button  class="btn btn-default" >Reset</button>
			</div>
		</div>			
	</form>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>
