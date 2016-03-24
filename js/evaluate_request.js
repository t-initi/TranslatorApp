$(document).ready(function(){
	var point = $('#score span');
	var start = $("#start");
	var validBt = $("#vBT");

	var wordArray= new Array();

	validBt.slideUp(1000);
	//Initialise l'array des mots
	loadArray();
	start.click(function(){
		pickRandomWord();
		start.slideUp(1000,"swing");
		start.css({
			"display" : "none"
		});
		loadHideEnglishWord();
		validBt.slideDown("fast");

	});
	

	validBt.click(function(){
		
		var mot = $('#engWord').text();
		var fChar = $('#fChar').text();
		var resp = $('#resp').val();
		//alert( "Mot=|"+mot+"|"+resp+"|");

		//alert(mot);

		$.ajax({
			url: "./php/evaluate.php/?mot="+mot+"&resp="+resp,
			
			success : function(data){
				$("#result").html(data);
				$("#resultCheck").html(data);
				var res = parseInt($("#resultCheck").html());
				//alert(data);

				if(res==1){
						incrementPoint();
					}else{
					$("#result").html("La bonne réponse était "+$('#engWord').html());
						decrementPoint();
				}

			}

		});
		pickRandomWord();
		loadHideEnglishWord();

	});

	

	//Function incremente point
	function incrementPoint(){
		var p = parseInt(point.html());
		p++;
		point.html("");
		point.html(p);

		if(p==20){
			//Fin du jeu : joueur a gagné
			window.location.href= "./endwon.php";
				//alert("Fin du jeu : joueur a gagné");
		}
		

	}
	//Function decremente point
	function decrementPoint(){
		var p = parseInt(point.html());
		p--;
		point.html("");
		point.html(p);

		if(p==0){
			//Fin du jeu le joueur a perdu
			//alert("Fin du jeu : joueur a perdu");
			window.location.href= "./endlost.php";
		}
	}

	function loadArray(){
		$.get('./verbe.txt', function(data){
			var lines =data.split("\n");
			$.each(lines, function(key, value){
				wordArray[key]=value;
			});

		});
		pickRandomWord();
	}

	function pickRandomWord(){
		var randomWordNumber = Math.floor(Math.random() * wordArray.length);
		$("#mot").html(wordArray[randomWordNumber]);
		//return wordArray[Math.rand(0,7000)];
	}

	function loadHideEnglishWord(){
		var word = $('#mot').text();
		var fChar = $('#fChar');
		var nbChar = $('#nbChar');


		$.ajax({
			url: './php/translate.php/?mot='+word,
			success: function(data){
				$('#engWord').html(data);

				//si on ne trouve pas de traduction
				if($('#engWord').html()=="null"){
					pickRandomWord(); //On charge un autre mot
					loadHideEnglishWord();
				}else{
					var res = $('#engWord').text().charAt(0).toUpperCase();
					//$('#engWord').html(res);
					fChar.html(res);
					nbChar.html($('#engWord').text().length);
				}


				
				

			}

		});

	}



	
});