<?php

include("/config/dbconfig.php");


if(isset($_GET['getAssetClassList'])){

    getAssetClassList();
}

function getAssetClassList(){

    global $link;

    echo "Result from user table  is...";

}