<?php require_once("../config.php") ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){	
	
	$title = $_POST['title'];
	$persona = $_POST['persona'];
	$reason = $_POST['reason'];
	$descreption = $_POST['descreption'];
	$estimate = $_POST['estimate'];
	$business_value = $_POST['business_value'];
	
	$query = "INSERT INTO user_stories " ;
	$query .= "(title, persona, reason, descreption, estimate, business_value, ref_card, ref_user) VALUES (";
	$query .= "' " . $title . "', ";
	$query .= "' " . $persona . "', ";
	$query .= "' " . $reason . "', ";
	$query .= "' " . $descreption . "', ";
	$query .= "' " . $estimate . "', ";
	$query .= "' " . $business_value . "', ";
	$query .= "'1', '1')" ;
	$result = mysqli_query($con , $query);
	
	if ($result){
	 echo ("Added with succes !!"); 
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../sass/materialize.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body style="background-color: #87ceeb;">
    <h1 class="center white-text">Easy Scrum</h1>
    <br/>

    <div class="row progress-col">
        <!--Product Backlog-->

        <!--End Done Project-->
    </div>

    <!-- Task Modal Structure -->
	<form action="" method="post">
    	<div id="modal1" class="">
        <div class="task-header">
            <div class="input-field white-text">
                <input name="title" placeholder="PB1: Checklist..." id="task-title" type="text" class="white-text">
                <label for="task-title">Task Title</label>
            </div>
            <div>
                <p><i class="material-icons">delete</i></p>
            </div>
        </div>
        <div class="task-content">
            <h5>User Story</h5>
            <div class="input-field">
                <input name="persona" placeholder="User" id="us-as" type="text">
                <label for="us-as">As a(n)</label>
            </div>
            <div class="input-field">
                <textarea name="reason" placeholder="Be able to create as much checklists I think are necessary for the project / case" id="us-want" class="materialize-textarea"></textarea>
                <label for="us-want">I want to</label>
            </div>
            <div class="input-field">
                <textarea name="descreption" placeholder="I can create subtasks that I need to finish first before having finished the bigger ones" id="us-so" class="materialize-textarea"></textarea>
                <label for="us-so">So that</label>
            </div>
        </div>
        <div class="task-footer">
            <div class="row">
                <div class="input-field col s12 m6">
                    <select name="estimate">
                        <option value="" disabled>Make a guess</option>
                        <option value="0">0</option>
                        <option value="0.5">0.5</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="8">8</option>
                        <option value="13">13</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                        <option value="100">100</option>
                        <option value="-1">?</option>
                    </select>
                    <label>Estimate</label>
                </div>
                <div class="input-field col s12 m6">
                    <select name="business_value">
                        <option value="" disabled>Make a guess</option>
                        <option value="0">0</option>
                        <option value="0.5">0.5</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="8">8</option>
                        <option value="13">13</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                        <option value="100">100</option>
                        <option value="-1">?</option>
                    </select>
                    <label>Business Value</label>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat white-text">Cancel</a>
				<input type="submit" value="Save" class="modal-action modal-close waves-effect waves-light btn-flat white-text" />
            </div>
        </div>
    </div>
	</form>
    <!--JavaScript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../js/bin/materialize.js"></script>
    <script type="text/javascript" src="../../js/bin/our_script.js"></script>
</body>
</html>
