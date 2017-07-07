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
               <a id="navBarBrand" class="navbar-brand" href="#">Trade Winds </a>
                   <div class="collapse navbar-collapse" id="main_navbar">
                       <ul class="nav navbar-nav mr-auto"></ul>
                       <ul class="nav navbar-nav">
                           <li class="nav-item">
                               <a class="nav-link" href="#">Settings</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="#">Log out</a>
                           </li>
                       </ul>
                   </div>
           </nav>
           <!-- End of navbar-->
       </div>

       <div class="card-deck-wrapper">
           <div class="card-deck">

               <!-- Card 1 -->
               <div class="card">
                   <div class="card-header">Sun Gone</div>
                   <div class="card-block">
                       <p class="card-text">The top resources for all things related to the Sun.</p>
                       <a href="#" class="card-link">Sun Gone</a>
                       <a href="#" class="card-link">Still Gone</a>
                   </div>
               </div>

               <!-- Card 2 -->
               <div class="card">
                   <div class="card-header">Sun Up</div>
                   <div class="card-block">
                       <p class="card-text">Looks like the Sun has returned. Here's <a href="#" class="card-link">why</a>.</p>
                   </div>
               </div>

           </div>
       </div>

</body>
<!-- JavaScript-->
<script src="javascript/jquery.js"></script>
<script src="javascript/landing.js"></script>
<script src="javascript/bootstrap.js"></script>
</html>
