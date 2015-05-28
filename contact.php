<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	// on inclut le header
	include_once("./application/theme/header.php"); 
?>
<div id="page-contact">
	<h1 class="h1 titre">Contact</h1>
	<form class="form-horizontal">
		<fieldset>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="input-name">Nom</label>  
			  <div class="col-md-6">
			  	<input id="input-name" name="input-name" type="text" placeholder="Votre nom" class="form-control input-md" required="">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="input-email">Email</label>  
			  <div class="col-md-6">
			  	<input id="input-email" name="input-email" type="text" placeholder="Votre email" class="form-control input-md" required="">
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="submit-contact"></label>
			  <div class="col-md-4">
			    <button id="submit-contact" name="submit-contact" class="btn btn-primary btn-lg">Envoyer</button>
			  </div>
			</div>
		</fieldset>
	</form>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>