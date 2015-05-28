/*
 * Modules
 */

app = {

	/*
	 * Chargement du DOM
	 */
	init: function() {
		console.info("app.init")
	}

}

$("#contact").submit(function(){
	
	$(this).find(".error").remove();		
	
	nom = $(this).find("input[name=nomC]").val();
	email = $(this).find("input[name=emailC]").val();
	commentaires = $(this).find("textarea[name=messC]").val();
	
	inputNom = $(this).find("input[name=nomC]");
	inputEmail = $(this).find("input[name=emailC]");
	inputComment = $(this).find("textarea[name=messC]");
	str = $(this).serialize();
	
	$.ajax({ // fonction permettant de faire de l'ajax
	   type: "POST", // methode de transmission des données au fichier php
	   url: "verif.php", // url du fichier php
	   data: str , //"login="+$("#login").val()+"&pass="+$("#pass").val(), // données à transmettre
	   success: function(msg){ // si l'appel a bien fonctionné
			if(msg==0){ // si la connexion en php a fonctionnée
			
				inputNom.val("Votre Nom");
				inputEmail.val("Votre Email");
				inputComment.val("Votre Message");										
				$("<span class='error'>Message envoy&eacute;, merci !</span>").fadeIn(800).insertAfter(inputComment);	
			
	
			}else{ // si la connexion en php n'a pas fonctionnée
			
				if(msg==1){
					$("<span class='error'>Votre Nom est obligatoire</span>").fadeIn(800).insertAfter(inputNom);
				}
				if(msg==2){
					$("<span class='error'>Votre Email est obligatoire</span>").fadeIn(800).insertAfter(inputEmail);
				}
				if(msg==3){
					$("<span class='error'>Votre Email n'est pas valide</span>").fadeIn(800).insertAfter(inputEmail);
				}
				if(msg==4){
					$("<span class='error'>Merci de me laisser un message</span>").fadeIn(800).insertAfter(inputComment);
				}
			}
	   }
	});
	
	return false;
});



/*
 * Chargement du DOM
 */
$(function() {
	app.init()
})