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

include("include/db.php");

?>
