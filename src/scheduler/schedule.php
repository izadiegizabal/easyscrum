<?php require_once("../config.php")?>

<?php 

//GET DATA FOR EVENTS
	$query = "SELECT * FROM schedule";
	$result = mysqli_query($con , $query);
	
?>

<a href="<?php echo(WWW_ROOT . "/src/scheduler/add-event.php") ?>" type="button">+ Add Event</a><br>


<table>
	<?php while($event = mysqli_fetch_assoc($result)) { ?>
		<tr><a href="<?php echo(WWW_ROOT . "/src/scheduler/add-event.php?Id=") . $event["Id"]  ?>"><?php echo ($event["description"] . "<br>"); ?></a></tr>
    <?php } ?>
</table>
