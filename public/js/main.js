$(function(){


    if(location.hash == '#createSticker'){
        $('#stickerModal').modal('show');
    }


    var
        $stickerForm = $('#stickerForm'),
        $title =       $('#stickerTitle'),
        $body =        $('#stickerBody'),
        $bg =          $('#stickerBg')
    ;

    $stickerForm.on('submit', function(e){
        e.preventDefault();

        if($.trim($title.val()) == '' || $.trim($title.val()) == ''){
            alert('Не все поля заполнены!');
            return false;
        }

        $.ajax({
            url: $stickerForm.attr('action'),
            type: 'POST',
            data: {
                title: $title.val(),
                body:  $body.val(),
                bg:    $bg.val()
            },
            dataType: 'JSON',
            success: function(response){
                console.log(response);
            },
            error: function(){
                alert('Произошла ошибка!');
            }
        });


    });







}); // END READY