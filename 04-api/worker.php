<?php

if("POST" === $_SERVER['REQUEST_METHOD']){
    $brand = $_POST['brand'] ?? null;
    $model = $_POST['model'] ?? null;
    $price = $_POST['price'] ?? null;
    $valide = true;

    if(strlen($brand) <= 2){
        $valide = false;
    }
    if(strlen($model) <= 2){
        $valide = false;
    }
    if($price < 1){
        $valide = false;
    }
    if($valide){
        $db = new PDO ("mysql:host=127.0.0.1;port=3306;dbname=api_ajax;charset=utf8;", 
                    "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $q = $db->prepare("INSERT INTO cars (`brand`,`model`,`price`) VALUES(:brand, :model, : price)");
        $q -> bindValue(":brand", $brand, );
    }

}

?>