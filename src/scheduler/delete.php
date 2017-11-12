<?php

include '../config.php';
$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);

$id = $query['id'];

$query1 = 'DELETE FROM schedule WHERE id = ' . $id;

$update1 = mysqli_query($con, $query1);