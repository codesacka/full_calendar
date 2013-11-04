<?php session_start();

error_reporting(0);

  
$datefrom =  str_replace("-", ",",$_POST['availfro']);
$dateto   =  str_replace("-", ",",$_POST['availto']);
$events_array =Array();
$_SESSION['events'][$datefrom] =$dateto;

$events_array =$_SESSION['events'] ;




$ev_data .= " editable: true, ";
 
$ev_data  .=" events: [ ";

$ev_data  .=" { ";
$ev_data  .=" title: ' ',";
$ev_data  .=" start: new Date('')";
$ev_data  .=" }, ";


foreach($events_array as $k =>$v)
{
$ev_data .= "    { ";
$ev_data  .=" start: new Date('$k'),";
$ev_data  .=" end: new Date('$v')";
$ev_data  .= " }, ";
    
}
$ev_data .= "]";
                                
                                
        
$data  .="<script>";
        
$data .=" $(document).ready(function() { ";


$data .= "		$('#calendar').fullCalendar({";
$data .= "			theme: true, ";
$data .="			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},";
                        
$data .="                 selectable: true,
                        selectHelper: true,
                        select: function(start, end, allDay) {
                        $('#datepicker_start').val(convert_date(start));
                        $('#datepicker_end').val(convert_date(end));
                        $('#dialog').dialog({width:500});
                        $('#dialog').dialog('open'); 

                                }, ";

$data .=$ev_data;
		
$data .="		});";
		
$data .="	}); ";
$data  .="</script>";
$data .="<div id='calendar'></div>";


 echo $data;

?>
