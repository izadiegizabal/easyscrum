<!DOCTYPE html>
<html lang="en">
<head>
    <!--Import Google Icon Font-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../sass/materialize.css"  media="screen,projection"/>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body style="background-color: #2A2C35;">
    <h1 class="center white-text">Easy Scrum</h1>
    <br/>

    <div class="row progress-col">
        <!--Product Backlog-->
        <div id='1' class="col s12 m4 l2">
            <div class="pink backlog-header">
                <h5 class="white-text center">Product Backlog</h5>
            </div>
            <div class="grey lighten-3 backlog-body mycard" style="min-height: 400px;">
                <div class="">
                    <!-- Modal Trigger -->
                    <a id='1' class="open_modal waves-effect waves-light btn modal-trigger pink" href="#modal1">+</a>
                </div>
                <?php
                    $card_id = 1;
                    include 'show.php';
                ?>
            </div>
        </div>
        <!--End Product Backlog-->

        <!--Sprint Backlog-->
        <div id='2' class="col s12 m4 l2">
            <div class="purple backlog-header">
                <h5 class="white-text center">Product Backlog</h5>
            </div>
            <div class="grey lighten-3 backlog-body mycard" style="min-height: 400px;">
                <div class="">
                    <!-- Modal Trigger -->
                    <a id='2' class="open_modal waves-effect waves-light btn modal-trigger purple" href="#modal1">+</a>
                </div>
                <?php
                    $card_id = 2;
                    include 'show.php';
                ?>
            </div>
        </div>
        <!--End Sprint Backlog-->

        <!--In Progress-->
        <div id='3' class="col s12 m4 l2">
            <div class="deep-purple backlog-header">
                <h5 class="white-text center">In Progress</h5>
            </div>
            <div class="grey lighten-3 backlog-body mycard" style="min-height: 400px;">
                <div class="">
                    <!-- Modal Trigger -->
                    <a id='3' class="open_modal waves-effect waves-light btn modal-trigger deep-purple" href="#modal1">+</a>
                </div>
                <?php
                    $card_id = 3;
                    include 'show.php';
                ?>
            </div>
        </div>
        <!--End In Progress-->

        <!--Done Sprint-->
        <div id='4' class="col s12 m4 l2">
            <div class="indigo backlog-header">
                <h5 class="white-text center">Done Sprint</h5>
            </div>
            <div class="grey lighten-3 backlog-body mycard" style="min-height: 400px;">
                <div class="">
                    <!-- Modal Trigger -->
                    <a id='4' class="open_modal waves-effect waves-light btn modal-trigger indigo" href="#modal1">+</a>
                </div>
                <?php
                    $card_id = 4;
                    include 'show.php';
                ?>
            </div>
        </div>
        <!--End Done Sprint-->

        <!--Done Project-->
        <div id='5' class="col s12 m4 l2">
            <div class="blue backlog-header">
                <h5 class="white-text center">Done Project</h5>
            </div>
            <div class="grey lighten-3 backlog-body mycard" style="min-height: 400px;">
                <div class="">
                    <!-- Modal Trigger -->
                    <a id='5' class="open_modal waves-effect waves-light btn modal-trigger blue" href="#modal1">+</a>
                </div>
                <?php
                    $card_id = 5;
                    include 'show.php';
                ?>
            </div>
        </div>
        <!--End Done Project-->
    </div>

    <!-- Task Modal Structure -->
    <div id="modal1" class="modal">
        <div class="task-header">
            <div class="input-field white-text">
                <input placeholder="PB1: Checklist..." id="task-title" type="text" class="modal-title white-text">
                <label for="task-title">Task Title</label>
            </div>
            <div>
                <p><i class="material-icons">delete</i></p>
            </div>
        </div>
        <div class="task-content">
            <h5>User Story</h5>
         <!--    <div class="input-field">
                <input class="user-who" placeholder="User" id="us-as" type="text">
                <label for="us-as">As a(n)</label>
            </div> -->
            <div class="input-field">
                <textarea  placeholder="Be able to create as much checklists I think are necessary for the project / case" id="us-want" class="modal-description materialize-textarea"></textarea>
                <label for="us-want">I want to</label>
            </div>
            <div class="input-field">
                <textarea  placeholder="I can create subtasks that I need to finish first before having finished the bigger ones" id="us-so" class="modal-reason materialize-textarea"></textarea>
                <label for="us-so">So that</label>
            </div>
        </div>
        <div class="task-footer">
            <div class="row">
                <div class="input-field col s12 m6">
                    <select class="modal-estimate">
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
                    <select class="modal-value">
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
                <a href="#!" class="save_modal modal-action modal-close waves-effect waves-light btn-flat white-text">Save</a>
            </div>
        </div>
    </div>
    <!--JavaScript -->

    <script type="text/javascript" src="../../js/bin/materialize.js"></script>
    <script type="text/javascript" src="../../js/bin/our_script.js"></script>
</body>
</html>