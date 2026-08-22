<?php if(!empty($lockID)){ $lock = $lockID; }else { $lock = 0; } ?>
<div id="root"></div>
<script type="text/javascript">
$(document).ready(function(){
let urllogin      = '/template/function/login';
let serviceUrl    = '/template/content/secure/lockscreen';
let getID         = '?lock=<?php echo $lock; ?>';
var objXMLHttpRequest = new window.XMLHttpRequest();
var url = new URL (baseUrl + serviceUrl + baseUrlformat + getID);
objXMLHttpRequest.onreadystatechange = function() {
if(objXMLHttpRequest.readyState === 4) {
if(objXMLHttpRequest.status === 200) {
objXMLHttpRequest.onload = function () {
document.getElementById("root").innerHTML=objXMLHttpRequest.responseText;
};
}else {
reject('Error Code: ' +  objXMLHttpRequest.status + ' Error Message: ' + objXMLHttpRequest.statusText);
}
}
}
objXMLHttpRequest.open("GET", encodeURI(url), false);
objXMLHttpRequest.send();
// lockscreen login now
$('.submit').click( function() {
var nameLogs       = $('#nameLogs').val();
var emailLogs      = $('#emailLogs').val();
var passwordLogs   = $('#passwordLogs').val();
$.ajax({
url: baseUrl + urllogin + baseUrlformat + getID,
method:"post",
data:{nameLogs:nameLogs,emailLogs:emailLogs,passwordLogs:passwordLogs},
dataType:"text",
success:function(data){
if(data !== 'Login success'){
$("#emailLogs").css("border-color","#FF5733");
$("#passwordLogs").css("border-color","#FF5733");
toastr.error(data);
}else{
if(data == 'Login success'){
toastr.success(data);
}
}
}
});
});
});
</script>
