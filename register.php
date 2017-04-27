
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
Username<input style = "margin:5px" type = "text" pattern = ".{4,}" name = "username"><br>
Password <input style = "margin:5px" type = "password" pattern = ".{6,}" name = "password"><br>
<input style = "margin:10px" type = "submit" name = "login" value = "Create Account">
</form>
</div>
<div id = "missUser"></div>
<?php
if(isset($_POST['login'])){
	include 'model.php';
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$arr = $theDBA->checkLogin();
	for($i = 0; $i<sizeof($arr);$i++){
		
		if($_POST['username'] == $arr{$i}{'account_name'}){
			
			$found = 1;
			break;
		}
	}
	if(sizeof($user) < 4 || sizeof($pass) < 4){
		print_r("<div class = 'clearBoth' >Username too small</div>");
	}
	else if($found == 1){
		print_r("<div class = 'clearBoth' >Username is already taken!!</div>");
	}
	else{
	$theDBA->addNewUser($user, $pass);	
	header("location: index.php");
	}
}

?>

</body>
</html>



