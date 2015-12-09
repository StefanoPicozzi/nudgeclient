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
   <script src="js/jquery-linenumbers/jquery-linenumbers.js"></script>
   <script src="js/jquery-linenumbers/jquery-linenumbers.min.js"></script>
   

   </head>
   <body>

      <!-- Begin: Home Page -->
      <section data-theme="a" id="pageUserObs" data-role="page" data-fullscreen="false">

         <script> writeHeader("backdata", "insertobs"); </script>

   <div class="content" data-role="content">
      
      <form id="update_form" action="rulefile_submit.php" method="post" rel="external" data-ajax="false"> 
         <div data-role="fieldcontain">
            <h3>Rulefile Contents</h3>

            <input readonly="true" type="hidden" id="all" name="all" class="all" value="">       
            <input readonly="true" type="hidden" id="id" name="id" class="id" value="">       
            <input readonly="true" type="hidden" id="groupid" name="groupid" class="groupid">
            <input readonly="true" type="hidden" id="rulename" name="rulename" class="rulename">
            
<textarea class="lined" rows="10" cols="60">
import java.util.HashMap;
import org.json.JSONObject;
import java.util.Date; 
import java.util.Calendar; 
import java.text.SimpleDateFormat; 
import com.satimetry.nudge.Output;

global java.util.HashMap output;
global SimpleDateFormat inSDF;
global SimpleDateFormat outSDF;

function void print(String txt) {
   System.out.println(txt);
}

// Declare inside drl so we can manipulate objects naturally
declare Participant
  @role( fact )
  id : String @key
  gastype : String
  dayofweek : String
end

// Declare inside drl so we can manipulate objects naturally
declare Observation
  @role( event )
  @timestamp ( obsdate )
  id : String @key
  obsdate : Date @key
  obsvalue : Integer
  obsdiff : Integer
end

rule "ruleInsertObservation"
  salience 2000
  when
    $input : JSONObject() from entry-point DEFAULT 
  then
//    inSDF = new SimpleDateFormat("yyyy-M-d H:m:s Z");
//    Date date = inSDF.parse( $input.get("obsdate").toString() + " +1100" );
    inSDF = new SimpleDateFormat("yyyy-M-d H:m:s");
    Date date = inSDF.parse( $input.get("obsdate").toString() + "" );

    Calendar calendar = Calendar.getInstance();
    calendar.setTime(date);
    int hour = calendar.get(Calendar.HOUR) + 1;
    int minute = calendar.get(Calendar.MINUTE);
    int second = calendar.get(Calendar.SECOND);
    Observation obs = new Observation($input.get("username").toString(), date);
    obs.setObsvalue( Integer.parseInt($input.get("obsvalue").toString()) );
    obs.setObsdiff( Math.abs ( (hour*60) + minute - (8*60) ) );
    insert(obs);
print(hour + " " + minute);
    print(drools.getRule().getName() + "->" + obs.getId() + "-" + obs.getObsdate() + "-" + obs.getObsvalue() + "-" + obs.getObsdiff() );
end

rule "ruleInsertParticipant"
  salience 1000
  when
    $input : JSONObject() from entry-point DEFAULT 
    not Participant( id == $input.get("username").toString() )
  then
    Date today = new Date();
    String dayofweek = new SimpleDateFormat("EE").format(today);
    Participant $participant = new Participant( $input.get("username").toString() );
    $participant.setGastype( $input.get("obsname").toString() );
    $participant.setDayofweek(dayofweek);
    insert( $participant );
    print(drools.getRule().getName() + "->" + $participant.getId() + "-" + $participant.getGastype() );
end

