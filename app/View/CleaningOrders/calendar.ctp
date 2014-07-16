<?php echo $this -> Html -> script(array('/js/fullcalendar/fullcalendar.min'));
echo $this -> Html -> css(array('/css/fullcalendar/fullcalendar'));
?>
<?php 
// debug($tasks); 
?>
<script type='text/javascript'>

                        $(document).ready(function() {
        
        $('#calendaraa').fullCalendar({
        header: {
                left: 'prev,next today', 
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
        eventClick: function(calEvent, element) {

        //alert('Event: ' + calEvent.title);
        // alert('Description: ' + calEvent.description);
        //alert('Start Date: ' + calEvent.start);
       
        
        
        $(this).css('border-color', 'red');

        },
            editable: false,
            events: [

        <?php foreach ($tasks as $task){ 
                    echo "{";
                    ?>
            title:
                <?php echo " " . "'" . h($task['Team']['name']) . "'"; ?>
            ,
            start:
                <?php echo " " . "'" . h($task['CleaningOrder']['appointment_time_from']) . "'"; ?>
            ,
            end:
                <?php echo " " . "'" . $task['CleaningOrder']['appointment_time_to'] . "'"; ?>
            ,
            description:
                <?php echo " " . "'" . $task['CleaningOrder']['notes'] . "'"; ?>
            ,
            url:
                <?php echo " " . "'/cleaning/cleaning_orders/edit/" . $task['CleaningOrder']['id'] . "'"; ?>
            ,
            color:
                <?php echo " " . "'" . $task['Color']['name'] . "'";?>
            ,
            allDay:false
            ,               <?php echo "},";
            }
 ?>
        
    ]
    });

    });

</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Calendar</title>

	</head>

	<body>

		<div align="left">

			<h2>Calendar</h2>
		</div>
		<br>

		<div class="row form">
			<div class="twelve mobile-twelve columns">
				<div id='calendaraa'></div>
			</div>
		</div>

		<div class="actions">
			asd
		</div>
	</body>
</html>

