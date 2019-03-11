<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX - les bases</title>
</head>
<body>
    <h1 id="title">Mon site</h1>
    <button id="change">change</button>
    <script>
        // on instancie le moteur AJAX
        var xhr = new XMLHttpRequest();
        xhr.addEventListener('readystatechange', function () {
            if (4 === xhr.readyState) {
                if (200 === xhr.status) {
                    console.log(xhr.response);
                    titre.innerText = xhr.response;
                }
            }
        });
        // Exécuter une requête HTTP
        xhr.open('GET', './worker.php');
        xhr.send();

        /**
         * Exercice 
         * 1. Ecouter l'événement au clic sur le bouton
         * 2. À chaque clic, on exécute une nouvelle requête AJAX sur le serveur
         * pour récupérer une nouvelle phrase et modifier le contenu du h1.
         */
        var button = document.getElementById("change");
        var titre = document.getElementById("title");
        button.addEventListener('click', function(){
            xhr.open('GET', './worker.php');
            xhr.send();
        });
    </script>
</body>
</html>