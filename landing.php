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
        <br/>
        <br/>
    <!-- End of navbar-->
       <div class="container-fluid">
           <div class="pannelSection">
               <!-- Card Deck-->
               <div class="card-deck-wrapper">
                   <div class="card-deck">
                       <!-- Card 1 -->
                       <div class="card ">
                           <div class=" pannelHeaderTitleStyles card-header card-primary">Commodity</div>
                           <div class="card-block">
                               <p class="card-text ">Chose commodity to analyse.</p>
                                 <label>Select Commodity</label>
                                <br/>
                               <div class="btn-group">
                                   <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Select Commodity
                                   </button>
                                   <div class="dropdown-menu ">
                                       <ul class="dropdown-item">Oil</ul>
                                       <ul class="dropdown-item">Cotton </ul>
                                       <ul class="dropdown-item">Gas</ul>
                                   </div>
                               </div>
                                    <br/>
                                   <p class="card-text ">Select Date range</p>
                                    <form class="row">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="from" placeholder="Start Date">
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="to" placeholder="End Date">
                                        </div>
                                    </form>
                               <!-- End of card body -->
                           </div>

                       </div>

                       <!-- Card 2 -->
                       <div class="card ">
                           <div class=" pannelHeaderTitleStyles card-header card-warning">Weather</div>
                           <div class="card-block">
                               <p class="card-text ">//Weather analyisis panael.</p>
                           </div>
                       </div>

                       <!-- Card 3 -->
                       <div class="card ">
                           <div class=" pannelHeaderTitleStyles card-header card-success">News</div>
                           <div class="card-block">
                               <p class="card-text pannelHeaderTitleStyles">//News pannel</p>
                           </div>
                       </div>

                       <!-- End of card decks -->
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
