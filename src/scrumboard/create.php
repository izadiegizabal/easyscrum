<?php

include '../config.php';

$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);

$card_id = $query['id'];
$title = $query['title'];
$description = $query['description'];
$reason = $query['reason'];
$estimate = $query['estimate'];
$business_value = $query['val'];
//echo $query['title'];

$query1 = "INSERT INTO user_stories (title, description, reason, estimate, business_value, ref_card) VALUES ('$title', '$description', '$reason', '$estimate', '$business_value', '$card_id')";

$insert = mysqli_query($con, $query1);

mysqli_close($con);
