<?php

include("include/session.php");

$programid = $_GET['programid'];
$groupid = $_GET['groupid'];
$factname = $_GET['factname'];
$rulename = $_GET['rulename'];
$facttype = "0";

try {
   
   $data = array(
   	'programid'=>$programid, 
	'groupid'=>$groupid, 
	'factname'=>$factname,
	'rulename'=>$rulename
   );
	
   $ch = curl_init();     
   $url = "http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/nudge".'?'.http_build_query($data);
   #$url = "http://127.0.0.1:7070/tnm/rest/nudge".'?'.http_build_query($data);
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HEADER, false); 
   if (($response=curl_exec($ch)) === false) {
     throw new Exception($url." has error ".curl_error($ch));
   }
   curl_close($ch);
   
   $data = array(
   	'programid'=>$programid, 
	'groupid'=>$groupid, 
	'factname'=>$factname
   );
   
   $ch = curl_init();     
   $url = "http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/fact/system".'?'.http_build_query($data);
   #$url = "http://127.0.0.1:7070/tnm/rest/fact/system".'?'.http_build_query($data);
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));   
   curl_setopt($ch, CURLOPT_HEADER, false); 
   if (($response=curl_exec($ch)) === false) {
     throw new Exception($url." has error ".curl_error($ch));
   }
   curl_close($ch);

   #$factjson=json_encode($response);
   #$factjson=$response;
   $factjson = json_decode($response, true);
   #echo $factjson;
   
   #$factjson=$response;
   
   #echo $factjson;
   
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

      <!-- Begin: factsout Page -->
      <section data-theme="a" id="pagefactsout" data-role="page" data-fullscreen="false">

         <script> writeHeader("backdonudge", "settings"); </script>

         <div data-role="content">
            <div class="content-primary" id="ruleOptions">
               <ul data-role="listview" data-filter="true" id="UserObsList" data-inset="true" >
                  <li data-role="divider">
                     <h4>Facts Out</h4>
                  </li>   
                  
               <?php 
               $i = 0;
			   foreach ($factjson as $fact) {
               ?>
                  <li data-name=<?php echo $i; ?> data-inset="true" style="font-weight:normal; white-space:normal; font-size:11px !important;">
                    <?php
                        echo json_encode($fact); 
                    ?>                                                           
                  </li>                   
               <?php 
                  $i = $i+1;
               } ?>
               
               </ul>
            </div>
         
         <script> writeFooter(); </script>
       
      </section>
      <!-- End: factsout Page -->

</body>

<script>

$('#nudge').click(function() {

});   
      
</script>

</html>
          