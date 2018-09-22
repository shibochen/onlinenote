<?php
session_start();
include('connection.php');

include('logout.php');

include('remember.php');
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
        <title>Online Notes</title>
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

        </style>
    </head>

    <body>
        <!--Navigation Bar-->
        <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Online Notes</a>
                    <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                </div>

                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="features.php">Features</a></li>
                        <li><a href="contactus.php">Contact us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php 
                    $user = $_SESSION['username'];
                    if(!isset($_SESSION['username'])) {
                        echo '<li><a href="#loginModal" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                    } else {
                        echo "<li><a href='profile.php'><span class='glyphicon glyphicon-user'></span> $user</a></li>";
                        echo '<li><a href="index.php?logout=1"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>';   
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!--Jumbotron with Sign up Button-->
        <div class="jumbotron" id="myContainer">
            <h1>Online Notes App</h1>
            <p>Your Notes with you wherever you go.</p>
            <p>Easy to use, 100% private!</p>
            <button type="button" class="btn btn-lg btn-success signup" data-target="#signupModal" data-toggle="modal">Sign up-It's free</button>
        </div>

        <!--Login form-->
        <form method="post" id="loginform">
            <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                            <h3 id="myModalLabel">
                                Login
                            </h3>
                        </div>
                        <div class="modal-body">

                            <!--Login message from PHP file-->
                            <div id="loginmessage"></div>


                            <div class="form-group">
                                <label for="loginemail" class="sr-only">Email</label>
                                <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="loginpassword" class="sr-only">Password</label>
                                <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
                            </div>
                            <div class="checkbox">
                                <label>
                          <input type="checkbox" name="rememberme" id="rememberme">
                        Remember me
                      </label>
                                <a class="pull-right" style="cursor: pointer" data-dismiss="modal" data-target="#forgotpasswordModal" data-toggle="modal">
                      Forgot Password?
                      </a>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-success" name="login" type="submit" value="Login">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                  Cancel
                </button>
                            <button type="button" class="btn btn-info pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">
                  Register
                </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--Sign up form-->
        <form method="post" id="signupform">
            <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                            <h3 id="myModalLabel">Sign Up</h3>
                            <p>Please fill in this form to create an account.</p>
                        </div>
                        <div class="modal-body">

                            <!--Sign up message from PHP file-->
                            <div id="signupmessage"></div>

                            <div class="form-group">
                                <label for="username"><b>Username</b></label>
                                <input class="form-control" type="text" name="username" id="username" placeholder="Enter Username" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="email"><b>Email</b></label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="password"><b>Password</b></label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="password2"><b>Confirm Password</b></label>
                                <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm Password" maxlength="30">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-success" name="signup" type="submit" value="Sign up">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                  Cancel
                </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--Forgot password form-->
        <form method="post" id="forgotpasswordform">
            <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                            <h3 id="myModalLabel">
                                Find your Account
                            </h3>
                            <p>Please enter your email to search for your account.</p>
                        </div>

                        <div class="modal-body">
                            <!--forgot password message from PHP file-->
                            <div id="forgotpasswordmessage"></div>

                            <div class="form-group">
                                <label for="forgotemail" class="sr-only">Email:</label>
                                <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email" maxlength="50">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input class="btn btn-success" name="forgotpassword" type="submit" value="Submit">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                  Cancel
                </button>
                            <button type="button" class="btn btn-info pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">
                  Register
                </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        <!-- Footer-->
        <div class="footer">
                <p>online-notes &copy; <?php $today = date("Y"); echo $today?>. All rights reserved. </p>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/source.js"></script>
    </body>

    </html>
