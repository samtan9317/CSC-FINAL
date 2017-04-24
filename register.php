
<!DOCTYPE html>
<!--


-->
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
<link href = "style.css" rel = "stylesheet" type = "text/css">
</head>
<body>
<h1>Register</h1>
<div class = "loginCon" >
<form action = '' method = "post">
Username<input style = "margin:5px" type = "text" name = "username"><br>
Password <input style = "margin:5px" type = "password" name = "password"><br>
<input style = "margin:10px" type = "submit" name = "login" value = "Create Account">
</form>
</div>
<div id = "missUser"></div>
<?php
if(isset($_POST['login'])){
	include 'model.php';
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$theDBA->addNewUser($user, $pass);	
	
	header("location: index.php");
}

?>

</body>
</html>



