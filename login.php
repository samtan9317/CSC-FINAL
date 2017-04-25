
<!DOCTYPE html>
<!--


-->
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link href = "style.css" rel = "stylesheet" type = "text/css">
</head>
<body>
<h1>Login</h1>
<div class = "loginCon" >
<form action = '' method = "post">
Username<input style = "margin:5px" type = "text" name = "username"><br>
Password <input style = "margin:5px" type = "password" name = "password"><br>
<input style = "margin:10px" type = "submit" name = "login" value = "Login">
</form>
</div>
<div id = "missUser"></div>
<?php
if(isset($_POST['login'])){
	include 'model.php';
	$str = '';
	$found = 0;
	$arr = $theDBA->checkLogin();
	for($i = 0; $i<sizeof($arr);$i++){
		
		if($_POST['username'] == $arr{$i}{'account_name'} and (password_verify($_POST['password'], $arr{$i}{'password'})) == 1){

			$found = 1;
			$id = $arr{$i}{'id'};
			setcookie('userId',$id,time()*60); //set cookie to last for 7 days
			//$quotes = $theDBA->getUserQuotes($id);
		}
	}
	if($found == 0){
		print_r("<div class = 'clearBoth' >User does not exist!!</div>");
	}
	else{
		session_start();
		$_SESSION[$id] = $id;
		header('location: index.php'); 
	
	}
}

?>

</body>
</html>


