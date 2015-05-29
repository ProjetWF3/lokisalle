<?php 
    //fichier de configuration
    $pathConf = "./application/config/config.php";
    if(file_exists($pathConf)) include_once($pathConf);

    // on inclut le header
    include_once("./application/theme/header.php"); 

    //gestion de la connection
    $msg = '';

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
?>