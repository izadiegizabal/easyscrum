<?php

include '../config.php';

$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);

$title = $query['title'];
$date = $query['date'];
$description = $query['desc'];



$query1 = "INSERT INTO schedule (title, date, description) VALUES ('$title', '$date', '$description')";

$result = mysqli_query($con, $query1);

mysqli_close($con);

