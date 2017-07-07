<?php

include("session_manager/session.php");

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <!-- CSS-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta charset="UTF-8">
    <title>Trade Winds Landing</title>

</head>
<body>
       <div class="container-fluid">
               <div id="navBar" class="navbar-nav">
                   <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                   <a class="nav-item nav-link" href="#">Features</a>
                   <a class="nav-item nav-link" href="#">Pricing</a>
                   <a class="nav-item nav-link disabled" href="#">Disabled</a>
               </div>
       </div>
</body>
<!-- JavaScript-->
<script src="javascript/jquery.js"></script>
<script src="javascript/login.js"></script>
<script src="javascript/bootstrap.js"></script>
</html>
