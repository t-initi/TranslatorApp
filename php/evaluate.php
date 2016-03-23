<?php
require_once("./classes/TranslateEngine.class.php");

if(isset($_GET['mot']) && isset($_GET['resp'])){
	$mot=$_GET['mot'];
	$resp =$_GET['resp'];

	

	$engine = new TranslateEngine();
	//echo "<h1>".$english = $engine->translate2("fr","en","aimer")."</h1>";
	$engine->evaluate($resp, $mot);
}




?>