<?php
//------------------- FONCTIONS MEMBRES --------------------------- //
function userConnected() {
	if(!empty($_SESSION['utilisateur'])) {
		return true;
	} else {
		return false;
	}
}
