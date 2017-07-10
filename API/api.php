<?php


include_once("../config/dbconfig.php");

//Working
if(isset($_GET['getAssetClassList'])){

    global $link;

    $sql= "SELECT *  FROM user";

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
