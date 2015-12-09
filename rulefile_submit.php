<?php

include("include/session.php");

$id = $_POST['id'];
$updateall = $_POST['updateall'];
$groupid = $_POST['groupid'];
$rulename = $_POST['rulename'];
$ruletxt = $_POST['ruletxt'];
   
try {

   $dbh = new PDO("mysql:host=$mysql_hostname;port=$mysql_port;dbname=$mysql_dbname", $mysql_username, $mysql_password);
   /*** $message = a message saying we have connected ***/

   /*** set the error mode to excptions ***/
   $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   if ($updateall == "Update All" && $groupid != 0) {
      $stmt = $dbh -> prepare("
      UPDATE rulefile
      SET ruletxt = :ruletxt
      WHERE programid = :programid
        AND rulename = :rulename;
      "); 
   } else {
      $stmt = $dbh -> prepare("
      UPDATE rulefile
      SET ruletxt = :ruletxt
      WHERE id = :id
        AND programid = :programid
        AND groupid = :groupid
        AND rulename = :rulename;
      "); 
      $stmt -> bindParam(':id', $id, PDO::PARAM_STR);                              
      $stmt -> bindParam(':groupid', $groupid, PDO::PARAM_STR);
   }

   $stmt -> bindParam(':programid', $programid, PDO::PARAM_STR);
   $stmt -> bindParam(':rulename', $rulename, PDO::PARAM_STR);
   $stmt -> bindParam(':ruletxt', $ruletxt, PDO::PARAM_STR);
          
   $stmt -> execute();      
               
   header('Location: rulefile.php?roletype=architect');

} catch(Exception $e) {
   $_SESSION['message'] = 'We are unable to process your request. Please try again later...'.$e;
   header("Location: error.php");
}
?>


<html lang="en">
<head>
   <title>Login Submit Page</title>
   
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   
   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />
   <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
   <script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>

<style>
</style>

<body>

</body>
</html>
          