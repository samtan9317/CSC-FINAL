
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

if(isset($_COOKIE['userId'])){
	echo
	'<script>
		   document.getElementById("AddTheQuote").style.display = "inline";
	</script>';
	
	if(isset($_POST['addQuote'])){
		include 'model.php';
		include 'login.php';
		$quote = $_POST['quote'];
		$author = $_POST['author'];
	
		$user = $_COOKIE['userId'];
	
		$theDBA->addNewQuote($quote, $author, $user);
		
		header("location: index.php");
	
	}
}
else {
	print_r("<h1>Login Required!</h1>");
}

?>

</body>
</html>




