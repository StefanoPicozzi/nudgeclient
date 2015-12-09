<?php

include("include/session.php");

$userid = $_GET['userid'];
$obsname = $_GET['obsname'];
$rulename = $_GET['rulename'];
$obsvalue = $_GET['obsvalue'];
$startdate = $_GET['startdate'];
$enddate = $_GET['enddate'];
$factname = $obsname;

try {

   $dbh = new PDO("mysql:host=$mysql_hostname;port=$mysql_port;dbname=$mysql_dbname", $mysql_username, $mysql_password);
   /*** $message = a message saying we have connected ***/

   /*** set the error mode to excptions ***/
   $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   /* Find the last completed question for this user */

   $stmt = $dbh -> prepare("
      SELECT
        u.username AS :username,
        uo.obsvalue AS :obsvalue,
        uo.obsdate AS :obsdate,
        uo.obsdesc AS :obsdesc
      FROM userobs uo, user u
      WHERE uo.programid = :programid
       AND  uo.userid = :userid
       AND  u.userid = :userid
       AND  uo.userid = u.userid
       AND  obsname = :obsname
       AND  obsdate between :startdate and :enddate
      ");

   /*** bind the parameters ***/
   $username = "";
   $obsvalue = "";
   $obsdate = "";
   $obsdesc = "";
   $stmt -> bindParam(':userid', $userid, PDO::PARAM_STR);
   $stmt -> bindParam(':programid', $programid, PDO::PARAM_STR);
   $stmt -> bindParam(':username', $username, PDO::PARAM_STR);
   $stmt -> bindParam(':obsname', $obsname, PDO::PARAM_STR);
   $stmt -> bindParam(':obsvalue', $obsvalue, PDO::PARAM_STR);
   $stmt -> bindParam(':obsdate', $obsdate, PDO::PARAM_STR);
   $stmt -> bindParam(':obsdesc', $obsdesc, PDO::PARAM_STR);
   $stmt -> bindParam(':startdate', $startdate, PDO::PARAM_STR);
   $stmt -> bindParam(':enddate', $enddate, PDO::PARAM_STR);
      
   $stmt -> execute();
   $count = $stmt->rowCount();
   if ( $count < 1) {
      $_SESSION['message'] = 'No userobs selected';
      header("Location: error.php");
   }
   
   $groupid = $userid;
   $factname = $obsname;
   $facttype = "1";
   
   $data = array(
   	'programid'=>$programid, 
	'groupid'=>$groupid, 
	'factname'=>$factname);
	
   $ch = curl_init();     
   $url = "http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/fact/del".'?'.http_build_query($data);
   #$url = "http://127.0.0.1:7070/tnm/rest/fact/del".'?'.http_build_query($data);
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HEADER, false); 
   if (($response=curl_exec($ch)) === false) {
   	  throw new Exception($url.' has error '.curl_error($ch));
   }
   curl_close($ch);
     
   $ch = curl_init();       
   $url = "http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/fact";
   #$url = "http://127.0.0.1:7070/tnm/rest/fact";
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $datajson);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   
   $i = 0;
   while ($row = $stmt->fetch(PDO::FETCH_NUM)) {

      $username[$i] = $row[0];
      $obsvalue[$i] = $row[1];
      $obsdate[$i] = $row[2];
      $obsdesc[$i] = $row[3];
                                
      $factJSON[$i] = " {";
      $factJSON[$i] = $factJSON[$i].'"username" : "'.$username[$i].'", ';
      $factJSON[$i] = $factJSON[$i].'"obsname" : "'.$obsname.'", ';
      $factJSON[$i] = $factJSON[$i].'"obsdate" : "'.$obsdate[$i].'", ';
      $factJSON[$i] = $factJSON[$i].'"obsvalue" : "'.$obsvalue[$i].'", ';
      $factJSON[$i] = $factJSON[$i].'"obsdesc" : "'.$obsdesc[$i].'"  ';      
      $factJSON[$i] = $factJSON[$i]." }"; 

      $factjson = $factJSON[$i];

      $data = array(
	  	'programid'=>$programid, 
		'groupid'=>$groupid, 
		'factname'=>$factname,
		'facttype'=>$facttype,
		'factjson'=>$factjson);

   	  $datajson = json_encode($data);

 	  curl_setopt($ch, CURLOPT_POSTFIELDS, $datajson);
      if (($response=curl_exec($ch)) === false) {
   	    throw new Exception($url." has error ".curl_error($ch));
      }
             		  
      $i = $i+1;
   }

  curl_close($ch);
 
  header('Access-Control-Allow-Origin: *');
  
} catch(Exception $e) {
   $_SESSION['message'] = 'We are unable to process your request. Please try again later...'.$e;
   header("Location: error.php");
}
?>

<!doctype html>
<!--[if IE 7 ]>       <html class="no-js ie ie7 lte7 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 8 ]>       <html class="no-js ie ie8 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 9 ]>       <html class="no-js ie ie9 lte9>" lang="en-US"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en-US">
   <!--<![endif]-->

<html lang="en">
   <head>
      <title>The Nudge Machine</title>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/themes/nudgetheme.min.css" />
      <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
      <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0/jquery.mobile.structure-1.4.0.min.css" />
      <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
      
      <link rel="stylesheet" href="css/nudge.css" />      
      <script src="js/nudge.js"  ></script>  
   </head>
   <body>

      <!-- Begin: Home Page -->
      <section data-theme="a" id="pageUserObs" data-role="page" data-fullscreen="false">

         <script> writeHeader("backdonudge", "settings"); </script>

         <div data-role="content">
            <div class="content-primary" id="ruleOptions">
               <ul data-role="listview" data-filter="true" id="UserObsList" data-inset="true" >
                  <li data-role="divider">
                     <h4>Facts In</h4>
                  </li>   
                           
               <?php 
               $i = 0;
			   foreach ($factJSON as $fact) {
               ?>
                  <li data-name=<?php echo $i; ?> data-inset="true" style="font-weight:normal; white-space:normal; font-size:11px !important;">
                    <?php echo $fact; ?>                                                           
                  </li>                   
               <?php 
                  $i = $i + 1;
               } ?>
              
               </ul>
            </div>

      <form id="register" action="factsout.php" method="get"  rel="external" data-ajax="false"> 
         <div data-role="fieldcontain">

           <center>                      
          <fieldset data-role="controlgroup">

          <input type="hidden" name="programid" id="programid" value=<?php echo $programid; ?> >
          <input type="hidden" name="groupid" id="groupid" value=<?php echo $groupid; ?> >
          <input type="hidden" name="factname" id="factname" value=<?php echo $factname; ?> >
          <input type="hidden" name="rulename" id="rulename" value=<?php echo $rulename; ?> >

          </center>  
          
          <center>                                                  
              <input type="submit" name="Nudge" id="nudge" value="Nudge" data-inline="true">
           </center>
           
          </fieldset>
         </div>
         </form>
         
         <script> writeFooter(); </script>
       
      </section>
      <!-- End: userObs Page -->

</body>

<script>
   
$('#nudge').click(function() {
});   
   
   
</script>

</html>
          