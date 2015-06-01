<?php
//------------------- FONCTIONS MEMBRES --------------------------- //
function userConnected() {
	if(!empty($_SESSION['utilisateur'])) {
		return true;
	} else {
		return false;
	}
}

function userAdmin() {
	if(userConnected() && $_SESSION['utilisateur']['statut'] == 1) {
		return true;
	} else {
		return false;
	}
}

//------------------- FONCTIONS DIVERS --------------------------- //
function checkExtensionPhoto() {
	$extension = strRchr($_FILES['photo']['name'], '.'); // strRchr() trouve le dernier caractère indiqué, et donne la chaine de caractère à partir de ce qu'on lui a indiqué (ici un point) 
	//debug($extension);
	$extension = strToLower($extension); // passage en minuscule 
	$extension = subStr($extension, 1); // on enlève le point
	$tabExtensionsValide = array('jpg', 'jpeg', 'png', 'gif');
	$verifExtension = in_array($extension, $tabExtensionsValide); // nous verifions si l'extension est présente dans notre tableau $tabExtensionValide 
	return $verifExtension; // nous retournons TRUE ou FALSE (true si l'extension est présente dans notre tableau, false si elle n'est pas présente )
}