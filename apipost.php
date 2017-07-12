<?php

include("config/dbconfig.php");


if (isset($_POST["getCommodityByAssetClass"])) {

    getCommodityByAssetClass();

}else if(isset($_POST["getCommodityData"])){


    getCommodityData();

}

function getCommodityData(){








    //Dummy End points from database
    $exchangeCode = "WORLDBANK";
    $commodity = "WLD_PHOSROCK";


    //Date Range
    $start_date ="2017-02-10";
    $end_date = "2017-05-02";

    //Working correctly building up the url
    $baseUrl = "https://www.quandl.com/api/v3/datasets/".$exchangeCode."/".$commodity."/"."data.json"."?".$start_date."&".$end_date."&api_key=kv_y-Xcvsk1h3wQ1TNPE";

    $commoditydata = file_get_contents($baseUrl);

    json_encode($commoditydata);

    echo $baseUrl;

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