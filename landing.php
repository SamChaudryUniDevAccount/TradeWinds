<?php

include("session_manager/session.php");

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Trade Winds Landing</title>

</head>
<body>
       <div class="container-fluid">
           <!-- Navbar start-->
           <nav id="navBar" class="navbar navbar-default">
               <!-- Trade Winds options -->
               <div id="navbarCollapse" class="collapse navbar-collapse">
                   <ul class="nav navbar-nav">
                       <li class="active"><a href="#">Home</a></li>
                       <li><a href="#">Profile</a></li>
                       <li><a href="#">Messages</a></li>
                   </ul>
                   <ul class="nav navbar-nav navbar-right">
                       <li><a href="#">Login</a></li>
                   </ul>
               </div>
           </nav>
           <!-- End-->







       </div>
</body>
<!-- JavaScript-->
<script src="javascript/jquery.js"></script>
<script src="javascript/landing.js"></script>
<script src="javascript/bootstrap.js"></script>
</html>
