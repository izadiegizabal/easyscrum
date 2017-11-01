<?php

include '../config.php';

$query = "SELECT * FROM user_stories WHERE ref_card = " . $card_id;
$results = mysqli_query($con,$query);

while($row = mysqli_fetch_array($results)){ 	
	echo '<div id="' . $row['id'] . '"  class="card-task" style="border:4px solid black; padding: 10px; margin-top: 10px;">
                    <!-- Modal Trigger -->
                    <h5>' . $row['title'] . '</h5>
                    <p>' . $row['description'] . '</p>
                </div>';
}