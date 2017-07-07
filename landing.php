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
                        <a class="nav-link" href="#">Financial Modelling</a>
                    </li>
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
                                   <div class="card-block">
                                       <select class="form-control">
                                           <option>Select Commodity</option>
                                           <option>Oil</option>
                                       </select>
                                       <br/>
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
                                   </div>
                                    <br/>
                                    <button type="button" class="btn btn-success">Get Data</button>
                                    <br/>
                                    <div id="commoditiesGraph">
                                        //Graph goes here
                                    </div>
                               <!-- End of card body -->
                           </div>

                       </div>

                       <!-- Card 2 -->
                       <div class="card ">
                           <div class=" pannelHeaderTitleStyles card-header card-warning">Weather</div>
                           <div class="card-block">
                               <label>Enter location</label>>
                               <div class="col-4">
                                   <input type="text" class="form-control" placeholder="Location">
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
                               <br/>
                               <button type="button" class="btn btn-success">Get Data</button>
                               <br>
                               <div id="weatherDataGraph">//Graph goes here... </div>
                           </div>
                       </div>

                       <!-- Card 3 -->
                       <div class="card ">
                           <div class=" pannelHeaderTitleStyles card-header card-success">News</div>
                           <div class="card-block">
                               <p class="card-text ">Enter topics of interest</p>
                               <div class="form-group">
                                   <input type="text" class="form-control" id="to" placeholder="Enter news topics of interest">
                               </div>
                               <br/>
                               <p>Select News type</p>
                               <div class="btn-group" data-toggle="buttons">
                                   <label class="btn btn-primary active">
                                       <input type="radio" name="options" id="option1" autocomplete="off" checked> News
                                   </label>
                                   <label class="btn btn-primary">
                                       <input type="radio" name="options" id="option2" autocomplete="off"> Social Media
                                   </label>
                               </div>
                           </div>

                           //News Data goes here

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
