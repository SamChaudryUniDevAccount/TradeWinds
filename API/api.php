<?php

include("/config/dbconfig.php");


if(isset($_GET['getAssetClassList'])){

    getAssetClassList();
}

function getAssetClassList(){

    global $link;

    $sql= "SELECT *  FROM users";

    $result = mysqli_query($link,$sql);

    $jsonData = array();

    while($row = mysqli_fetch_assoc($result)) {

        $jsonData[] = $row;

    }

    if(count($jsonData) > 0){

        echo count($jsonData);

    }else{

        $dataNotFound = 204;

        echo $dataNotFound;
    }



}