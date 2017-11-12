<?php

include '../config.php';

$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);
$id = $query['id'];
$title = $query['title'];
$date = $query['date'];
$description = $query['desc'];
//echo $query['title'];

$query1 = "UPDATE schedule SET title = '$title', date = '$date', description = '$description' WHERE id = '$id'";

$insert = mysqli_query($con, $query1);

mysqli_close($con);
