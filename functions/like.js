$('.likeButton').click( function() {
    var post_id = $('.likeButton').data('postid');
            $.ajax({
                type: "POST",
                url: "http://localhost/gamekm/blocks/response.php?post_id="+post_id,   
                dataType: "JSON",             
                // действие, при ответе с сервера
                success: function(data){
                    // в случае, когда пришло success. Отработало без ошибок
                    if(data.result == 'success'){
                        // увеличим визуальный счетчик               
                        var count = parseInt(document.getElementById('span_like').innerText);
                        document.getElementById('span_like').innerText=count+1;
                        document.getElementById('label').innerText='В избранном';
                        // Выводим сообщение
                        alert(data.msg);
                    }else{
                        // вывод сообщения об ошибке
                        alert(data.msg);
                    }

                }
            });

})
