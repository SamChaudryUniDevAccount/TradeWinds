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


    $sql= "SELECT * FROM exchanges ";


    $result = mysqli_query($link,$sql);

    echo $result;



}