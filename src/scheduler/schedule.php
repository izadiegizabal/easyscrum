<?php require_once("../config.php")?>

<?php 

//GET DATA FOR EVENTS
	$query = "SELECT * FROM schedule";
	$result = mysqli_query($con , $query);
	
?>



<?php while($row = mysqli_fetch_assoc($result)) {
	echo '
		<div id="'. $row['title'] .'" class="col s12" style="background-color: #2A2C35; margin-top: 20px">
			<h4 class="white-text">'. $row['title'] .'</h4>
			<p class="white-text">'. $row['date'] .'</p>
			<p class="white-text">'. $row['description'] .'</p>
		</div>
		
	';	
} ?>

