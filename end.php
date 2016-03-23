<!DOCTYPE html>

<html>
	<head>
		<meta charset='utf-8'>
		<title>Translator Game</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="./js/jquery.js"></script>
		<script type="text/javascript" src='./js/evaluate_request.js'></script>
		
	</head>

	<body>
		<div class='top'> </div>
		<div id='mainFrame'>
			<div id="wordPanel">
				
			

				
				<h1>THE END</h1>
				<div>
					<?php
						if(isset($_GET['state'])){
							echo $s = $_GET['state'] ;
							if($s==1){
								echo "<p>Bravo !!!!</p><p>Vous avez gagné</p>";
							} 
							else if($s==0){
								echo "<p>Game Over!!!!</p><p>Vous avez gagné</p>";
							}
						}
					?>
					<div><a href="./index.php"> Jouer une nouvelle partie </a></div>
				</div>

				
			
				
			</div>



		</div>
		<div class='bottom'> </div>
		
	</body>
	

	
</html>