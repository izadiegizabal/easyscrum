<?php

include '../config.php';

$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);

$id = $query['id'];

$query = "SELECT * FROM user_stories WHERE id = " . $id;
$results = mysqli_query($con,$query);
$row = $results->fetch_assoc();

echo '
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script>
			$(".modal-title1").val("'. $row['title'] .'");
	        $(".modal-description1").val("'. $row['description'] .'");
	        $(".modal-reason1").val("'. $row['reason'] .'");
	        $(".modal-estimate1").val('. $row['estimate'] .');
	        $(".modal-value1").val('. $row['business_value'] .');
	  	</script>';

mysqli_close($con);


