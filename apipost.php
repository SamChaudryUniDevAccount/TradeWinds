<?php

include("config/dbconfig.php");

if (isset($_POST["getCommodityByAssetClass"])) {

    getAssetClassList();

}


function getCommodityByAssetClass(){

    global $link;
    $commodityType= "";

    $data = json_decode($_POST["getCommodityByAssetClass"],true);

    //commodityAssetClass

    echo $data;

    foreach ($data as $key=>$value){

        if($key == "commodityAssetClass"){

            $commodityType = $value;

                echo($commodityType);

        }else{

             echo "Sorry asset Class unknown";

        }

    }

    $sql = "SELECT Commodity_name FROM commodities_markets.".$commodityType;

    echo $sql;

    if(mysqli_query($link, $sql)){

        $result = mysqli_query($link,$sql);

        $jsonData = array();

        while($row = mysqli_fetch_assoc($result)) {

            $jsonData[] = $row;

        }

        echo json_encode($jsonData);


    } else{

            echo "Error";

    }

}