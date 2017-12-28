function subscribe(el){
    var form = $(el).parents('form');
    var url = '/ajax/subscribe.php';
    var data = form.serialize();
    $.ajax({
        url:url,
        type:'post',
        data:data,
        success:function(result){
            if(result=='OK'){
                form.find("#sf_EMAIL_mess").show().text('Подписка успешно оформлена.');
            }else{
                form.find("#sf_EMAIL_mess").show().text('Ошибка. Подписка не оформлена.');
            }
            setTimeout(function(){
                form.find("#sf_EMAIL_mess").hide();
            },5000);
        }
    });
}