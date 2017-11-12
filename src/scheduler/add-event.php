<?php require_once("../config.php") ?>

<?php 

// THE VALUE OF BUTTON IN THE FORM IT WILL CHANGE DEPENDING ON THE CONTEXT 
$task = "Save";
$Id= isset($_GET['Id']) ? $_GET['Id'] : '0';

//POPULATE THE FORM WITH EXISTANCE DATA
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['Id'])){

	
	$task = "Edit";

	
	$query = "SELECT * FROM schedule " ;
	$query .= "WHERE " ;
	$query .= "Id= " ;
	$query .= "'" . $Id . "'";
	$result = mysqli_query($con , $query);
	$event=mysqli_fetch_assoc($result);
	//SPLIT DATE AND TIME 
	$datetime= new DateTime($event['date']);
	$date= $datetime->format('Y-m-d');
	$time= $datetime->format('H:i:s');
	mysqli_free_result($result);

}

	

if($_SERVER['REQUEST_METHOD'] == 'POST'){
//EDIT EVENT 
	
if(isset ($_POST['Edit'])){
if($_POST['Edit'] == "Edit" ){
		
		$dateTime = $_POST['Date'] . " " .$_POST['Time'] ;
		$description = $_POST['Description'];
		$Id= $_POST['Id'];
		
		
		$query = "UPDATE schedule " ;
		$query .= "SET " ;
		$query .= "date= '" . $dateTime . "',";
		$query .= "description= '" . $description . "'";
		$query .= "WHERE ";
		$query .= "Id= ";
		$query .= "'" . $Id . "'";
		
		$result = mysqli_query($con , $query);
		if($result){
			echo ('Update succesed !');
			exit();
		}else{
			echo ('error update!');
		}
		
		
	}

}
	
//ADD EVENT	
if($_POST['Save'] == "Save"){
	$dateTime = $_POST['Date'] . " " .$_POST['Time'] ;
	$description = $_POST['Description'];
	
	$query = "INSERT INTO schedule " ;
	$query .= "(date , description) " ;
	$query .= "VALUES (" ;
	$query .= "'" . $dateTime . "',";
	$query .= "'" . $description . "'";
	$query .= ")";
	
	
	$result = mysqli_query($con , $query);
	if($result){
		echo ('Add with succes !');
		exit();
	}else{
		echo ('error !');
	}
	}
}


?>


<!--form action="<?php echo(WWW_ROOT . "/src/scheduler/add-event.php") ?>" method="post">
	<dl>
		<dt>Date</dt>
		<dd><input type="date" name="Date" value="<?php if(isset($event)) echo($date); ?>"></dd>
	</dl>
	<dl>
		<dt>Time</dt>
		<dd><input type="time" name="Time" value="<?php if(isset($event)) echo($time); ?>"></dd>
	</dl>
	<dl>
		<dt>Description</dt>
		<dd><input type="text" name="Description" value="<?php if(isset($event)) echo($event['description']); ?>"></dd>
	</dl>
	<input type="hidden" name="Id" value="<?php if(isset($_GET['Id'])) echo($_GET['Id']); ?>">
	<input type="submit" name="<?php echo($task); ?>" value="<?php echo($task); ?>">
</form-->

<form class="col s12" action="<?php echo(WWW_ROOT . "/src/scheduler/add-event.php") ?>" method="post">
	<div class="row">	
		<div class="input-field col s12">
			<input type="date" id="date" class="datepicker" name="Date" value="<?php if(isset($event)) echo($date); ?>">
			<label for="date">Date</label>
		</div>
		<div class="input-field col s12">
			<input type="time" id="time" name="Time" value="<?php if(isset($event)) echo($time); ?>">
			<label for="time">Time</label>
		</div>
		<div class="input-field col s12">
			<textarea type="textarea" class="materialize-textarea" id="description" name="Description" value="<?php if(isset($event)) echo($event['description']); ?>"></textarea>
			<label for="description">Description</label>
		</div>
		<input type="hidden" name="Id" value="<?php if(isset($_GET['Id'])) echo($_GET['Id']); ?>">
		<input type="submit" name="<?php echo($task); ?>" value="<?php echo($task); ?>">
	</div>
</form>
