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
	<input class = "submitDec" type = "submit" name = "input" value = "logout">
	</form>
</div>
<div class = "clearBoth" id="quotes"></div>




<?php
	include 'model.php';

	if(isset($_COOKIE['userId'])){
		$id = $_COOKIE['userId'];
		//show logout button
		echo 
		'<script>
		    document.getElementById("buttons").style.display = "inline";
		</script>';
		
		$str = '';
		$arr = $theDBA->checkLogin();
		$quotes = $theDBA->joinQuotes($id);
			for($i = 0;$i < sizeof($quotes);$i++){
				if($quotes{$i}{'flag'} == 0){
				$str .= '<div class = "container">"'. $quotes{$i}{'phrase'}. '"<br>'. 
						'<span class = "author">---' . $quotes{$i}{'author'}. '</span><br>' .
						'Rank = ' . $quotes{$i}{'rank'} . ' ' .
						'flag = ' . $quotes{$i}{'flag'} . '<br> </div>';
			}
		}
	}
/* 		echo 
		'<script>
			var str = "<?php echo $str ?>";
			document.getElementById("quotes").innerHTML = str;	
		
		
		</script>
		' */
	else{

		$quotes = $theDBA->getAllQuotes();
		$str = '';
		for($i = 0;$i < sizeof($quotes);$i++){
			if($quotes{$i}{'flag'} == 0){
				$str .= '<div class = "container">"'. $quotes{$i}{'phrase'}. '"<br>'.
						'<span class = "author">---' . $quotes{$i}{'author'}. '</span><br>' .
						'Rank = ' . $quotes{$i}{'rank'} . ' ' .
						'flag = ' . $quotes{$i}{'flag'} . '<br> </div>';
			}
		}
	}
	echo  $str;

?>
<script>
	var divToChange = document.getElementById("toChange");
	function mode(input){
	var anObj = new XMLHttpRequest();
	input = input.defaultValue;

	anObj.open("GET","controller.php?mode=" + input, true);
	anObj.send();
	
	anObj.onreadystatechange = function() {
             //render output data
	} 
			
	}
</script>

</body>
</html>