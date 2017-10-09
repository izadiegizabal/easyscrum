<?php

include '../config.php';

$url = $_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);

$query = "SELECT * FROM checklist_item WHERE ref_checklist = " . $query['id'];
$results = mysqli_query($con,$query);
while($row = mysqli_fetch_array($results)){
    if ($row['active'] == 1)
    {
        $checklist_item = '<li class="row" id="' . $row['id'] . '">
                                    <div class="col s2">
                                        <p class="checkbox-item">
                                            <input type="checkbox" class="filled-in filled-in-item" id="start' . $row['id'] . '"  >
                                            <label class="filled-in-box-task" for="start' . $row['id'] . '"></label>
                                        </p>
                                    </div>
                                    <div class="col s8 input-field">
                                        <textarea onchange="alert(\'You just changed the textarea.\')" onkeyup="textAreaAdjust(this)" placeholder="Task" id="' . $row['id'] . '" type="text" class="large">task</textarea>
                                        <label for=""></label>
                                    </div>
                                    <div class="col s2">
                                        <p><i id="' . $row['id'] . '" class="material-icons delete-item">delete</i></p>
                                    </div>
                                </li>';
        echo $checklist_item;
    }
    else
    {
        $checklist_item = '<li class="row" id="' . $row['id'] . '">
                                    <div class="col s2">
                                        <p class="checkbox-item">
                                          <input type="checkbox" class="filled-in filled-in-item" id="start' . $row['id'] . '">
                                            <label class="filled-in-box-task" for="start' . $row['id'] . '"></label>
                                        </p>
                                    </div>
                                    <div class="col s8 input-field">
                                        <textarea class="check_item" onchange="updateTitle(this, this.value, this.id)" onkeyup="textAreaAdjust(this)" placeholder="Task" id="' . $row['id'] . '" type="text" class="large">' . $row['description'] . '</textarea>
                                        <label for=""></label>
                                    </div>
                                    <div class="col s2">
                                        <p><i id="' . $row['id'] . '" class="material-icons delete-item">delete</i></p>
                                    </div>
                                </li>';
        echo $checklist_item;
    }
}