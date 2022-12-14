$('#subscribe').click( function() {
    var id = $('#subscribe').data('id');
            $.ajax({
                type: "POST",
                url: "http://localhost/gamekm/blocks/subscribe.php?user_id="+id,   
                dataType: "JSON",             
                // действие, при ответе с сервера
                success: function(data){
                    // в случае, когда пришло success. Отработало без ошибок
                    if(data.result == 'success'){              
                        document.getElementById('subscribe').innerText='В подписках';
                        var count = parseInt(document.getElementById('subscribersCounter').innerText);
                        document.getElementById('subscribersCounter').innerText=count+1;
                        
                        // Выводим сообщение
                        alert(data.msg);
                    }else{
                        // вывод сообщения об ошибке
                        alert(data.msg);
                    }

                }
            });

});

