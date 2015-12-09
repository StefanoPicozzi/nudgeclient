<?php

include("include/session.php");
include('include/hit.php');

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

<!-- Begin: donudge Page -->
<section id="pagedonudge" data-role="page">

   <script> writeHeader("backsettings", "home"); </script>
     
   <div class="content" data-role="content">

      <form id="register" action="factsin.php" method="get" rel="external" data-ajax="false"> 
         <div data-role="fieldcontain">
            
          <fieldset data-role="controlgroup">
            <legend>Userobs Selection</legend>
            
            <div data-role="fieldcontain">
            <label for="obsname">Obs Name:</label>
               <input type="text" name="obsname" id="obsname" value="weight" />
            </div>

            <div data-role="fieldcontain">
            <label for="obsname">Rule Name:</label>
               <input type="text" name="rulename" id="obsname" value="weight" />
            </div>
            
            <div data-role="fieldcontain">
            <label for="startdate">User ID:</label>
               <input type="text" name="userid" id="userid" value="97" />
            </div>

            <div data-role="fieldcontain">
            <label for="startdate">Start Date:</label>
               <input type="date" name="startdate" id="startdate" value="2015-04-10" />
            </div>

            <div data-role="fieldcontain">
            <label for="enddate">End Date:</label>
               <input type="date" name="enddate" id="enddate" value=<?php echo date('Y-m-d'); ?>  />
            </div>
            
          </fieldset>
                  
           <center>
              <input type="button" id="cancel" name="cancel" class="cancel" value="Cancel" data-inline="true">
              <input type="submit" name="nudge" id="nudge" value="Select" data-inline="true">
           </center>

         </div>
         </form>
         
   </div>
   
   <script> writeFooter(); </script>

</section>
<!-- End: donudge Page -->

<script>

</script>

   </body>
</html>

          