<?php

include("config/dbconfig.php");


if (isset($_POST["getCommodityByAssetClass"])) {

    getCommodityByAssetClass();

}else if(isset($_POST["getCommodityData"])){


    getCommodityData();

}else if(isset($_POST["getWeatherData"])) {


    getWeatherData();

}
//Weather
function getWeatherData(){

    global $link;

    $startDate = "";
    $end_date = "";
    $lat = "";
    $long = "";

    $data = json_decode($_POST["getWeatherData"]);

    foreach ($data as $key => $value) {

        if ($key=="startDate") {

            $startDate = $value;

        } elseif($key== "endDate") {

            $end_date = $value;

        }elseif($key == "lat"){

            $lat = $value;


        }elseif($key == "long"){

            $long = $value;

        }


    }

    //echo $end_date;

    //&APPID

    //Api key = 8e07349ba5a0efa82c941d6b20ba1333

    //API key
    //"http://history.openweathermap.org/data/2.5/history/city?lat={lat}&lon={lon}&type=hour&start={start}&end={end}&APPID=8e07349ba5a0efa82c941d6b20ba1333 ";
    //http://api.openweathermap.org/data/2.5/weather?q=London&appid=e675bd75ba3bba20b5e9cad0cd2057cf

     echo $url = "http://api.openweathermap.org/data/2.5/history/city?lat=".$lat."&lon=".$long."&type=hour"."&start=".$startDate."&end=".$end_date."&appid=e675bd75ba3bba20b5e9cad0cd2057cf";

    //$weatherdata = file_get_contents($url);

    //$weatherdataToReturn = json_decode($weatherdata,true);


   // echo json_encode($weatherdataToReturn);



}








function getCommodityData(){

    global $link;

    $data = json_decode($_POST["getCommodityData"]);

    foreach ($data as $key => $value) {

        if ($key=="commodityType") {

            $commodityType = $value;

        } elseif($key== "commodityname") {

            $commodityName = $value;

        }elseif($key == "startDate"){

            $start_date = $value;


        }elseif($key == "endDate"){

            $end_date = $value;

        }


    }


    $sql = "SELECT End_point FROM commodities_markets.".$commodityType." WHERE Commodity_name LIKE '%$commodityName%'";

    if (mysqli_query($link, $sql)) {

        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

            $commodityEndPoint = preg_replace( "/\r|\n/", "", $row['End_point']);

        }

    }
    
    $commidityUrl = "https://www.quandl.com/api/v3/datasets/".$commodityEndPoint."/"."data.json"."?"."start_date=".$start_date."&"."end_date=".$end_date."kv_y-Xcvsk1h3wQ1TNPE";

    $commoditydata = file_get_contents($commidityUrl);

    $dateToReturn = json_decode($commoditydata,true);

     //429 to many requests
    //echo var_dump($http_response_header, $dateToReturn);

    echo json_encode($dateToReturn);

}



//Get subclass of commodities.
function getCommodityByAssetClass(){

    global $link;
    $commodityType = "";

    $data = json_decode($_POST["getCommodityByAssetClass"]);

    foreach ($data as $key => $value) {

        if ($key == "commodityAssetClass") {

            $commodityType = $value;

        } else {

            echo "Sorry asset Class unknown";

        }

        //SQL
        $sql = "SELECT Commodity_name FROM commodities_markets.".$commodityType;

        if (mysqli_query($link, $sql)) {

            $result = mysqli_query($link, $sql);

            $jsonData = array();

            while ($row = mysqli_fetch_assoc($result)) {

                $jsonData[] = $row;

            }

            echo json_encode($jsonData);


        } else {

            echo "Error";


        }

    }
}