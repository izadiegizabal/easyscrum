<?php

include '../config.php';

$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);
echo $query['title'];

$query1 = "INSERT INTO checklist (title, active) VALUES ('".$query['title']."', false)";
echo $query1;
$result = mysqli_query($con, $query1);

$row = $result->fetch_assoc();

mysqli_close($con);