rule "ruleMedicationCount"
  salience -100
  no-loop true
  when
    $participant : Participant()
    $obsCountTotal : Number( intValue > 0) from accumulate(
      Observation( $obsCount : obsvalue > 0, $participant.id == id ) over window:time( 41d ),
      count( $obsCount ) )
  then
    Date today = new Date();

    java.util.Date date = new Date();
    SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
    String datef = sdf.format( date );

    JSONObject joutput = new JSONObject();
    joutput.put("id", $participant.getId());
    joutput.put("rulename", drools.getRule().getName());
    joutput.put("ruledate", datef);
    joutput.put("rulemsg", "You took your medication " + $obsCountTotal + " times in the past 14 days.");
      joutput.put("ruledata", "http://www.thenudgemachine.com/msg.php");
    Output $output = new Output(joutput.toString());
    insert($output);
      print(drools.getRule().getName() + "->" + $participant.getId() + " - " + $participant.getDayofweek() );
end

rule "ruleMedicationTime"
  salience -100
  no-loop true
  when
    $participant : Participant()
    $obsCountTotal : Number( intValue > 0) from accumulate(
      Observation( $obsCount : obsdiff > 60, $participant.id == id ) over window:time( 41d ),
      count( $obsCount ) )
  then
    Date today = new Date();

    java.util.Date date = new Date();
    SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
    String datef = sdf.format( date );

    JSONObject joutput = new JSONObject();
    joutput.put("id", $participant.getId());
    joutput.put("rulename", drools.getRule().getName());
    joutput.put("ruledate", datef);
    joutput.put("rulemsg", "You took your medication more than 1 hour from suggested time " + $obsCountTotal + " times in the past 14 days.");
      joutput.put("ruledata", "http://www.thenudgemachine.com/msg.php");
    Output $output = new Output(joutput.toString());
    insert($output);
    print(drools.getRule().getName() + "->" + $participant.getId() + " - " + $participant.getDayofweek() );
end

rule "ruleMedicationFullAdherance"
  salience -100
  no-loop true
  when
    $participant : Participant()
    $obsCountTotal : Number( intValue > 0) from accumulate(
      Observation( $obsCount : obsvalue == 2 && obsdiff < 60, $participant.id == id ) over window:time( 41d ),
      count( $obsCount ) )
  then
    Date today = new Date();

    java.util.Date date = new Date();
    SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
    String datef = sdf.format( date );

    JSONObject joutput = new JSONObject();
    joutput.put("id", $participant.getId());
    joutput.put("rulename", drools.getRule().getName());
    joutput.put("ruledate", datef);
    joutput.put("rulemsg", "You fully complied with your medication schedule " + $obsCountTotal + " times in the past 14 days.");
    joutput.put("ruledata", "http://www.thenudgemachine.com/msg.php");
    Output $output = new Output(joutput.toString());
    insert($output);
    print(drools.getRule().getName() + "->" + $participant.getId() + " - " + $participant.getDayofweek() );
end


rule "ruleMedicationPartialAdherance"
  salience -100
  no-loop true
  when
    $participant : Participant()
    $obsCountTotal : Number( intValue > 0) from accumulate(
      Observation( $obsCount : obsvalue == 2, $participant.id == id ) over window:time( 41d ),
      count( $obsCount ) )
  then
    Date today = new Date();

    java.util.Date date = new Date();
    SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
    String datef = sdf.format( date );

    JSONObject joutput = new JSONObject();
    joutput.put("id", $participant.getId());
    joutput.put("rulename", drools.getRule().getName());
    joutput.put("ruledate", datef);
    joutput.put("rulemsg", "You partially complied with your medication schedule " + $obsCountTotal + " times in the past 14 days.");
    joutput.put("ruledata", "http://www.thenudgemachine.com/msg.php");
    Output $output = new Output(joutput.toString());
    insert($output);
    print(drools.getRule().getName() + "->" + $participant.getId() + " - " + $participant.getDayofweek() );
end

</textarea>
 
             <center>
               <input type="submit" id="update" name="update" class="update" value="Update" data-inline="true">
               <input type="submit" id="updateall" name="updateall" class="updateall" value="Update All" data-inline="true">
            </center>

         </div>
      </form>
      
         <script> writeFooter(); </script>
       
      </section>
      <!-- End: userObs Page -->

<script>
$(function() {
   $(".lined").linedtextarea(
      {selectedLine: 1}
   );
});
</script>


   </body>
</html>
