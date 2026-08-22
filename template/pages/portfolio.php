<div id="root"></div>
<script type="text/javascript">
let pageUrl = '/template/views/portfolio';
var objXMLHttpRequest = new window.XMLHttpRequest();
method = 'GET';
var url = new URL (baseUrl + pageUrl + baseUrlformat);
objXMLHttpRequest.onreadystatechange = function() {
if(objXMLHttpRequest.readyState === 4) {
if(objXMLHttpRequest.status === 200) {
objXMLHttpRequest.onload = function () {
document.getElementById("root").innerHTML=objXMLHttpRequest.responseText;
};
}else{
reject('Error Code: ' +  objXMLHttpRequest.status + ' Error Message: ' + objXMLHttpRequest.statusText);
}
}
}
objXMLHttpRequest.open(method, encodeURI(url), false);
objXMLHttpRequest.send();
</script>
