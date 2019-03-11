<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX - les bases</title>
</head>
<body>
    <h1>Mon site</h1>
    <script>
        // on instancie le moteur AJAX
        var xhr = new XMLHttpRequest();
        xhr.addEventListener('readystatechange', function () {
            if (4 === xhr.readyState) {
                if (200 === xhr.status) {
                    console.log(xhr.response);
                }
            }
        });
        // Exécuter une requête HTTP
        xhr.open('GET', './worker.php');
        xhr.send();
    </script>
</body>
</html>