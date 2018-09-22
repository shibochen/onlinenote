<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content ="free, simple, notes">
        <meta name="description" content="free online notes app, please sign up as quick as possible!">
        <link rel="shortcut icon" type="image/png" href="https://static.apkthing.com/uploads/posts/2015-03/1426558891_do-note-by-ifttt62.png">
        <title>My Notes</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/source.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
        <style>
            body {
                background-color: blue;
                font-family: Arvo, serif;
                background: url("background.jpg") no-repeat center center;
                background-attachment: fixed;
                background-size: cover;
            }

            #container {
                margin-top: 120px;
            }

            #notePad,
            #allNotes,
            #done,
            .delete {
                display: none;
            }

            .buttons {
                margin-bottom: 20px;
            }

            textarea {
                width: 100%;
                max-width: 100%;
                font-size: 16px;
                line-height: 1.5em;
                border-left-width: 20px;
                border-color: #009dff;
                color: #222222;
                background-color: #FBEFFF;
                padding: 10px;

            }

            .noteheader {
                border: 1px solid grey;
                border-radius: 10px;
                margin-bottom: 10px;
                cursor: pointer;
                padding: 0 10px;
                background: linear-gradient(#FFFFFF, #ECEAE7);
            }

            .text {
                font-size: 20px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }

            .timetext {
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }

            .notes {
                margin-bottom: 100px;
            }

        </style>
    </head>

    <body>
        <!--Navigation Bar-->
        <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Online Notes</a>
                    <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                </div>

                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="mainpage.php">My Notes</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="features.php">Features</a></li>
                        <li><a href="contactus.php">Contact us</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username']?></a></li>
                        <li><a href="index.php?logout=1"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                    </ul>
                </div>
            </div>

        </nav>

        <!--Container-->
        <div class="container" id="container">
            <!--Alert Message-->
            <div id="alert" class="alert alert-danger collapse">
                <a class="close" data-dismiss="alert">
                &times;
              </a>
                <p id="alertContent"></p>

            </div>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="buttons">
                        <button id="addNote" type="button" class="btn btn-info btn-lg">Add Note</button>
                        <button id="edit" type="button" class="btn btn-info btn-lg pull-right">Edit</button>
                        <button id="done" type="button" class="btn btn-primary btn-lg pull-right">Done</button>
                        <button id="allNotes" type="button" class="btn btn-info btn-lg">View All Notes</button>
                    </div>

                    <div id="notePad">
                        <textarea rows="10"></textarea>
                    </div>

                    <div id="notes" class="notes">
                        <!-- Ajax call to a php file-->
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer-->
        <div class="footer">
                <p>online-notes &copy; <?php $today = date("Y"); echo $today?>. All rights reserved. </p>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mynotes.js"></script>
    </body>

    </html>
