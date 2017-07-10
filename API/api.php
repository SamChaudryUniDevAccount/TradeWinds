<?php

include("/config/dbconfig.php");


if(isset($_GET['getAssetClassList'])){

    getAssetClassList();
}

function getAssetClassList(){

    global $link;

    $sql = "SELECT * FROM user";

    $result = mysqli_query($link,$sql);

    echo "Result from user table  is...".var_dump($result);

}