<?php
    header('Content-Type: application/json');
    $db = new PDO ("mysql:host=127.0.0.1;port=3306;dbname=api_ajax;charset=utf8;", 
                    "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $q = $db->query("SELECT * FROM smartphone");
    $r = $q -> fetchAll(PDO::FETCH_ASSOC);
    
    $jsonR = json_encode($r);
    
    echo $jsonR;
    
?>