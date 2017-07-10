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


    $sql= "SELECT * FROM user ";


    $result = mysqli_query($link,$sql);

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