<?php

$db = new PDO('mysql:host=127.0.0.1;dbname=api_ajax;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $pseudo =  htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);
    // date('Y-m-d');
    $date = (new DateTime())->format('Y-m-d H:i:s');

    // On ajoute le message en BDD
    $query = $db->prepare('INSERT INTO `chat` (`pseudo`, `date`, `message`) VALUES (:pseudo, :date, :message)');
    $query->bindValue(':pseudo', $pseudo);
    $query->bindValue(':message', $message);
    $query->bindValue(':date', $date);
    $query->execute();

    echo json_encode([
        'pseudo'=> $pseudo,
        'message'=>$message,
        'date'=> $date
    ]);
}
