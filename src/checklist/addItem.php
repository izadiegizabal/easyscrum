<?php

include '../config.php';

$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);
//echo $query['description'];

$query1 = "INSERT INTO checklist_item (description, active, ref_checklist) VALUES ('".$query['description']."', false, '".$query['ref']."')";
//echo $query1;
$insert = mysqli_query($con, $query1);

mysqli_close($con);
