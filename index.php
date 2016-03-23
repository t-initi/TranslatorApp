<!DOCTYPE html>

<html>
	<head>
		<meta charset='utf-8'/>
		<title>Translator Game</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="./js/jquery.js"></script>
		<script type="text/javascript" src='./js/evaluate_request.js'></script>
		
	</head>

	<body>
		<div class='top'> </div>
		<div id='mainFrame'>
			<p><button id='start'>Start</button></p>
			<div id="wordPanel">
				<h1> MOT  </h1>
				<?php /*
				$wordArray = array();
				$f = file("./verbe.txt");
				//print_r($f);
				

				foreach ($f as $key => $value) {
					$wordArray[$key] = preg_replace('/\s+/', '', $value);
					 
				}

				$rand = rand (0 , count($wordArray) );
				*/
				//echo "<h3 id='mot'>".$wordArray[$rand]." </h3>";
				?>
				<!--h3 id='mot'><?php  $wordArray[$rand] ?> </h3-->
				<h3 id='mot'></h3>

			

				


				
			</div>
			<div id="score">
					<span>10<span>
				
			</div>

			

			<div>
				<h2 class='sub_title'>AIDE MEMOIRE</h2>
				<div>
					
					<p>La première lettre est : <span id='engWord' ></span> <span id='fChar'></span></p>

					<p>Le nombre de caractère est :  <span id='nbChar'></span></p>
				</div>

				<h2 class='sub_title'>REPONSE</h2>
				<input type='text' id='resp' name='resp' >

				<p id='result'></p>
				<p id='resultCheck'></p>

			</div>

				<p><button id='vBT'>Valider</button></p>
				

			<div>
				
			</div>



		</div>
		<div class='bottom'> </div>
		
	</body>
	

	
</html>