<?php

/*** begin our session ***/
session_start();

$userid = "";
$programid = "";

if ( isset($_GET['userid']) ) {
   $userid = $_GET['userid'];
} else if ( isset($_SESSION['userid']) ) {
   $userid = $_SESSION['userid'];
}    
if ( isset($_GET['programid']) ) {
   $programid = $_GET['programid'];
} else if ( isset($_SESSION['programid']) ) {
   $programid = $_SESSION['programid'];
}  

if ( isset($_SESSION['programname']) ) {
   $programname = $_SESSION['programname'];
}  
if ( isset($_SESSION['username']) ) {
   $username = $_SESSION['username'];
}  

$roletype = 'participant';
if ( isset($_GET['roletype']) ) {
   $roletype = $_SESSION['roletype'];
} else if ( isset($_SESSION['roletype']) ) {
   $roletype = $_SESSION['roletype'];
} 

if ( strlen($userid) < 1 || strlen($programid) < 1 ) {
   $message = 'You must be logged in to access this page';
   header('Location: login.php');
}

include("include/db.php");

?>
