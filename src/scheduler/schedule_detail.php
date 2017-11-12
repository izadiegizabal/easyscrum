<?php
include '../config.php';

$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);

$id = $query['id'];

$query = "SELECT * FROM schedule WHERE id = " . $id;
$results = mysqli_query($con,$query);
$row = $results->fetch_assoc();

echo '
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script>
			$(".event-title1").val("'. $row['title'] .'");
	        $(".event-desc1").val("'. $row['description'] .'");
	        $(".event-date").val("'. $row['date'] .'");
	        var date = "'. $row['date'] .'";
	        var res = date.split(" ");
	        $(".event-date1").val(res[0]);
	        $(".event-time1").val(res[1]);
	        console.log(res);
	  	</script>';

mysqli_close($con);


