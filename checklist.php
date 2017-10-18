<!DOCTYPE html>
<html lang="en">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../sass/materialize.css"  media="screen,projection"/>

    <script type="text/javascript" src="../../js/bin/js.cookie.js"></script>


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        textarea {
            border: 1px solid transparent;
            resize: none;
            padding: 13px 0;
            overflow: hidden;
        }
    </style>
</head>

<body>
<div class="container">
    <h1 class="center blue-text">Easy Scrum</h1>
    <br/>
    <div class="row">
        <?php
            include '../config.php';

            //$db = new Db();
            $query = "SELECT * FROM checklist";
            $results = mysqli_query($con,$query);
            $rowcount =mysqli_num_rows($results);

            setcookie("numList", $rowcount, time() + 3600);
            while($row = mysqli_fetch_array($results)){
                $checklist = '<div class="col s12 m5 offset-m1 z-depth-2 checklist" id="check' . $row['id'] . '">
                            <div class="checklist-header white-text blue row">
                                <div class="col s2">
                                     <input type="checkbox" class="filled-in filled-in-item" id="checklist' . $row['id'] . '">
                                     <label class="filled-in-box-task" for="checklist' . $row['id'] . '"></label>
                                </div>
                                <div class="col s8 input-field checklist-title">
                                        <textarea onchange="updateChecklist(this, this.value, this.id)" onkeyup="textAreaAdjust(this)" placeholder="checklist name" id="' . $row['id'] . '" type="text" class="large">'.$row['title'].'</textarea>
                                        <label for=""></label>
                                </div>
                                <div class="col s2">
                                    <p onclikc="deletChcklist(this.id)"><i class="material-icons trash-checklist">delete</i></p>
                                </div>
                            </div>
                            <ul class="checklist-body row">
                                <li class="row">
                                    <p id="' . $row['id'] . '" class="add-item grey-text">+ Add an Item</p>
                                </li>
                            </ul>
                        </div>';
                if ($row['active'] == 1)
                {
                    echo $checklist;
                }
                else
                {
                    echo $checklist;
                }
            }
        ?>
        <div class="col s12 m5 offset-m1 center">
            <a class="waves-effect waves-light btn add-checklist" id="new-chk-bt">+ &nbsp; NEW CHECKLIST</a>
        </div>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../js/bin/our_script.js"></script>
<script type="text/javascript" src="../../js/bin/checklistHandler.js"></script>
</body>
</html>

