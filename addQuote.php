
<!DOCTYPE html>
<!--


-->
<html>
<head>
<meta charset="UTF-8">
<title>Add Quote</title>
<link href = "style.css" rel = "stylesheet" type = "text/css">
</head>
<body>
<h1>Add Quote</h1>

<div id = "AddTheQuote" style = "display:none">
<div class = "loginCon" >
<form action = '' method = "post">
Quote   <input class = "Quotes" style = "margin:5px" type = "text" name = "quote"> <br>
Author <input style = "margin:5px" type = "text" name = "author"><br>
<input style = "margin:10px" type = "submit" name = "addQuote" value = "Add Quote">
</form>
</div>
</div>
<div id = "missUser"></div>
<?php

	echo
	'<script>
		   document.getElementById("AddTheQuote").style.display = "inline";
	</script>';
	if(isset($_POST['addQuote'])){
	if($_POST['quote'] != NULL and $_POST['author'] != NULL){
		include 'model.php';
		include 'login.php';
		$quote = $_POST['quote'];
		$author = $_POST['author'];
	
		$user = $_COOKIE['userId'];
	
		$theDBA->addNewQuote($quote, $author, $user);
		
		header("location: index.php");
	
		}
	
	else {
		print_r('<div class = "clearBoth">Please enter both quotes and author correctly.</div>');
	}
}

?>

</body>
</html>




