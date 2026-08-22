<div id="root"></div>
<script type="text/javascript">
let serviceUrl    = '/template/content/secure/404';
var objXMLHttpRequest = new window.XMLHttpRequest();
var url = new URL (baseUrl + serviceUrl + baseUrlformat);
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
</script>
