<?php
// This controller acts as the go between the view and the model. 
//
//
//

//include 'model.php';  // for $theDBA, an instance of DataBaseAdaptor

//include 'register.php';
//include 'login.php';
//include 'addQuote.php';

 //check if input value was passed correctly to php
if(isset($_REQUEST['input'])){
$input = $_REQUEST['input'];
if($input == 'Register' ){
	header('location: register.php');
}
else if($input == 'Login'){ // call login function and show Login interface

	header('location: login.php');
}

else if($input == 'AddQuote'){// call add Quote function and show add Quote PHP page
	header('location: addQuote.php');
} 
else if($input == 'logout'){
	session_start();
	session_destroy();
	$id = $_COOKIE['userId'];
	setcookie('userId',$id,time()-1);
	header('location: index.php');
}
else if($input == 'UnflagAll'){
	include 'model.php';
	$theDBA->unflag();
	header('location: index.php');
}
else if($input == 'upRank'){
	$quoteId = $_REQUEST['quoteId'];
 	include 'model.php';
	$theDBA->upRankVote($quoteId); 
} 
else if($input == 'deRank'){
	$quoteId = $_REQUEST['quoteId'];
	include 'model.php';
	$theDBA->deRankVote($quoteId);
}
else if($input == 'setFlag'){
	$quoteId = $_REQUEST['quoteId'];
	include 'model.php';
	$theDBA->setFlag($quoteId);
}
}


?>