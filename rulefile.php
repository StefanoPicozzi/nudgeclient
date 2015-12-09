<?php

include("include/session.php");
include('include/hit.php');

if (!isset($_GET['roletype'])) {
   $message = 'You must select a roletype to access this page';
   header('Location: index.php');
}
$urltype = $_GET['roletype'];

try {

   $dbh = new PDO("mysql:host=$mysql_hostname;port=$mysql_port;dbname=$mysql_dbname", $mysql_username, $mysql_password);
   /*** $message = a message saying we have connected ***/

   /*** set the error mode to excptions ***/
   $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   /* Find the last completed question for this rulefile */

   $stmt = $dbh -> prepare("
      SELECT
         rf.id AS :id,
         rf.groupid AS :groupid,
         rf.rulename AS :rulename,
         rf.ruletxt AS :ruletxt
      FROM
         rulefile rf
      WHERE rf.programid = :programid 
      ORDER by groupid ASC;");

   /*** bind the parameters ***/
   $id = "";
   $groupid = "";
   $rulename = "";
	$ruletxt = "";
   
   $stmt -> bindParam(':id', $id, PDO::PARAM_STR);
   $stmt -> bindParam(':groupid', $groupid, PDO::PARAM_STR);
   $stmt -> bindParam(':programid', $programid, PDO::PARAM_STR);
   $stmt -> bindParam(':rulename', $rulename, PDO::PARAM_STR);
   $stmt -> bindParam(':ruletxt', $ruletxt, PDO::PARAM_STR);
          
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

   <!-- Begin: rulefile Page -->
   <section data-theme="a" id="pagerulefile" data-role="page" data-fullscreen="false">

      <script> writeHeader("backsettings", "home"); </script>

         <div data-role="content">
            <div class="content-primary" id="RuleFile">
               <ul data-role="listview" data-filter="true" id="rulefileList" data-inset="true" >
                  <li data-role="divider">
                     <h4>Rule Files</h4>
                  </li>   
                           
               <?php $stmt->execute();
               while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                  $id = $row[0];
                  $groupid = $row[1];
                  $rulename = $row[2];
                  $ruletxt = $row[3];
               ?>
                  <li data-name="<?php echo "rulefile".$id; ?>" data-inset="true" >                       
                     <a href="#pageupdate" data-ajax="false" >
                     <div class="ui-grid-b">     
                        <div class="ui-block-a" style="font-weight:normal; width:20%; !important;">
                           <img src="images/rulefile.png"  style="width: 40px; height: 40px;" title="rulefile" alt="rulefile" class="ui-li-thumb">
                        </div>
                        <div class="ui-block-b" style="font-weight:normal; width:50%;!important;">                         
                           <?php echo $groupid." - ".$rulename; ?>
                        </div>
                     </div>
                     <input readonly="true" type="hidden" id=<?php echo '"rulefile'.$id.'_id"';?> value=<?php echo '"'.$id.'"'; ?> >
                     <input readonly="true" type="hidden" id=<?php echo '"rulefile'.$id.'_groupid"';?> value=<?php echo '"'.$groupid.'"'; ?> >
                     <input readonly="true" type="hidden" id=<?php echo '"rulefile'.$id.'_rulename"';?> value=<?php echo '"'.$rulename.'"'; ?> >
                     <input readonly="true" type="hidden" id=<?php echo '"rulefile'.$id.'_ruletxt"';?> value=<?php echo "'".$ruletxt."'"; ?> >
                     </a>
                  </li>                   
               <?php } ?>
              
               </ul>
            </div>
         </div>

      <script> writeFooter(); </script>

   </section>
<!-- End: rulefile Page -->
         
<!-- Begin: update Page -->
<section id="pageupdate" data-role="page" > 

   <script> writeHeader("backrulefile", "settings"); </script>
     
   <div class="content" data-role="content">
      
      <form id="update_form" action="rulefile_submit.php" method="post" rel="external" data-ajax="false"> 
         <div data-role="fieldcontain">
            <h3>Rulefile Contents</h3>

            <input readonly="true" type="hidden" id="all" name="all" class="all" value="">       
            <input readonly="true" type="hidden" id="id" name="id" class="id" value="">       
            <input readonly="true" type="hidden" id="groupid" name="groupid" class="groupid">
            <input readonly="true" type="hidden" id="rulename" name="rulename" class="rulename">

            <textarea id="line_numbers" name="ruletxt" class="ruletxt" style="height:50px;max-height:50px;overflow:auto;font-size:11px;font-style:normal;">
            </textarea>

            <center>
               <input type="submit" id="update" name="update" class="update" value="Update" data-inline="true">
               <input type="submit" id="updateall" name="updateall" class="updateall" value="Update All" data-inline="true">
            </center>

         </div>
      </form>
      
   </div>

   <script> writeFooter(); </script>
         
</section>
<!-- End: update Page -->

 </body>

<script>

$('#rulefileList li').click(function() {
   var rulefileid = $(this).attr('data-name'); 
   localStorage.setItem("rulefileid", rulefileid);
}); 

$('#update_cancel').click(function() {
   $('#pageupdate').popup("close");
});

$( '#pageupdate' ).on( 'pagebeforeshow', function(event) {
   var rulefileid = localStorage.getItem("rulefileid");
   var rulefileid_id = rulefileid + "_id";
   var rulefileid_groupid = rulefileid + "_groupid";
   var rulefileid_rulename = rulefileid + "_rulename";
   var rulefileid_ruletxt = rulefileid + "_ruletxt";

   var id = document.getElementById(rulefileid_id).value;
   var groupid = document.getElementById(rulefileid_groupid).value;
   var rulename = document.getElementById(rulefileid_rulename).value;
   var ruletxt = document.getElementById(rulefileid_ruletxt).value;
   
   document.getElementById("id").value = id;
   document.getElementById("groupid").value = groupid;
   document.getElementById("rulename").value = rulename;
   document.getElementById("line_numbers").value = ruletxt;

} );

</script>

</html>

          