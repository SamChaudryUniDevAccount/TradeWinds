<?php

include("config/dbconfig.php");

if(isset($_GET['getAssetClassList'])){

    getAssetClassList();

}

function getAssetClassList(){

    global $link;

    $sql= "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='commodities_markets'";

    $result = mysqli_query($link,$sql);

    $jsonData = array();

    while($row = mysqli_fetch_assoc($result)) {

        $jsonData[] = $row;

    }

    if(count($jsonData) > 0){

        echo json_encode($jsonData);

    }else{

        $dataNotFound = 204;

        echo $dataNotFound;
    }


}