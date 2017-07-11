<?php

include("config/dbconfig.php");

if (isset($_POST["getCommodityByAssetClass"])) {

    getCommodityByAssetClass();

}


function getCommodityByAssetClass(){

    global $link;
    $commodityType= "";

    $data = json_decode($_POST["getCommodityByAssetClass"],true);


    foreach ($data as $key=>$value){

        if($key == "commodityAssetClass"){

            $commodityType = $value;

        }else{

             echo "Sorry asset Class unknown";

        }

    }

    $sql = "SELECT Commodity_name FROM commodities_markets.".$commodityType;

        echo $sql;

    if(mysqli_query($link, $sql)){

        $result = mysqli_query($link,$sql);

        echo $result;

        $jsonData = array();

        while($row = mysqli_fetch_assoc($result)) {

            $jsonData[] = $row;

        }

        echo json_encode($jsonData);


    } else{

            echo "Error";

    }

}