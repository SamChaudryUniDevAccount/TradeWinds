<?php

include("config/dbconfig.php");

session_start();

global $error;

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $myusername = mysqli_real_escape_string($link,$_POST['username']);
    $mypassword = mysqli_real_escape_string($link,$_POST['password']);


    $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";

    if ($result = mysqli_query($link,$sql))
    {
        $count = mysqli_num_rows($result);
        echo $count;
    }
    else{

        echo "ERROR Something not working!";
    }

    if($count == 1) {

        $_SESSION['login_user'] = $myusername;

        echo "count is 1";

        header('location: landing.php');

    }else {

        $error = "Your Login Name or Password is invalid";

        header('location: index.php');
    }
}
else{

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Trade Winds Login </title>
        <!-- CSS-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
        <body class="container-fluid background">

        <!-- Modal -->
        <div class="modal fade" id="loginModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Trade Winds</h5>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/" method="post">
                            <div class="form-group">
                                <label  class="col-lg-12 control-label labels">Username</label>
                                <div class="col-lg-12">
                                    <input class="col-lg-12" type="text" placeholder="Enter Username" name="username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label labels">Password</label>
                                <div class="col-lg-12">
                                    <input class="col-lg-12" type="password" placeholder="Enter Password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-5 col-lg-12">
                                    <button id="loginButton" type="submit" class="btn btn-success   btn-block">Sign in</button>
                                    <br/>
                                    <p>Disclaimer: By logging in users are agreeing to use this application at their own risk.</p>
                                    <p><?php echo $error?></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        </body>
    </html>
    <!-- JavaScript-->
    <script src="javascript/jquery.js"></script>
    <script src="javascript/login.js"></script>
    <script src="javascript/bootstrap.js"></script>
    <?php
}
?>