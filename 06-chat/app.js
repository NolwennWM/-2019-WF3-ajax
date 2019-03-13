var form = $('form');

form.on('submit', function(event){
    event.preventDefault();

    var formData = form.serialize();

    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: formData
    }).done(function(response){
        $('#messages').append(`
            <div class="media mt-5">
                <div class="media-body">
                    <h5>`+response.pseudo+` à `+response.date+` :</h5>
                    `+response.message+`
                </div>
                <img src="default-avatar.png" alt="`+response.pseudo+`">
            </div>
        `);
    });
});
setInterval(function(){
    $.get('./list-message.php').done(function (messages) {
        $('#messages').html('');
        for (message of messages) {
            $('#messages').append(`
                <div class="media mt-5">
                    <div class="media-body">
                        <h5>`+message.pseudo+` à `+message.date+` :</h5>
                        `+message.message+`
                    </div>
                    <img src="default-avatar.png" alt="`+message.pseudo+`">
                </div>
            `);
        }
    });
}, 1000);