<?php


include '../config.php';
$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);
//echo gettype($query['active']);

$active = $query['active'];
echo $active;
if ($active == 'true') {
    $active1 = true;
}
else  {
    $active1 = 0;
}

$id = $query['id'];
/*echo $query['id'];
echo $query['active'];*/
$query1 = "UPDATE checklist_item SET active = '$active1' WHERE id = '$id'";
echo $active;
$update1 = mysqli_query($con, $query1);

mysqli_close($con);
/*
echo $query['id'];
echo $query['active'];*/


