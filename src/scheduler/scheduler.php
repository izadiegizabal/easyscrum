<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../sass/materialize.css"  media="screen,projection"/>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--JavaScript -->
    <link rel='stylesheet' href='../../js/fullcalendar/fullcalendar.css' />
    <script src='../../js/fullcalendar/lib/moment.min.js'></script>
    <script src='../../js/fullcalendar/fullcalendar.js'></script>
    <script type="text/javascript" src="../../js/bin/materialize.js"></script>
    <script type="text/javascript" src="../../js/bin/our_script.js"></script>

</head>

<body>
<h3 class="center">Easy Scrum</h3>
<br/>

<div class="row progress-col">
    <div class="col s4" >
        <!-- Modal Trigger -->
        <div class="" style="padding: 10px">
            <a class="open_modal_schedule waves-effect waves-light btn modal-trigger pink" href="#schedulerModal">Add event</a>
        </div>
        <div style="max-height: 500px; overflow-y: scroll; padding: 10px">
        <?php include 'schedule.php';?>
        </div>
    </div>
    <div class="col s8" style="max-height: 500px;">
        <!-- Modal Trigger -->
        <div id="calendar"></div>
    </div>
</div>

<div id="schedulerModal" class="modal">
    <div class="event-header">
        <div class="input-field white-text">
            <input placeholder="" id="eventTitle" type="text" class="event-title white-text">
            <label for="task-title">Schedule Title</label>
        </div>
        <div>
            <p><i class="material-icons">delete</i></p>
        </div>
    </div>
    <div class="task-content">
        <div class="input-field">
            <input type="text" class="event-date datepicker" id='datepicker'>
            <label for="datepicker">Date</label>
            <br>
            <input class="event-time" id="eventTime" type="time">
            <label for="time">time</label>
        </div>
        <div class="input-field">
            <textarea placeholder="The meeting about a rebranding of the logo. Start at the 12:00 in the room 321" id="eventDescription" class="event-desc materialize-textarea"></textarea>
            <label for="Description">Description</label>
        </div>
    </div>
    <div class="task-footer">
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat white-text">Cancel</a>
            <a href="#!" class="create_schedule modal-action modal-close waves-effect waves-light btn-flat white-text">Save</a>
        </div>
    </div>
</div>

<div id="schedulerModal-update" class="modal">
    <div class="event-header">
        <div class="input-field white-text">
            <input placeholder="" id="eventTitle" type="text" class="event-title1 white-text">
            <label for="task-title">Schedule Title</label>
        </div>
        <div>
            <p><i class="delete_schedule material-icons">delete</i></p>
        </div>
    </div>
    <div class="task-content">
        <div class="input-field">
            <input type="text" id="eventDate" class="event-date1 datepicker" id='datepicker'>
            <label for="taskDate">Date</label>
            <br>
            <input class="event-time1" id="eventTime" type="time">
            <label for="time">time</label>
        </div>
        <div class="input-field">
            <textarea placeholder="The meeting about a rebranding of the logo. Start at the 12:00 in the room 321" id="eventDescription" class="event-desc1 materialize-textarea"></textarea>
            <label for="Description">Description</label>
        </div>
    </div>
    <div class="task-footer">
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat white-text">Cancel</a>
            <a href="#!" class="update_schedule modal-action modal-close waves-effect waves-light btn-flat white-text">Update</a>
        </div>
    </div>
</div>

<?php require_once("../config.php") ?>

<?php 

//GET DATA FOR EVENTS
    $query = "SELECT * FROM schedule";
    $result = mysqli_query($con , $query);
    
?>
<script type="text/javascript">

    $(document).ready(function() {

    // page is now ready, initialize the calendar...
   
    $('#calendar').fullCalendar({
        aspectRatio: 2,
         events: [
        <?php 
        while($event = mysqli_fetch_assoc($result)) { 
               echo '{
                    id  : "'. $event["id"] .'",
                    title  : "'. $event["description"] .'",
                    start  : "'. $event["date"] .'",
                    
               },';
        } 
        ?>
    ],
     timeFormat: 'H(:mm)',
     eventClick: function(event) {
        var id = $(this).attr('id');
        $('.update_schedule').attr("id", id);
        $('.delete_schedule').attr("id", id);
        $.ajax({
            method: 'GET',
            url: 'schedule_detail.php?' + 'id=' + id,
            success: function (html) {          
                $(html).appendTo(document.body);
            },
            error: function () {
            }
        })
    },
    eventRender: function(event, eventElement) {
      eventElement.attr('href', '#schedulerModal-update');
      eventElement.addClass('modal-trigger');
      eventElement.addClass('schedule_detail');
       eventElement.attr('id', event.id);
  },
    })
      $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
       $('.fc-content').css('cursor', 'pointer');
});
</script>
</body>
</html>