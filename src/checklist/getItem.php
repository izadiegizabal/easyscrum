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
                                            <input onclick="updateActive(this)" type="checkbox" name="'.$row['id'].'"  class="filled-in filled-in-item" id="start' . $row['id'] . '"  checked>
                                            <label class="check_box filled-in-box-task" for="start' . $row['id'] . '"></label>
                                        </p>
                                    </div>
                                    <div class="col s8 input-field">
                                        <textarea disabled style="text-decoration:line-through;" class="large check_item' . $row['id'] . '" onchange="updateTitle(this, this.value, this.id)" onkeyup="textAreaAdjust(this)" placeholder="Task" id="' . $row['id'] . '" type="text" >' . $row['description'] . '</textarea>
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
                                        <p class="checkbox-item" id="' . $row['id'] . '">
                                          <input onclick="updateActive(this)" name="'.$row['id'].'" type="checkbox" class="filled-in filled-in-item" id="start' . $row['id'] . '">
                                          <label class="check_box filled-in-box-task" for="start' . $row['id'] . '"></label>
                                        </p>
                                    </div>
                                    <div class="col s8 input-field">
                                        <textarea class="large check_item' . $row['id'] . '" onchange="updateTitle(this, this.value, this.id)" onkeyup="textAreaAdjust(this)" placeholder="Task" id="' . $row['id'] . '" type="text">' . $row['description'] . '</textarea>
                                        <label for=""></label>
                                    </div>
                                    <div class="col s2">
                                        <p><i id="' . $row['id'] . '" class="material-icons delete-item">delete</i></p>
                                    </div>
                                </li>';
        echo $checklist_item;
    }
}