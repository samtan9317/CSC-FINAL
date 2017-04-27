<!DOCTYPE html>
<!--


-->
<html>
<head>
<meta charset="UTF-8">
<title>Quotation Service</title>
<link href = "style.css" rel = "stylesheet" type = "text/css">
</head>
<body>
<hr>
<h2><i>Quotation Service</i></h2>
<form action = "controller.php" method = "post">
<input class = "buttonDec" type = "submit" name = "input" value = "Register">
<input class = "buttonDec" type = "submit" name = "input" value = "Login">
<input class = "buttonDec" type = "submit" name = "input" value = "AddQuote">
</form>
<div id = "buttons" style = "display:none">
	<form class = "clearBoth" action = "controller.php" method = "post">
	<input class = "submitDec" type = "submit" name = "input" value = "UnflagAll">
	<input class = "submitDec" type = "submit" name = "input" value = "logout">
	</form>
</div>
<div class = "clearBoth" id="quotes"></div>




<?php
	include 'model.php';
//	$theDBA->encrypt();
	if(isset($_COOKIE['userId'])){
		$id = $_COOKIE['userId'];
		//show logout button
		echo 
		'<script>
		    document.getElementById("buttons").style.display = "inline";
		</script>';
	}

		$quotes = $theDBA->getAllQuotes();
		$str = '';
		for($i = 0;$i < sizeof($quotes);$i++){
			if($quotes{$i}{'flag'} == 0){
				$str .= '<div class = "container">"'. $quotes{$i}{'phrase'}. '"<br>'.
						'<span class = "author">---' . $quotes{$i}{'author'}. '</span><br>' .
						'<input type = "button" onclick = "upRank(this)" id = ' . $quotes{$i}{'quoteId'}. ' value = "+"> ' . $quotes{$i}{'rank'} . ' ' .
						'<input type = "button" onclick = "deRank(this)" id = ' . $quotes{$i}{'quoteId'}. ' value = "-"> <input type = "button" onclick = "setFlag(this)" id = ' . $quotes{$i}{'quoteId'}. ' value = "Flag"><br></div>';
							}
		}

	echo  htmlspecialchars($str);

?>
<script>
/* 	function changeColor($input){
		debugger;
			document.getElementbyId($input).style.backgroundColor = "orange";

	} */
	function upRank(input){
		var anObj = new XMLHttpRequest();
		var quoteId = input.id;
		
		anObj.open("POST","controller.php?input="+ 'upRank' + '&quoteId=' + quoteId, true);
		anObj.send();
		
		anObj.onreadystatechange = function() { 
		if(anObj.readyState == 4 && anObj.status == 200){
			location.reload();
		  }
		} 		
	}
	function deRank(input){
		var anObj = new XMLHttpRequest();
		var quoteId = input.id;
	
		anObj.open("POST","controller.php?input="+ 'deRank' + '&quoteId=' + quoteId, true);
		anObj.send();
		
		anObj.onreadystatechange = function() { 
		if(anObj.readyState == 4 && anObj.status == 200){
			location.reload();
		  }
		} 		
	}
	function setFlag(input){
		var anObj = new XMLHttpRequest();
		var quoteId = input.id;
	
		anObj.open("POST","controller.php?input="+ 'setFlag' + '&quoteId=' + quoteId, true);
		anObj.send();
		
		anObj.onreadystatechange = function() { 
		if(anObj.readyState == 4 && anObj.status == 200){
			location.reload();
		  }
		} 		
	}
</script>

</body>
</html>