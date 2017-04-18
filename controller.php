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

/* $input = $_GET['input'];
if($input == 'Register' ){
	header('location: register.php');
}
else if($input == 'Login'){ // call login function and show Login interface

	header('location: login.php');
}

else if($input == 'AddQuote'){// call add Quote function and show add Quote PHP page
	header('location: addQuote.php');
} */
if(isset($_POST['register_button']) ){
	header('location: register.php');
}
else if(isset($_POST['login_button'])){ // call login function and show Login interface
	
	header('location: login.php');
}

else if(isset($_POST['addQuote_button'])){// call add Quote function and show add Quote PHP page
	header('location: addQuote.php');
}
//    Refresh/Update Original HTML
?>