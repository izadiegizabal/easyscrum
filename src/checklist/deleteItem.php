<?php
/**
 * Created by PhpStorm.
 * User: dell 5558
 * Date: 10/9/2017
 * Time: 7:47 PM
 */

include '../config.php';
$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);

$id = $query['id'];

$query1 = 'DELETE FROM checklist_item WHERE id = '. $id;
echo $id;

$update1 = mysqli_query($con, $query1);