<?php

sleep(3);

header('Content-Type: application/json');
$errors = [];

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $nom = $_POST['nom'] ?? null;
    $message = $_POST['message'] ?? null;
    $valide = true;
    if(strlen($nom) <2){
        $valide = false;
        $errors['name'] = 'Erreur name';
    }
    if(strlen($message) <2){
        $valide = false;
        $errors['message'] = 'Erreur message';
    }
    if($valide){
        echo json_encode(['success' => [
            'name' => $name,
            'message' => $message
        ]]);
    }else{
        echo json_encode(['errors' => $errors]);
    }
}else{
    $errors['message'] = 'Erreur not POST';
    echo json_encode(['errors' => $errors]);
}


?>