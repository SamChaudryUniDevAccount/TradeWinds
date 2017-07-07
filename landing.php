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
           <nav class="navbar navbar-default">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                   <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                       <span class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>
                   <a href="#" class="navbar-brand">Brand</a>
               </div>
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
