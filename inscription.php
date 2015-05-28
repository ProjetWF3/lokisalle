<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	// on inclut le header
	include_once("./application/theme/header.php"); 
?>
<div id="page-inscription">
	<h1 class="h1 titre">Inscription</h1>
	<form id="formulaire-inscription" class="clearfix encadrement-central">
		<div class="form-moitie">
			<div class="form-group">
				<label id="pseudo" class="label-inscription">pseudo</label>
				<input type="text" class="form-control" id="pseudo">
			</div>
			<div class="form-group">
				<label id="mot-de-passe" class="label-inscription">mot de passe</label>
				<input type="text" class="form-control" id="mot-de-passe">
			</div>
			<div class="form-group">
				<label id="nom" class="label-inscription">nom</label>
				<input type="text" class="form-control" id="nom">
			</div>
			<div class="form-group">
				<label id="prenom" class="label-inscription">prenom</label>
				<input type="text" class="form-control" id="prenom">
			</div>
			<div class="form-group">
				<label id="email" class="label-inscription">email</label>
				<input type="email" class="form-control" id="email">
			</div>
		</div>
		<div class="form-moitie">
			<div class="form-group">
				<div>
					<span class="label-inscription">sexe</span>
					<label class="label-sexe">homme <input class="form-radio" type=radio name="sexe" value="homme"></label>
					<label class="label-sexe">femme <input class="form-radio" type=radio name="sexe" value="femme"></label>
				</div>
			</div>
			<div class="form-group">
				<label id="ville" class="label-inscription">ville</label>
				<input type="text" class="form-control" id="ville">
			</div>
			<div class="form-group">
				<label id="cp" class="label-inscription">code postal</label>
				<input type="text" class="form-control" id="cp">
			</div>
			<div class="form-group">
				<label id="adresse" class="label-inscription">adresse</label>
				<textarea class="form-control"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-default" value="OK" name="valider">
				<button name="annuler" class="btn btn-default" >Reset</button>
			</div>
		</div>			
	</form>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>