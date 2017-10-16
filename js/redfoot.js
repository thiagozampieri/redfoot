/**
 * Created by thiagozampieri on 06/10/17.
 */
var Redfoot = function(){

    this.run = function(){
        var name = $("input[name=name]").val();
        var email = $("input[name=email]").val();
        var phone = $("input[name=phone]").val();
        var message = $("textarea[name=message]").val();

        $("#status").html("");

        if(name != '' & email != '' & phone != '') {
            window.scrollTo(0, 0);
            jQuery.post('app/forms/mail.php', {
                name: name,
                email: email,
                phone: phone,
                message: message
            }, function (response) {
                $("#status").html(response).show();
            });
        }
        else
        {
            alert('Todos os campos são importantes');
        }
    }
}