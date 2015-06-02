<?php 
//fichier de configuration
$pathConf = "./application/config/config.php";
if(file_exists($pathConf)) include_once($pathConf);

// on inclut le header
include_once("./application/theme/header.php");

// Une fonction qui génére un mot de passe aléatoire de 10 caractères
function random_password($lenghtPw) {
	$signes = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$pw = substr(str_shuffle($signes), 0, $lenghtPw);
	return $pw;
}

// Une variable qui crée un nouveau password


//Envoi de l'email avec la fonction mail()

if(!empty($_POST)) {
	if(!empty($_POST['email'])) {
		$lenghtPw = 8;
		$password = random_password($lenghtPw);
		$email = $_POST['email']; 
		mail($email, 'Lokisalle nouveau mot de passe', $password);
		$msg .= '<p class="alert alert-success" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Erreur : </span>un nouveau mot de passe a été envoyé sur votre messagerie</p>';
		$changePw = $db->prepare("UPDATE membre SET mdp = '$password' WHERE email = '$email'");

		$changePw->bindValue(':mdp', $password, PDO::PARAM_STR);
		$changePw->execute();

		$_POST['email'] = '';
	}
}

echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<pre>';
print_r($password);
echo '</pre>';






?>

<div id="page-mdp-perdu">
	<h1 class="h1 titre">Mot de passe perdu</h1>
	<?php if(!empty($msg)) echo $msg; ?> <!-- pour mettre un message comme quoi un email a été envoyé avec un nouveau mot de passe -->
	<form id="formulaire-mdp-perdu" class="clearfix encadrement" method="post" action="mdp_perdu.php">
		<div class="form-moitie">
			<div class="form-group">
				<p>Ecrivez votre email pour récupérer un nouveau mot de passe</p>
				<input type="email" name="email" class="form-control" id="email" value="<?php echo (!empty($_POST['email'])) ? $_POST['email'] : '';  ?>">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-default" value="Renvoyez-moi un nouveau mot de passe">
			</div>

	</form>
</div>


<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>