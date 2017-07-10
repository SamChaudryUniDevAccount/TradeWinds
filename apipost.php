<?php

if (isset($_POST["getCommodityByAssetClass"])) {

    getAssetClassList();

}


function getCommodityByAssetClass(){


    $data = json_decode($_POST["getCommodityByAssetClass"],true);


    echo $data;

}