<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	// on inclut le header
	include_once("./application/theme/header.php");
?>
<div id="page-contact">
	<h1 class="h1 titre">Contact</h1>
	<div class="row">	
		 <!-- Alignment -->
		<div class="col-sm-offset-3 col-sm-6">
		   <!-- Form itself -->
			<form name="sentMessage" class="well" id="contactForm"  novalidate>
				<div class="control-group">
					<div class="controls">
						<input 	type="text" 
								class="form-control" 
					   			placeholder="Votre Nom" 
					   			id="name" 
					   			required
				       			data-validation-required-message="Entrez votre Nom" />
						<p class="help-block"></p>
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<input 	type="email" 
								class="form-control" 
								placeholder="Votre Email"
								id="email" 
								required
								data-validation-required-message="Entrez votre email" />
						<p class="help-block"></p>
					</div>
				</div> 	
				  
				<div class="control-group">
					<div class="controls">
						<textarea 	rows="10"
									cols="100"
									class="form-control"
									placeholder="Votre Message"
									id="message"
									required
									data-validation-required-message="Laissez votre message" 
									minlength="5"
									data-validation-minlength-message="Minimun 5 caractères"
									maxlength="999"
									style="resize:none"></textarea>
						<p class="help-block"></p>
					</div>
				</div>

				<div id="success"></div> <!-- For success/fail messages -->

				<div class="control-group" style="overflow:hidden;">
					<div class="controls">
						<button type="submit" class="btn btn-primary btn-lg pull-right">Envoyez</button>
					</div>
				</div>				
			</form>
		</div>
	</div>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>