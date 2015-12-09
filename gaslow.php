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

		<div data-theme="a" id="pageGASLow" data-role="page">
		<section>
      
      		<script> writeHeader("backgashigh", "home"); </script>

          	<div data-role="content">
            <div class="content-primary" id="DataEntry">
               <ul data-role="listview"  id="DataEntryList" data-icon="arrow-r" data-inset="true" >

                  <li data-role="divider">
                     <h4>Lower Order Goals</h4>
                  </li>

                  <li data-icon="gear">
                     <a href="gaslevel-52fast-week.php" data-ajax="false">
                     <img src="images/gas/high/healthy/by-52-diet.png" class="ui-li-thumb" title="By 5:2 Diet" alt="By 5:2 Diet"> 
                     <h4 class="ui-li-heading">By 5:2 Diet each week</h4>
                     <a href="#pageUpdateGASLow" data-ajax="false"></a>
                  </li>

                  <li data-icon="gear">
                     <a href="gaslevel-52fast-month.php" data-ajax="false">
                     <img src="images/gas/high/healthy/by-52-diet.png" class="ui-li-thumb" title="By 5:2 Diet" alt="By 5:2 Diet"> 
                     <h4 class="ui-li-heading">By 5:2 Diet each month</h4>
                     <a href="#pageUpdateGASLow" data-ajax="false"></a>
                  </li>
                  
                  <li data-icon="gear">
                     <a href="gaslevel-steps-week.php" data-ajax="false">
                     <img src="images/gas/high/active/by-more-steps.png" class="ui-li-thumb" title="By More Steps" alt="By More Steps"> 
                     <h4 class="ui-li-heading">By More Steps each week</h4>
                     <a href="#pageUpdateGASLow" data-ajax="false"></a>
                  </li>

                  <li data-icon="gear">
                     <a href="gaslevel-steps-month.php" data-ajax="false">
                     <img src="images/gas/high/active/by-more-steps.png" class="ui-li-thumb" title="By More Steps" alt="By More Steps"> 
                     <h4 class="ui-li-heading">By More Steps each month</h4>
                     <a href="#pageUpdateGASLow" data-ajax="false"></a>
                  </li>

                  <li data-icon="gear">
                     <a href="gaslevel-weight-day.php" data-ajax="false">
                     <img src="images/gas/high/weight/by-measuring-weight.png" class="ui-li-thumb" title="By Measuring Weight" alt="By Measuring Weight"> 
                     <h4 class="ui-li-heading">By measuring weight each day</h4>
                     <a href="#pageUpdateGASLow" data-ajax="false"></a>
                  </li>
                                                                        
               </ul>
        	</div>      	
        	</div>

   			<script> writeFooter(); </script>

		</section>
		</div>
		<!-- End: GASLow Page -->

		<div data-theme="a" id="pageUpdateGASLow" data-role="page">
      	<section>
      		<script> writeHeader("backgaslow", "home"); </script>

          	<div data-role="content">
            <div class="content-primary" id="DataEntry">
               <ul data-role="listview"  id="DataEntryList" data-icon="arrow-r" data-inset="true" >

                  <li data-role="divider">
                     <h4>Assign Sensor</h4>
                  </li>

                  <li data-inset="true">
                     <a href="#popupMsg" data-rel="popup" data-position-to="window" data-transition="pop">
                     <img src="images/sensor/selfreport.png" style="width:10%;" title="Self Report" alt="Self Report" class="ui-li-thumb"> 
                     <h4 class="ui-li-heading">Self Report</h4>
                     </a>
                  </li>
                  
                  <li>
                     <a href="#popupMsg" data-rel="popup" data-position-to="window" data-transition="pop">
                     <img src="images/sensor/fitbit.png" style="width:10%;" title="Fitbit" alt="Fitbit" class="ui-li-thumb"> 
                     <h4 class="ui-li-heading">Fitbit</h4>
                     </a>
                  </li>
                                    
               </ul>
        	</div>
        	</div>
 
   			<script> writeFooter(); </script>
   			
		</section>
		</div>
		<!-- End: pageUpdateGASLow Page -->

		<!-- Begin: popupMsg popup -->
		<div id="popupMsg" class="ui-content" data-role="popup" data-add-back-btn="false"> 
		<section>
   			<div class="content" data-role="content">
      			<h3>Message</h3>
      
 	     		<p> A message indicating assignment of selected instrumentation method for the GAS lower order goal. </p>
      
			</div>
		</section>
		</div>
		<!-- End: popupMsg div -->

	</body>

<script>
	
$( '#popupMsg' ).on( 'popupbeforeposition',function(event){
	alert("hello");
});

</script>

</html>

          