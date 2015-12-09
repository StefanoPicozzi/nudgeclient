<?php

include("include/session.php");

$programid = $_GET['programid'];
$groupid = $_GET['groupid'];
$factname = $_GET['factname'];
$facttype = $_GET['facttype'];
$factjson = $_GET['factjson'];

$data = array(
	'programid'=>$programid, 
	'groupid'=>$groupid, 
	'factname'=>$factname,
	'facttype'=>$facttype,
	'factjson'=>$factjson);

$datajson = json_encode($data);

$url = "http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/fact";
#$url = "http://localhost:8080/tnm/rest/fact";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datajson);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
curl_close($ch);
              
   header('Location: NudgeAPI.php');
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

   <div data-role="header">
       <h1>User Diary Page</h1>
   </div>        

   <textarea disabled="disabled" data-mini="true" cols="40" rows="8" name="textarea-4" id="textarea-4">
      
<?php echo "Observation attempt for userid=".$userid." in program=".$programid." for obsname=" .$obsname. " with entry=".$obsvalue." failed. ".$message; ?>

   </textarea>


</body>
</html>
          