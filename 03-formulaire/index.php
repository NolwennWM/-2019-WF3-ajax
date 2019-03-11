<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>Envoyez votre message.</h1>
    <!--
        Formulaire:
        1. Ajouter Bootstrap sur la page. (peut être)
        2. Ajouter un formulaire en POST avec deux champs (Nom et message).
        3. Le formulaire sera traité sur le fichier worker.php (action).
        4. On va vérifier que le nom et le message fasse au moins 2 caractères.
        5. Si le formulaire est valide, on affiche "Succès".
        6. S'il y a des erreurs, on les affiche.
        7. AJAX en bonus
    -->
    <form action="worker.php" method="post" class="container">
        <div class="row">
            <label for="nom" class="col-12">Nom:<br>
                <input type="text" name="nom" id="nom" class="form-control">
            </label><br>
            <label for="message" class="col-12">Message:<br>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
            </label><br>
            <button class="btn btn-success form-control">Envoyer</button>
        </div>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        var form = $('form');

        form.on('submit', function (event) {
            event.preventDefault(); // On n'exécute pas la requête POST directement

            var formData = form.serialize(); // On récupère les données du formulaire

            // On exécute la requête POST via AJAX
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                // On peut forcer le contenu en JSON si le serveur
                // ne renvoie pas la bonne en-tête
                // dataType: 'json'
                beforeSend: function(){
                    $('h1').html('Chargement en cours...');
                },
            }).done(function (message) {
                if(message.success){
                    
                }
            });
        });
            
    </script>
</body>
</html>