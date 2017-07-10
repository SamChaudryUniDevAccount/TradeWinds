<?php

include("config/dbconfig.php");

//baseURL for Quandl

//Dark skies for weather

if(isset($_GET['getAssetClassList'])){

    getAssetClassList();
}

function getAssetClassList(){

    $queryError = 204;
    global $link;


    //$sql= "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA= 'commodities_markets'";


    $result = mysqli_query($link,"SELECT * FROM commodities_markets.coal");

    echo "result is->>".$result;

    $jsonData = array();

    while($row = mysqli_fetch_assoc($result)) {

        $jsonData[] = $row;

    }

    if(count($jsonData) > 0){

        echo json_encode($jsonData);

    }else{


        echo $queryError;
    }


}