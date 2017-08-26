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
    <link rel="stylesheet" href="css/font-awesome.css">

    <title>Trade Winds Landing</title>
</head>
<body>
        <nav id="navBar" class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a id="navBarBrand" class="navbar-brand" href="#">Trade Winds: Home </a>
            <div class="collapse navbar-collapse" id="main_navbar">
                <ul class="nav navbar-nav mr-auto"></ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Financial Modelling</a>
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
                                               <p>Start Date (YYYY-MM-DD)</p>
                                               <input type="text" class="form-control inputData" name = "startDate" placeholder="Start Date" value="2017-05-01">
                                           </div>
                                           <br/>
                                           <div class="inputBox" class="form-group">
                                               <p>End Date (YYYY-MM-DD)</p>
                                               <input type="text" class="form-control inputData" name ="endDate" placeholder="End Date" value="2017-05-30">
                                           </div>
                                       </form>
                                   </div>
                                    <br/>
                                    <button id="commodityData" type="button" class="btn btn-primary btn-lg">Get Data</button>
                                    <br/>
                                    <br/>
                                    <div id="spin"></div>
                                    <div id="commoditiesGraph">
                                    </div>
                               <!-- End of card body -->
                           </div>

                       </div>

                       <!-- Card 2 -->
                       <div class="card ">
                           <div class=" pannelHeaderTitleStyles card-header card-warning">Weather</div>
                           <div class="card-block">
                               <label>Enter location</label>
                               <input type="text" class="form-control" id="location"  placeholder="Enter location" value="Chicago">
                               <br/>
                               <p class="card-text ">Enter Date</p>
                               <form class="row">
                                   <div class="form-group">
                                       <input type="text" class="form-control" id="from" placeholder="Start Date" value="2017-02-10">
                                   </div>
                                   <br/>
                               </form>
                               <p>Select Weather data type to be returned:</p>
                               <br/>
                               <form action="">
                                   <input class="weatherDataType" type="radio" name="weatherType" value="Temperature"> Temperature<br>
                                   <input class="weatherDataType" type="radio" name="weatherType" value="Precipitation"> Precipitation<br>
                               </form>
                               <br/>
                               <button id="weatherData" type="button" class="btn btn-success">Get Data</button>
                               <br>
                               <div id="weatherDataGraph"></div>
                           </div>
                       </div>

                       <!-- Card 3 -->


                   </div>
               </div>
           </div>
           <div class="card ">
               <div class=" pannelHeaderTitleStyles card-header card-success">News</div>
               <div class="card-block">
                   <p>Select News type.</p>
                   <form action="">
                       <input class="newsRanking" type="radio" name="newsRanking" value="top"> top<br>
                       <input class="newsRanking" type="radio" name="newsRanking" value="latest"> latest<br>
                       <input class="newsRanking" type="radio" name="newsRanking" value="popular"> popular<br>
                   </form>
                   <br/>
                   <p>Select Source</p>
                   <select id = "news">
                       <option value="bbc-news">BBC News</option>
                       <option value="al-jazeera-english">Al Jazeera English</option>
                       <option value="bloomberg">Bloomberg</option>
                       <option value="business-insider">Business Insider</option>
                       <option value="cnn">CNN</option>
                       <option value="cnbc">CNBC</option>
                       <option value="financial-times">Financial times</option>
                       <option value="reuters">Financial times</option>
                       <option value="the-economist">The Economist</option>
                       <option value="the-hindu">The Hindu</option>
                       <option value="the-huffington-post">The Huffington Post</option>
                       <option value="the-telegraph">The Telegraph </option>
                       <option value="the-wall-street-journal">The Wall Street Journal </option>
                       <option value="the-washington-post">The Washington Post </option>
                       <option value="the-new-york-times">The New York Times </option>
                       <option value="usa-today">USA Today </option>
                       <option value="time">Time </option>
                   </select>
                   <br/>
                    <br/>
                    <br/>
                   <table class="table table-bordered">
                       <thead>
                       <th><span class="columnStyles">Author</span></th>
                       <th><span class="columnStyles">Published</span></th>
                       <th><span class="columnStyles">Title</span></th>
                       <th><span class="columnStyles">Summary</span></th>
                       </thead>
                       <tbody id="news">
                       </tbody>
                   </table>
               </div>
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
<script src="javascript/moments.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpikQ-Ge03zW56oZKIw9c4tD8thmtYrKc"></script>

</html>
