<?php 
    //fichier de configuration
    $pathConf = "./application/config/config.php";
    if(file_exists($pathConf)) include_once($pathConf);

    if (!userConnected()) {
        header("Location: connexion.php");
        exit();
    }

    if(isset($_GET['logout']) && $_GET['logout'] == "logout") {
        logout();
    }

    // on inclut le header
    include_once("./application/theme/header.php"); 

?>
<div id="page-profil">
    <div id="profil">
        <?php if(!empty($msg)) echo $msg; ?>
        <h1 class="h1 titre">Profil <small>> <a href="?logout=logout">Se déconnecter</a></small><h1>
    	<div class="encadrement left">
    		<p>Voici vos informations</p>
			<div id="informations-profil">
				<ul>
                    <li>Votre pseudo :<?php echo ($_SESSION['utilisateur']['pseudo']);?></li>
                    <li>Votre email est :<?php echo ($_SESSION['utilisateur']['email']);?> </li>
                    <li>Votre ville est :<?php echo ($_SESSION['utilisateur']['ville']);?> </li>
                    <li>Votre cp est : <?php echo ($_SESSION['utilisateur']['cp']);?></li>
                    <li>Votre adresse est :<?php echo ($_SESSION['utilisateur']['adresse']);?></li>
                </ul>
                <a href="">Mettre à jour mes informations</a>
            </div>
        </div>
        <div class="encadrement right">
            <p>Vos dernieres commandes</p>
                <div id="last-cmd">
                    <table class="table table-hover">
                        <tbody>
                            <tr class="info">
                                <th>Numero de suivi</th>
                                <th>date</th>
                            </tr>
                            <tr>
                                <td>76622</td>
                                <td>25/05/2015</td>
                            </tr>
                            <tr>
                                <td>80200</td>
                                <td>30/05/2015</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    		
        </div>
    </div>
</div>
<?php 
    // on inclut le footer
    include_once("./application/theme/footer.php"); 
