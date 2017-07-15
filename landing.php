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
                        <a class="nav-link" href="logout.php">Log out</a>
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
                                       <p>Select Asset Class</p>
                                       <select id="assetClass"class="form-control inputData" name="commodityType">
                                       </select>
                                       <br>
                                        <p>Select Commodity</p>
                                       <div class="row">
                                            <select id="assetType" class="form-control inputData" name="commodityname">
                                            </select>

                                       </div>
                                       <br/>
                                       <br/>
                                       <p class="card-text ">Select Date range</p>
                                       <form class="row">
                                           <div class="form-group">
                                               <input type="text" class="form-control inputData" name = "startDate" placeholder="Start Date" value="2017-02-10">
                                           </div>
                                           <br/>
                                           <div class="form-group">
                                               <input type="text" class="form-control inputData" name ="endDate" placeholder="End Date" value="2017-06-01">
                                           </div>
                                       </form>
                                   </div>
                                    <br/>
                                    <button id="commodityData" type="button" class="btn btn-success">Get Data</button>
                                    <br/>
                                 <div id="spinner"></div>
                                    <div id="commoditiesGraph">



                                    </div>
                               <!-- End of card body -->
                           </div>

                       </div>

                       <!-- Card 2 -->
                       <div class="card ">
                           <div class=" pannelHeaderTitleStyles card-header card-warning">Weather</div>
                           <div class="card-block">
                               <label>Enter location</label>>
                               <input type="text" class="form-control" id="to" placeholder="Enter location">
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


                       <!-- End of card decks -->
                   </div>
               </div>
           </div>
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
                           <input type="radio" name="options" id="news" autocomplete="off" checked> News
                       </label>
                       <label class="btn btn-primary">
                           <input type="radio" name="options" id="socialMedia" autocomplete="off"> Social Media
                       </label>
                   </div>
               </div>

               <div id="test"></div>

           </div>
       </div>

</body>
<!-- JavaScript-->
<script src="javascript/jquery.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="javascript/landing.js"></script>
<script src="javascript/bootstrap.js"></script>
<script src="javascript/jquery.babypaunch.spinner.js"></script>


</html>
