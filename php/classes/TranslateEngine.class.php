<?php
/**
*	Classe PHP gérant la traduction de mot en anglis en utilisant CURL
**/
class TranslateEngine{

	//private $playerScore = 10;
	private $timeout =30;
	private $wordArray;
	private $ch;

	function __construct() {
		libxml_use_internal_errors(true);
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_FRESH_CONNECT, true); // force à utiliser une connexion au lieu de celle en cache
		curl_setopt($this->ch, CURLOPT_TIMEOUT, $this->timeout); // temps maximal de la fonction d'exécution curl
		curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, $this->timeout); // nombre de secondes à attendre durant la tentative de connexion
		curl_setopt($this->ch, CURLOPT_USERAGENT, 'Mozilla/5.0'); // Le contenu de l'en-tête "User-Agent: " à utiliser dans une requête HTTP
		//curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded;charset="utf-8"'));
		/**
		 * TRUE pour suivre toutes les en-têtes "Location" que le serveur envoie dans les en-têtes HTTP
		 */
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
		 /* TRUE retourne directement le transfert sous forme de chaîne de la valeur retournée
		 par curl_exec au lieu de l'afficher directement. */
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);

		 // Forcer cURL à utiliser un nouveau cookie de session
		curl_setopt($this->ch, CURLOPT_COOKIESESSION, true);
		 // Site sécurisé
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($this->ch, CURLOPT_COOKIEFILE, 'cookies.txt');

	}

	/**Traduit un mot en anglais et retourn le mot
	* Sinon retourn null en cas d'érreur
	**/
	function translate($word){
		
		//$url = "https://translate.google.com/translate_a/single?client=t&sl=en&tl=fr&hl=fr&dt=at&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&ie=UTF-8&oe=UTF-8&otf=1&srcrom=1&ssel=0&tsel=0&kc=1&tk=50916.452672&q=r";
		//$url ="http://www.bing.com/translator/?from=fr&to=en&text=".$word;
		$url = "http://www.systranet.com/dictionary/fr-en/".$word;
		$url = htmlentities($url);

		curl_setopt($this->ch, CURLOPT_URL, $url);
		$content = curl_exec($this->ch);
		$dom = new DOMDocument();
		$dom->loadHTML($content);
		//echo $dom->saveHTML();
		
		//Chemin au mot : dl_dict_area -> div1 -> span1
		$target =$this->getElementsByClassName("dl_dict_area",$dom);
		if(!isset($target[1])){
			//return null;
			return $word;
		 
		}else{
			$div1 =$target[1]->getElementsByTagName('div')->item(1);
		$span2 = $div1->getElementsByTagName('span')->item(1);
		//echo $span2->nodeValue;
		return $englishWord = preg_replace("/to /",'', $span2->nodeValue);
		}
		
		
	}

	//Récupere un element HTML par son attribut class
	function getElementsByClassName($name, $doc) {
	    global $xpath;
	    $nodes = array();
	    $xpath = new DOMXPath($doc);
	    $elements = $xpath->query(sprintf("//div[contains(@class, '%s')]", $name));
	    foreach ($elements as $e) {
	      array_push($nodes, $e);
	    }
	    return $nodes;
  	}

	
  	//Verifie que deux mot son similaire return 1=vrai ou 0=Faux
	function evaluate($a, $b){
		//On suprime les espaces
		$a = str_replace(' ', '', $a);
		$b  = str_replace(' ', '', $b);
		if(strcasecmp($a, $b) ==0){
		echo "1";
		//return true;
		}
		else{
			echo "0";
		//return false;
		}
	}

	/*
	function initWordArray(){
		$this->wordArray = array();
				$f = file("verbe.txt");
				//print_r($f);
				foreach ($f as $key => $value) {
					$this->wordArray[$key] = trim($value);
					 
				}

				
	}

	
	function addPoint(){
		$this->playerScore++;
	}

	function removePoint(){
		$this->playerScore++;
	}

	

	function getScore(){
		return $this->playerScore;
	}

	function getRandomWord(){
			//echo "<h3 id='mot'>".$wordArray[$rand]." </h3>";
		$rand = rand (0 , count($this->wordArray) );
		return $this->wordArray[$rand];
			
	}*/







}

?>
