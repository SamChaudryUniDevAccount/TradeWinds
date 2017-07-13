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

    $start_date ="2017-02-10";
    $end_date = "2017-05-02";
    $commodityType= "";
    $commodityName = "";

    //commodityType":"coal","commodityname":"U.S. Coals, 1949-2005","startDate":"2017/02/2017","endDate":"2017/02/2017


    //Refactor to helper method..
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

    echo $commodityType.$commodityName.$start_date.$end_date;





    //Dummy End points from database
    //$commodityEndPoint = "CHRIS/CME_S1";

        $commodityEndPoint = "";


    //Date Range test
    $start_date ="2017-02-10";
    $end_date = "2017-05-02";

    //Working correctly building up the url
    $commidityUrl = "https://www.quandl.com/api/v3/datasets/".$commodityEndPoint."/"."data.json"."?".$start_date."&".$end_date."&api_key=kv_y-Xcvsk1h3wQ1TNPE";

    $commoditydata = file_get_contents($commidityUrl);

    //echo json_encode($commoditydata);

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