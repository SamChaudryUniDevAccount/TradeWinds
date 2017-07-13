<?php

include("config/dbconfig.php");


if (isset($_POST["getCommodityByAssetClass"])) {

    getCommodityByAssetClass();

}else if(isset($_POST["getCommodityData"])){


    getCommodityData();

}

function getCommodityData(){

    global $link;

    $data = json_decode($_POST["getCommodityData"]);

    $commodityType= "";
    $commodityName = "";
    $commodityEndPoint = "";


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

            $returnedRow = $row['End_point'];

            $commodityEndPoint = preg_replace( "/\r|\n/", "", $returnedRow);

        }

    }

    $commidityUrl = "https://www.quandl.com/api/v3/datasets/".$commodityEndPoint."/"."data.json"."?"."start_date=".$start_date."&"."end_date=".$end_date."kv_y-Xcvsk1h3wQ1TNPE";

    $commoditydata = file_get_contents($commidityUrl);

    $dateToReturn = json_decode($commoditydata,true);

    //echo $commidityUrl;

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