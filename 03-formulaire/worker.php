<?php
sleep(3);
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $nom = $_POST['nom'] ?? null;
    $message = $_POST['message'] ?? null;
    $valide = true;
    if(strlen($nom) <2){
        $valide = false;
    }
    if(strlen($message) <2){
        $valide = false;
    }
    if($valide){
        echo "Succès";
    }else{
        echo "Nom ou message trop court";
    }
}else{
    echo "Page attendant une method POST";
}


?>