<?php

include("config/dbconfig.php");
session_start();
global $error;

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $myusername = mysqli_real_escape_string($link,$_POST['username']);
    $mypassword = mysqli_real_escape_string($link,$_POST['password']);

    $sql = "SELECT * FROM user WHERE username = '$myusername' and passcode = '$mypassword'";

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

        header('location: UI/Landing.php');

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
    </head>
        <body>

        <form class="form-horizontal" action="/" method="post">

            <input class="" type="text" placeholder="Enter Username" name="username" required>

            <input class="" type="password" placeholder="Enter Password" name="password" required>

            <button id="loginButton" type="submit" class="">Log in</button>

        </form>

        </body>
    </html>



    <?php
}
?>