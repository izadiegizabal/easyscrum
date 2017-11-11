<?php
/**
 * Created by PhpStorm.
 * User: dell 5558
 * Date: 10/7/2017
 * Time: 9:35 PM
 */

include '../config.php';
$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);

$id = $query['id'];
$card_id = $query['cardId'];

$query1 = "UPDATE user_stories SET ref_card = '$card_id' WHERE id = '$id'";

$update1 = mysqli_query($con, $query1);
