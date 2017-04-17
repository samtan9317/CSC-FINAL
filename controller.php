<?php
// This controller acts as the go between the view and the model. 
//
//
//
include 'model.php';  // for $theDBA, an instance of DataBaseAdaptor
include 'register.php';
include 'login.php';
include 'addQuote.php';

//    Refresh/Update Original HTML
echo  json_encode($arr);
?>