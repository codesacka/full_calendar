<?php 
session_start();

unset($_SESSION['events']);
?>
<html>
<head>
<link rel='stylesheet' href='cupertino/jquery-ui.min.css' />
<link href='fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='lib/jquery.min.js'></script>
<script src='lib/jquery-ui.custom.min.js'></script>
   <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>
<script src='fullcalendar/fullcalendar.min.js'></script>


<script>
    
 							
function convert_date(str) {
    var date = new Date(str),
        mnth = ("0" + (date.getMonth()+1)).slice(-2),
        day  = ("0" + date.getDate()).slice(-2);
    return [ date.getFullYear(), mnth, day ].join("-");
}
 
 
 
$(document).ready(function() {
    
  $(function() { 
              $('#dialog').dialog({
               autoOpen: false 
            }); 
     });	
 
var loadUrl = "ajax/ajaxProcessor.php"; 
 var formData = {un_availfro: $("#un_availfro").val(),un_availto:$("#un_availto").val(),availfro: $("#availfro").val(),availto:$("#availto").val()};
        //   alert('aaaaaaaaaaaa');
  $.ajax({url:loadUrl,type: "POST", data : formData,success:function(result){
 //alert(result);
   $("#div_calendar").html(result);
		
 }});
 
});

$(document).ready(function() {   
$( "#set_availabilty" ).click(function() {
 
         var loadUrl = "ajax/ajaxProcessor.php";
	 
		  
  var formData = {availfro: $("#datepicker_start").val(),availto:$("#datepicker_end").val()};
        //   alert('aaaaaaaaaaaa');
       $.ajax({url:loadUrl,type: "POST", data : formData,success:function(result){
  ///     alert(result);
      $("#div_calendar").html(result);
		
     $("#dialog").dialog("close");
 
     }});	
    });
});

	  
	

</script>
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 13px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>
</head>
<body>
    
  <div id ='div_calendar'>
  </div>



<div id="dialog" title="Availabilty Settings" style="width:300px;" >

     <div style="width:0px;height:0px;position:absolute;left:-100px;top:-100px;overflow:hidden"><input type="hidden" name="form9_hf_0" id="form9_hf_0" /></div>
				<table width="100%" cellpadding="3">
					
									
					<tr>
						<td>
							Starts:
						</td>
						<td>
							<span>
			<input type="text" value="10/26/2013" name="datepicker_start" id="datepicker_start">
		</span>
						</td>
					</tr>
					<tr>
						<td>
							Ends:
						</td>
						<td>
							<span>
			<input type="text" value="11/01/2013" name="datepicker_end" id="datepicker_end">
                                                    </span>
						</td>
					</tr>
                                        
                                        
                                        <tr>
						<td>
						&nbsp;        <input type='hidden' name='dates_fro' value=''>
						               <input type='hidden' name='dates_to' value=''>
						</td>
						<td>
							<span>
			<input type="submit" value="Set Availability" name="set_availibility" id="set_availabilty">
  
                                                        </span>
						</td>
					</tr>
				</table>
				<div id="feedbackc">
		
	</div>
		    
     
</body>
</html>
