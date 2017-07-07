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
           <nav id="navBar" class="navbar navbar-toggleable-md navbar-light bg-faded">
               <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>
               <a class="navbar-brand" href="#">Trade Winds</a>
               <div class="  collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class=" navBarMenuLinks  navbar-nav">
                       <li class="nav-item active ">
                           <a class="  nav-link float-lg-right" href="#">Settings </a>
                       </li>
                       <li class=" navBarMenuLinks nav-item">
                           <a class="  nav-link float-lg-right " href="#">Log out</a>
                       </li>

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
