<?php

include '../config.php';

$query = "SELECT * FROM user_stories WHERE ref_card = " . $card_id;
$results = mysqli_query($con,$query);

while($row = mysqli_fetch_array($results)){ 	
	echo '<div id="' . $row['id'] . '"  class="white card-task" style="border:4px solid black; padding: 10px; margin-top: 10px;">
					<a class="modal-detail modal-trigger" id="' . $row['id'] . '"  href="#modal2">
						<div>
                    		<!-- Modal Trigger -->
		                    <h5>' . $row['title'] . '</h5>
		                    <p>' . $row['description'] . '</p>
		                </div>
                    </a>
                </div>';
}