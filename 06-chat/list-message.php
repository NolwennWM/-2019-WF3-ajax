<?php

$db = new PDO('mysql:host=127.0.0.1;dbname=api_ajax;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

header('Content-Type: application/json');

// On récupère tous les messages
$messages = $db->query('SELECT * FROM chat')->fetchAll();

// On renvoie les messages en json
echo json_encode($messages);
