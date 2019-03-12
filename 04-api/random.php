<?php
    $list = [
        [
            "brand" => "Apple",
            "model" => "iPhone XS",
            "price" => "899"
        ],
        [
            "brand" => "Apple",
            "model" => "iPhone XR",
            "price" => "999"
        ],
        [
            "brand" => "Apple",
            "model" => "iPhone X",
            "price" => "1199"
        ],
        [
            "brand" => "Apple",
            "model" => "iPhone 8",
            "price" => "799"
        ],
        [
            "brand" => "Samsung",
            "model" => "galaxy S10",
            "price" => "999"
        ],
        [
            "brand" => "Samsung",
            "model" => "galaxy S9",
            "price" => "599"
        ]
    ];
    $db = new PDO ("mysql:host=127.0.0.1;port=3306;dbname=api_ajax;charset=utf8;", 
                    "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
    $db->query("TRUNCATE TABLE `smartphone`");
    $q = $db->prepare("INSERT INTO `smartphone`(`brand`,`model`,`price`) VALUES (:brand, :model, :price)");
    foreach($list as $phone){
        $q->bindValue(":brand", $phone["brand"], PDO::PARAM_STR);
        $q->bindValue(":model", $phone["model"], PDO::PARAM_STR);
        $q->bindValue(":price", $phone["price"], PDO::PARAM_STR);
        $q->execute();
    }

?>