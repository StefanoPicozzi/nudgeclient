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
      <script src="js/customjqm.js"  ></script>  
      <script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
      
      <link rel="stylesheet" href="css/nudge.css" />      
      <script src="js/nudge.js"  ></script>  
      <script> var config = false; </script>
        
   	</head>
   
	<body>

		<div data-theme="a" id="pageGASLevel" data-role="page">
		<section>
      
      		<script> writeHeader("backgaslow", "home"); </script>

          	<div data-role="content">
            <div class="content-primary" id="DataEntry">
               <ul data-role="listview"  id="DataEntryList" data-icon="arrow-r" data-inset="true" >

                  <li data-role="divider">
                     <h4>Goal Levels</h4>
                  </li>

                  <li data-icon="gear">
                     <a><img src="images/gas/level/best.png"  class="ui-li-thumb ui-corner-none" title="Best Expected Outcome" alt="Best Expected Outcome"> 
                     <h4 class="ui-li-heading">4+ fast days in past week</h4></a>
                     <a href="#pageUpdateGASLevel" data-ajax="false"></a>
                  </li>
                  
                  <li data-icon="gear">
                     <a><img src="images/gas/level/more.png"  class="ui-li-thumb ui-corner-none" title="More Than Expected Outcome" alt="More Than Expected Outcome"> 
                     <h4 class="ui-li-heading">3 fast days in past week</h4></a>
                     <a href="#pageUpdateGASLevel" data-ajax="false"></a>
                  </li>

                  <li data-icon="gear">
                     <a><img src="images/gas/level/expected.png"  class="ui-li-thumb ui-corner-none" title="Expected Outcome" alt="Expected Outcome"> 
                     <h4 class="ui-li-heading">2 fast days in past week</h4></a>
                     <a href="#pageUpdateGASLevel" data-ajax="false"></a>
                  </li>

                  <li data-icon="gear">
                     <a><img src="images/gas/level/less.png"  class="ui-li-thumb ui-corner-none" title="Less Than Expected Outcome" alt="Less Than Expected Outcome"> 
                     <h4 class="ui-li-heading">1 fast day in past week</h4></a>
                     <a href="#pageUpdateGASLevel" data-ajax="false"></a>
                  </li>
                  
                  <li data-icon="gear">
                     <a><img src="images/gas/level/worst.png"  class="ui-li-thumb ui-corner-none" title="Worst Expected Outcome" alt="Worst Expected Outcome"> 
                     <h4 class="ui-li-heading">0 fast days in past week</h4></a>
                     <a href="#pageUpdateGASLevel" data-ajax="false"></a>
                  </li>

               </ul>
        	</div>
        </div>

 
   		<script> writeFooter(); </script>

	</section>
	</div>
	<!-- End: GASLevel Page -->

<!-- Begin: pageUpdateGASLevel Page -->
<div data-theme="a" id="pageUpdateGASLevel" data-role="page"><section>
   
   <script> writeHeader("backgaslevel", "settings"); </script>
 
   <div class="content" data-role="content">

      <form id="pru_update" action="programruleuser_submit.php" method="get"  rel="external" data-ajax="false"> 

         <div data-role="fieldcontain">

           <fieldset data-role="controlgroup">
            <legend><var style="font-style:normal" class="ruledesc"></var></legend>

            <input type=hidden name=crudtype id=crudtype value="update">
            <input type=hidden name=ruleid id="pru_ruleid" value="">
            <input type=hidden name=rulename id="rulename" value="">
            <input type=hidden name=ruletype id="pru_ruletype" >
         
            <div data-role="fieldcontain">
               <label for="user_ruleuserdesc"> Goal Description: </label>
               <input type="text" class="user_ruleuserdesc" name="ruleuserdesc" id="ruleuserdesc" placeholder="Optional description" data-mini="true">
            </div>
   
            <div data-role="fieldcontain">
            	<label for="user_rulehigh"> High Target: </label>
         		<input type="number" class="user_rulehigh" name="rulehigh" id="rulehigh" data-mini="true">
				</div>

            <div data-role="fieldcontain">						
            	<label for="user_rulelow"> Low Target: </label>         		
         		<input type="number" class="user_rulelow" name="rulelow" id="rulelow" data-mini="true">
  				</div>

           </fieldset>
         </div>
           					
         <div data-role="fieldcontain">						      	         	
            <center>
              	<input type="submit" name="insert" id="user_insert" value="Update" data-inline="true">
            </center>
         </div>

      </form>
      
   </div>
   
   <script> writeFooter(); </script>

</section></div>
<!-- End: pageUpdateGASLevel Page -->


	</body>

</html>

          