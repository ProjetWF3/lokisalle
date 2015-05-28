<?php 
	//fichier de configuration
	$pathConf = "./application/config/config.php";
	if(file_exists($pathConf)) include_once($pathConf);

	// on inclut le header
	include_once("./application/theme/header.php");

	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
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
					   				placeholder="Full Name" 
					   				id="name" 
					   				required
				       			data-validation-required-message="Please enter your name" />
						<p class="help-block"></p>
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<input 	type="email" 
								class="form-control" 
								placeholder="Email"
								id="email" 
								required
								data-validation-required-message="Please enter your email" />
						<p class="help-block"></p>
					</div>
				</div> 	
				  
				<div class="control-group">
					<div class="controls">
						<textarea 	rows="10"
									cols="100"
									class="form-control"
									placeholder="Message"
									id="message"
									required
									data-validation-required-message="Please enter your message" 
									minlength="5"
									data-validation-minlength-message="Min 5 characters"
									maxlength="999"
									style="resize:none"></textarea>
						<p class="help-block"></p>
					</div>
				</div> 		 
				<div id="success"></div> <!-- For success/fail messages -->
				<button type="submit" class="btn btn-primary pull-right">Send</button>
			</form>
		</div>
	</div>
</div>
<?php 
	// on inclut le footer
	include_once("./application/theme/footer.php"); 
?>