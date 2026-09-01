<?php
require_once __DIR__ . '/../views/home.php';
?>
<script>
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v2.11';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script>
$('.submit').click( function(){
var form_name      = $('#form_name').val();
var form_email     = $('#form_email').val();
var form_subject   = $('#form_subject').val();
var form_message   = $('#form_message').val();
$.ajax({
url: baseUrl + functionUrl + baseUrlformat,
method:"post",
data:{form_name:form_name,form_email:form_email,form_subject:form_subject,form_message:form_message},
dataType:"text",
success:function(data){
var check = ['Value is required'];
if(check.includes(data)){
$("#form_name").css("border-color","#FF5733");
$("#form_email").css("border-color","#FF5733");
$("#form_subject").css("border-color","#FF5733");
$("#form_message").css("border-color","#FF5733");
$(".result").html(data);
}else{
$(".result").html(data);
}
}
});
});
</script>
