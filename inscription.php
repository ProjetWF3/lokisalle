<?php
//fichier de configuration
$pathConf = "./application/config/config.php";
if(file_exists($pathConf)) include_once($pathConf);

// on inclut le header
include_once("./application/theme/header.php"); 

// gestion de l'inscription
if(!empty($_POST)) {
	if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['ville']) && !empty($_POST['cp']) && !empty($_POST['adresse']) && !empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['sexe'])) {
		if(strlen($_POST['prenom']) < 2) {
			$msg .= '<p class="alert alert-danger" role="alert">Le prenom doit contenir au moins 2 caractères .</p>';
		} elseif(strlen($_POST['pseudo']) < 3) {
			$msg .= '<p class="alert alert-danger" role="alert">Le pseudo doit contenir au moins 3 caractères .</p>'; 
		} elseif(strlen($_POST['mdp']) < 8 || !preg_match('/[0-9]/',$_POST['mdp'])) {
			$msg .= '<p class="alert alert-danger" role="alert">Le mot de passe doit contenir au moins 8 caractères dont 1 chiffre .</p>';
		} elseif(strlen($_POST['cp']) < 5 && intval($_POST['cp']) == 0) {
			$msg .= '<p class="alert alert-danger" role="alert">Le code postal doit contenir au moins 5 caractères et que des chiffre(s) .</p>';
		} elseif(preg_match('/[0-9]/', $_POST['prenom']) || preg_match('/[0-9]/', $_POST['nom'])) {
			$msg .= '<p class="alert alert-danger" role="alert">Le prenom et le nom ne doivent pas contenir de chiffre(s) .</p>';
		} else {
			
			$verifMail = $db->prepare("SELECT email FROM membre WHERE email = :email");
			$verifMail->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
			$verifMail->execute();
			
			if($verifMail->rowCount() !== 0) { // si la requête retourne un nombre de résultat différent de zéro (ça peut être 1 ou n'importe quel chiffre)
				
				$msg .= '<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Erreur : </span>L\'email est déjà utilisé .</p>'; 
			
			} else {
				
				// on insert les nouvelles données depuis le formulaire
				$inscription = $db->prepare("INSERT INTO membre (prenom, nom, ville, cp, adresse, email, pseudo, mdp, sexe, statut) VALUES (:prenom, :nom, :ville, :cp, :adresse, :email, :pseudo, :mdp, :sexe, :statut)");
				$inscription->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
				$inscription->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
				$inscription->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
				$inscription->bindValue(':cp', $_POST['cp'], PDO::PARAM_INT);
				$inscription->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
				$inscription->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
				$inscription->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
				$inscription->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
				$inscription->bindValue(':sexe', $_POST['sexe'], PDO::PARAM_STR);
				$inscription->bindValue(':statut', 1, PDO::PARAM_INT);
				$inscription->execute();				

				// on recupere juste les infos à afficher dans profil
				$_SESSION['utilisateur']['pseudo'] = $_POST['pseudo'];
				$_SESSION['utilisateur']['email'] = $_POST['email'];
				$_SESSION['utilisateur']['ville'] = $_POST['ville'];
				$_SESSION['utilisateur']['cp'] = $_POST['cp'];
				$_SESSION['utilisateur']['adresse'] = $_POST['adresse'];

				// on redirige sur la page profil puisque l'on est connecté
				header("Location: profil.php");
				exit();

			}
		}	 
	} else { 
		$msg .= '<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Erreur : </span>Veuillez remplir tous les champs .</p>';
	}	
}
?>
<div id="page-inscription">
	<h1 class="h1 titre">Inscription</h1>
	<?php if(!empty($msg)) echo $msg; ?>
	<form id="formulaire-inscription" class="clearfix encadrement-central" method="post" action="inscription.php">
		<div class="form-moitie">
			<div class="form-group">
				<label id="label-pseudo" class="label-inscription">pseudo</label>
				<input type="text" name="pseudo" class="form-control" id="pseudo"value="<?php echo (!empty($_POST['pseudo'])) ? $_POST['pseudo'] : '';  ?>">
			</div>
			<div class="form-group">
				<label id="label-mot-de-passe" class="label-inscription">mot de passe</label>
				<input type="password" name="mdp" class="form-control" id="mot-de-passe" value="<?php echo (!empty($_POST['mdp'])) ? $_POST['mdp'] : '';  ?>">
			</div>
			<div class="form-group">
				<label id="label-nom" class="label-inscription">nom</label>
				<input type="text" name="nom" class="form-control" id="nom" value="<?php echo (!empty($_POST['nom'])) ? $_POST['nom'] : '';  ?>">
			</div>
			<div class="form-group">
				<label id="label-prenom" class="label-inscription">prenom</label>
				<input type="text" name="prenom" class="form-control" id="prenom" value="<?php echo (!empty($_POST['prenom'])) ? $_POST['prenom'] : '';  ?>">
			</div>
			<div class="form-group">
				<label id="label-email" class="label-inscription">email</label>
				<input type="email" name="email" class="form-control" id="email" value="<?php echo (!empty($_POST['email'])) ? $_POST['email'] : '';  ?>">
			</div>
		</div>
		<div class="form-moitie">
			<div class="form-group" id="formulaire-sexe">
				<div>
					<span class="label-inscription">sexe</span>
					<label class="label-sexe" for="homme">homme <input class="form-radio" id="homme" type="radio" name="sexe" value="m" <?php echo (!empty($_POST['sexe']) && $_POST['sexe'] === 'm') ? 'checked="checked"' : ''; ?>></label>
					<label class="label-sexe" for="femme">femme <input class="form-radio" id="femme" type="radio" name="sexe" value="f" <?php echo (!empty($_POST['sexe']) && $_POST['sexe'] === 'f') ? 'checked="checked"' : ''; ?>></label>
				</div>
			</div>
			<div class="form-group">
				<label id="label-ville" class="label-inscription">ville</label>
				<input type="text" name="ville" class="form-control" id="ville" value="<?php echo (!empty($_POST['ville'])) ? $_POST['ville'] : '';  ?>">
			</div>
			<div class="form-group">
				<label id="label-cp" class="label-inscription">code postal</label>
				<input type="text" name="cp" class="form-control" id="cp" value="<?php echo (!empty($_POST['cp'])) ? $_POST['cp'] : '';  ?>">
			</div>
			<div class="form-group">
				<label id="label-adresse" class="label-inscription">adresse</label>
				<input type="text" name="adresse" class="form-control" id="adresse" value="<?php echo (!empty($_POST['adresse'])) ? $_POST['adresse'] : '';  ?>">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-default" value="Validez l'inscription">
			</div>
		</div>			
	</form>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>
