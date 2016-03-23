<?php
/**
* PHP qui s'occupe de la traduction d'un mot français en anglais
**/
require_once('./classes/TranslateEngine.class.php'); //Inclusion de la class qui gère la traduction

if(isset($_GET['mot'])){
	//On recupère le mot à traduire
	$mot = $_GET['mot'];
	$translator = new TranslateEngine();
	$english = $translator->translate($mot);

	//On vérifie que la valeur de retourn n'est pas nulle
	if(!is_null($english)){
		echo $english; //On renvoie le mot traduit
	}
	//else generata anothere word
 	
}

?>
