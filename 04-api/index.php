
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smartphone</title>
    <style>
    img{
        max-width : 300px;
    }
    #cars div div{
        display: none;
    }
    </style>
</head>
<body>
    <div id="smartphone">
        <ul>
        </ul>
    </div>
    <div id="cars">

    </div>
    <div id="formu">
        <form action="" >
            <label for="brand">Marque</label><br>
                <input type="text" name="brand" id="brand"><br>
            <label for="model">Modèle</label><br>
                <input type="text" name="model" id="model"><br>
            <label for="price">Prix</label><br>
                <input type="number" name="price" id="price"><br>
                <button>Envoyer</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>

        $.ajax({
            type: 'POST',
            url: './smartphone.php',
            dataType: 'json'
        }).done(function(phone){
            var list = $("ul").eq(0);
            $.each(phone, function(ind, val){
                var r = $("<li></li>").html(val.brand+' '+val.model);
                list.append(r);
            });
        });
        $.get('./cars.php').done(function(cars){
            var carzone = $("#cars");
            $.each(cars, function(ind, car){
                var r = $("<div></div>").html("<img src='./images/car_"+car.id+".jpg'>");
                r.append("<div>"+car.brand+' '+car.model+': '+car.price+"</div>");
                carzone.append(r);
            });
            var togcar = $("div#cars > div");
            togcar.on('click', function(){
                $(this).find("div").toggle();
            });
        });

        form.on('submit', function (event) {
            event.preventDefault();

            var formData = form.serialize(); 

            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
            }).done(function (message) {

            });
        });
    </script>
</body>
</html>