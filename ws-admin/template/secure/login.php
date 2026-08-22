<div id="root"></div>
<script type="text/javascript">
let urllogin      = '/template/function/login';
let serviceUrl    = '/template/content/secure/login';
var objXMLHttpRequest = new window.XMLHttpRequest();
var url = new URL (baseUrl + serviceUrl + baseUrlformat);
// page onload
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
// admin login now
$('.submit').click( function() {
var emailLogs      = $('#emailLogs').val();
var passwordLogs   = $('#passwordLogs').val();
$.ajax({
url: baseUrl + urllogin + baseUrlformat,
method:"post",
data:{emailLogs:emailLogs,passwordLogs:passwordLogs},
dataType:"text",
success:function(data){
var check = ['Value is required','Your account is closed','Sorry is not valid password','Sorry not valid account',''];
if(check.includes(data)){
$("#emailLogs").css("border-color","#FF5733");
$("#passwordLogs").css("border-color","#FF5733");
toastr.error(data);
}else{
toastr.success(data);
}
}
});
});
</script>
