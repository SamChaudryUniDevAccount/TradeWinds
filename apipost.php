<?php

include("config/dbconfig.php");

if (isset($_POST["getCommodityByAssetClass"])) {

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

}


function getCommodityByAssetClass(){





}