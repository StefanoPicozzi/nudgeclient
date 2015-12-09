<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE');
header('Access-Control-Allow-Headers: Content-Type');
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

<style type="text/css">

</style>

<script type="text/javascript">


</script>


   </head>
   <body>

      <!-- Begin: Home Page -->
      <section data-theme="a" id="pageNudgeAPI" data-role="page" data-fullscreen="false">

         <script> writeHeader("backsettings", "home"); </script>

         <div data-role="content">
            <div class="content-primary" id="ruleOptions">

   <form name="createUserobs" id="createuserobs" action="http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/userobs" method="post">
      <div data-role="fieldcontain">
         <fieldset data-role="controlgroup">
            <legend>Userobs Post Example</legend>
            <div data-role="fieldcontain">     
               <label for="id"> Program ID: </label>
               <input type="text" name="programid" id="programid" required autofocus value=9 />
            </div>
            <div data-role="fieldcontain">
               <label for="userid"> User ID: </label>
               <input type="text" name="userid" id="userid" required value=97 />
            </div>
            <div data-role="fieldcontain">
               <label for="obsname"> Obs Name: </label>
               <input type="text" name="obsname" id="obsname" required value="weight" />
            </div>
            <div data-role="fieldcontain">
               <label for="obsvalue"> Obs Value: </label>
               <input type="text" name="obsvalue" id="obsvalue" required value="77" />
            </div>
            <div data-role="fieldcontain">
               <label for="obsdesc"> Obs Desc: </label>
               <input type="text" name="obsdesc" id="obsdesc" required value="Nudge website entry using Nudge API" />
            </div>            
            <div data-role="fieldcontain">
               <label for="obsdate"> Obs Date: </label>
               <input type="text" name="obsdate" id="obsdate" required value="2015-01-01 07:30:00" />
            </div>
            <div data-role="fieldcontain">
               <label for="obstype"> Obs Type: </label>
               <input type="text" name="obstype" id="obstype" required value="userobs" />
            </div>
     </fieldset>
      
      <center>
         <input type="submit" id="create" value="Create" data-inline="true"/>
      </center>
      
   </form>

   <form name="createJSONUserobs" id="createJSONUserobs" action="postuserobsjson_submit.php" method="get">
      <div data-role="fieldcontain">
         <fieldset data-role="controlgroup">
            <legend>Userobs JSON Post Example</legend>
            <div data-role="fieldcontain">     
               <label for="id"> Program ID: </label>
               <input type="text" name="programid" id="programid" required autofocus value=9 />
            </div>
            <div data-role="fieldcontain">
               <label for="userid"> User ID: </label>
               <input type="text" name="userid" id="userid" required value=97 />
            </div>
            <div data-role="fieldcontain">
               <label for="obsname"> Obs Name: </label>
               <input type="text" name="obsname" id="obsname" required value="weight" />
            </div>
            <div data-role="fieldcontain">
               <label for="obsvalue"> Obs Value: </label>
               <input type="text" name="obsvalue" id="obsvalue" required value="77" />
            </div>
            <div data-role="fieldcontain">
               <label for="obsdesc"> Obs Desc: </label>
               <input type="text" name="obsdesc" id="obsdesc" required value="Nudge website entry using Nudge API" />
            </div>            
            <div data-role="fieldcontain">
               <label for="obsdate"> Obs Date: </label>
               <input type="text" name="obsdate" id="obsdate" required value="2015-01-01" />
            </div>
            <div data-role="fieldcontain">
               <label for="obstype"> Obs Type: </label>
               <input type="text" name="obstype" id="obstype" required value="userobs" />
            </div>
     </fieldset>
      
      <center>
         <input type="submit" id="create" value="Create" data-inline="true"/>
      </center>
      
   </form>
             
      <form name="getfact" id="getfact" action="http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/fact/user" method="get">
         <div data-role="fieldcontain">
            
            <fieldset data-role="controlgroup">
               <legend>User Fact Get Example</legend>
               <div data-role="fieldcontain">
                  <label for="programid"> Program ID: </label>
                  <input type="text" class="programid" name="programid" id="programid" required autofocus value=9 />
               </div>
               <div data-role="fieldcontain">
                  <label for="groupid"> Group ID: </label>
                  <input type="text" name="groupid" id="groupid" required value=97 />
               </div>
               <div data-role="fieldcontain">
                  <label for="factname"> Fact Name: </label>
                  <input type="text" name="factname" id="factname" required value="weight" />
               </div>
            </fieldset>
            
            <center>
               <input type="submit" id="get" value="Get" data-inline="true"/>
            </center>
            
         </div>
      </form>

   <form name="donudge" id="donudge" action="http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/nudge" method="get">
      <div data-role="fieldcontain">
         <fieldset data-role="controlgroup">
            <legend>Do Nudge Example</legend>
            <div data-role="fieldcontain">
               <label for="programid">  Program ID: </label>
               <input type="text" name="programid" id="programid" required autofocus value=9 />
            </div>
            <div data-role="fieldcontain">            
               <label for="groupid"> Group ID: </label>
               <input type="text" name="groupid" id="groupid" required value=97 />
            </div>
            <div data-role="fieldcontain">
               <label for="factname"> Fact Name: </label>
               <input type="text" name="factname" id="factname" required value="weight" />
            </div>
            <div data-role="fieldcontain">            
               <label for="rulename"> Rule Name: </label>
               <input type="text" name="rulename" id="rulename" required value="weight" />
            </div>
         </fieldset>
        
        <center>
         <input type="submit" id="get" value="Nudge" data-inline="true"/>
        </center>

   </form>   
      
   <form name="getfact" id="getfact" action="http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/fact/system" method="get">
      <div data-role="fieldcontain">
         <fieldset data-role="controlgroup">
            <legend>System Fact Get Example</legend>
            <div data-role="fieldcontain">
               <label for="programid">  Program ID: </label>
               <input type="text" name="programid" id="programid" required autofocus value=9 />
            </div>
            <div data-role="fieldcontain">            
               <label for="groupid"> Group ID: </label>
               <input type="text" name="groupid" id="groupid" required value=97 />
            </div>
            <div data-role="fieldcontain">
               <label for="factname"> Fact Name: </label>
               <input type="text" name="factname" id="factname" required value="weight" />
            </div>
         </fieldset>
        
        <center>
         <input type="submit" id="get" value="Get" data-inline="true"/>
        </center>

   </form>   

   <form name="createfact" id="createfact" action="http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/fact" method="post">
      <div data-role="fieldcontain">
         <fieldset data-role="controlgroup">
            <legend>Fact Post Example</legend>
            <div data-role="fieldcontain">     
               <label for="id"> Program ID: </label>
               <input type="text" name="programid" id="programid" required autofocus value=9 />
            </div>
            <div data-role="fieldcontain">
               <label for="groupid"> Group ID: </label>
               <input type="text" name="groupid" id="groupid" required value=97 />
            </div>
            <div data-role="fieldcontain">
               <label for="factname"> Fact Name: </label>
               <input type="text" name="factname" id="factname" required value="weight" />
            </div>
            <div data-role="fieldcontain">
               <label for="factjson"> Fact JSON: </label>
               <input type="text" name="factjson" id="factjson"  
                 value="{ username: 'StefanoPicozzi@gmail.com' , obsname: 'weight' , obsdate: '2015-01-01 07:30:00' , obsvalue: 77, obsdesc: 'Nudge website entry using Nudge API' }" 
                 required/>
            </div>
     </fieldset>
      
      <center>
         <input type="submit" id="create" value="Create" data-inline="true"/>
      </center>
      
   </form>

   <form name="createJSONFact" id="createJSONFact" action="postfactjson_submit.php" method="get">
      <div data-role="fieldcontain">
         <fieldset data-role="controlgroup">
            <legend>Fact JSON Post Example</legend>
            <div data-role="fieldcontain">     
               <label for="id"> Program ID: </label>
               <input type="text" name="programid" id="programid" required autofocus value=9 />
            </div>
            <div data-role="fieldcontain">
               <label for="groupid"> Group ID: </label>
               <input type="text" name="groupid" id="groupid" required value=97 />
            </div>
            <div data-role="fieldcontain">
               <label for="factname"> Fact Name: </label>
               <input type="text" name="factname" id="factname" required value="weight" />
            </div>
            <div data-role="fieldcontain">
               <label for="facttype"> Fact Type: </label>
               <input type="text" name="facttype" id="facttype" required value="1" />
            </div>
            <div data-role="fieldcontain">
               <label for="factjson"> Fact JSON: </label>
               <input type="text" name="factjson" id="factjson"  
                 value="{ username: 'StefanoPicozzi@gmail.com' , obsname: 'weight' , obsdate: '2015-01-01 07:30:00' , obsvalue: 77, obsdesc: 'Nudge website entry using Nudge API' }" 
                 required/>
            </div>
     </fieldset>
      
      <center>
         <input type="submit" id="create" value="Create" data-inline="true"/>
      </center>
      
   </form>
   
   <form name="deletefacts" id="deletefacts" action="http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/fact/del" method="GET">
      <div data-role="fieldcontain">
         <fieldset data-role="controlgroup">
            <legend>Fact Delete All Example</legend>
            <div data-role="fieldcontain">     
               <label for="id"> Program ID: </label>
               <input type="text" name="programid" id="programid" required autofocus value=9 />
            </div>
            <div data-role="fieldcontain">
               <label for="groupid"> Group ID: </label>
               <input type="text" name="groupid" id="groupid" required value=97 />
            </div>
            <div data-role="fieldcontain">
               <label for="factname"> Fact Name: </label>
               <input type="text" name="factname" id="factname" required value="weight" />
            </div>
      </fieldset>
      
      <center>
         <input type="submit" id="create" value="Delete" data-inline="true"/>
      </center>

   </form>   
      
   <form name="deletefact" id="deletefact" action="http://nudgeserver-spicozzi.rhcloud.com/tnm/rest/fact/del" method="POST">
      <div data-role="fieldcontain">
         <fieldset data-role="controlgroup">
            <legend>Fact Delete Example</legend>
            <div data-role="fieldcontain">         
               <label for="id"> Fact ID: </label>
               <input type="text" name="id" id="id" required autofocus value="1" />
             </div>
      </fieldset>
      
      <center>
         <input type="submit" id="create" value="Delete" data-inline="true"/>
      </center>

   </form>              

   </div>
                   
   <script> writeFooter(); </script>

</section>
<!-- End: NudgeAPI Page -->

   </body>
   
   
<script>

</script>


</html>
