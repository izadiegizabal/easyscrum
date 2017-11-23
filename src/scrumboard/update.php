<?php

include '../config.php';

$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);

$id = $query['id'];
$title = $query['title'];
$description = $query['description'];
$reason = $query['reason'];
$estimate = $query['estimate'];
$business_value = $query['val'];
echo $id;
//echo $query['title'];

$query1 = "UPDATE user_stories SET title = '$title', description = '$description', reason = '$reason', estimate = '$estimate', business_value = '$business_value' WHERE id = '$id'";

$insert = mysqli_query($con, $query1);

mysqli_close($con);
