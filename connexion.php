<?php 
    session_start();
    //fichier de configuration
    $pathConf = "./application/config/config.php";
    if(file_exists($pathConf)) include_once($pathConf);

    // on inclut le header
    include_once("./application/theme/header.php"); 

    //gestion de la connection
    $msg = '';

    if(!empty($_POST)) {
   /* $e=extract($_POST);*/
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $verifConnexion = $db->prepare("SELECT id_membre, pseudo, email, prenom, nom, adresse, cp, ville, statut, sexe FROM membre WHERE email = :pseudo && mdp = :mdp");
        $verifConnexion->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $verifConnexion->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
        $verifConnexion->execute();
       /* var_dump($verifConnexion->rowCount());*/
        if($verifConnexion->rowCount() === 0) { // si la requete renvoi 0 cela signifie que le mot de passe et l'email ne correspondent pas donc message erreur
            $msg .= '<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Erreur : </span>Votre pseudo ou mots de passe sont incorrects !</p>';
        } elseif(strlen($_POST['pseudo']) < 3) {
            $msg .= '<p class="alert alert-danger" role="alert">Le pseudo doit contenir au moins 3 caractères .</p>'; 
        }elseif(strlen($_POST['mdp']) < 8 || !preg_match('/[0-9]/',$_POST['password'])) {
            $msg .= '<p class="alert alert-danger" role="alert">Le mot de passe doit contenir au moins 8 caractères dont 1 chiffre .</p>';
        }else {
            $profil = $verifConnexion->fetch(PDO::FETCH_ASSOC);
            foreach($profil as $key => $value) {
                $_SESSION['utilisateur'][$key] = $value; // je rempli une session avec les infos du profil 
            }
            header('location: profil.php'); // si la connexion est OK, je le redirige vers sa page profil
            exit();
        }

    } else {
        $msg .= '<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Erreur : </span>Tous les champs doivent être remplis</p>';
    }
}
 

        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
        /*echo '<pre>';
        print_r($verifConnexion);
        echo '</pre>';*/
?>
<div id="page-connexion">
    <div id="connexion">
        <?php if(!empty($msg)) echo $msg; ?>
        <h1 class="h1 titre">Connexion<h1>
    	<div class="encadrement left">
    		<p>deja membre</p>
    			<div id="formulaire">
    				<form method="post" action="">
    					<div>
                            <label for="pseudo" id="pseudo">pseudo:</label>
                            <div>
                                <input type="text" name="pseudo" />
                            </div>
                        </div>
                        <div>
                            <label for="Mot de passe" id="Mot de passe">Mot de passe:</label>
                            <div>
                                <input type="password" name="password" />
                                <a href="">Mot de passe oublier</a>
                            </div>
                        </div>
                        <div>
                            <label for="se souvenir de moi" id="se souvenir de moi">se souvenir de moi:</label>
                            <div>
                                <input type="checkbox" name="choix" />
                            </div>
                                <div>
                                    <input type="submit"  value="connexion" />
                                </div>
                        </div>
    				</form>
    			</div>
    	</div>
    	<div class="encadrement right">
    		<p>Pas encore membre ?</p>
    		<a href="inscription.php">inscrivez-vous</a>
        </div>
    </div>
</div>
<?php 
    // on inclut le footer
    include_once("./application/theme/footer.php"); 
