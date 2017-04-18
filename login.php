<!DOCTYPE html>
<!--


-->
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<h1>Login</h1>
<div>
<form action = '' method = "get">
Username<input type = "text" name = "username"><br>
Password <input type = "password" name = "password"><br>
<input type = "submit" name = "login" value = "Login">
</form>
</div>
<div id = "missUser"></div>
<?php
if(isset($_GET['login'])){
	include 'model.php';
	$str = '';
	$found = 0;
	$arr = $theDBA->checkLogin();
	for($i = 0; $i<sizeof($arr);$i++){
		
		if($_GET['username'] == $arr{$i}{'account_name'}){
			if($_GET['password'] == $arr{$i}{'password'}){
			$found = 1;
			$id = $arr{$i}{'id'};
			$quotes = $theDBA->getUserQuotes($id);
			for($i = 0;$i < sizeof($quotes);$i++){
				$str .= 'Rank = ' . $quotes{$i}{'rank'} . ' ' .
						'flag = ' . $quotes{$i}{'flag'} . '<br>' .
						'Quotes: <br>' . $quotes{$i}{'phrase'};
			}
			}	
		}
	}
	if($found == 0){
		print_r("User does not exist!!");
	}
	else{
		print_r($str);
		/* session_start();
		$_SESSION[$str];
		header('location: view.html'); */
	
	}
}

?>

</body>
</html>